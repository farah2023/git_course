<?php
session_start();
 $idmarque = $_SESSION['user_id'];
include 'config.php';

if(isset($_POST['submit'])){

   $idinflu = mysqli_real_escape_string($conn, $_POST['idinflu']);
   $msg= mysqli_real_escape_string($conn, $_POST['msg']);
   
 
   $insert = mysqli_query($conn, "INSERT INTO `message`(	influ_id, marque_id , msg ,sender) VALUES('$idinflu', '$idmarque', '$msg','marque')") or die('query failed');

         if($insert){
           
            $message[] = 'send successfully!';
            header('location:marquemsg.php');
         }else{
            $message[] = 'sent failed!';
         }
   }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>msg avec influenceur</title>
    <link rel="stylesheet" href="css/style0.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      
      <div class="form">
        <div class="contact-info">
          <h3 style="  text-align:center; margin-top: 5px;">Message recu : </h3>
          <?php
                  $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                 
                  $requete = " SELECT name,msg  FROM message inner join user_form on user_form.id = message.influ_id WHERE marque_id = '$idmarque' and sender='influ'";
                  $result = mysqli_query($conn,$requete);

                if(!$result){
                 echo 'erreur'. mysqli_error();
                 }else{
                         }?>
                         <table style="margin-left:150px;" class="sales-details">
                         <tr style="font-size:large; color:#ff52bf;">
                             <td style="width:200px;">Nom d'influenceur</td>
                             <td style="width:200px;">Message</td>
                         </tr>
                         <?php while($ligne = mysqli_fetch_array($result) ){?>
                     
                          <tr>
                             <td><?php echo $ligne['name'] ?></td>
                             <td><?php echo $ligne['msg'] ?></td></tr>   
                         <?php }?>
                   </table>
          </div>
        </div>

        <div style ="background-color: #52aaff; border-radius:30%" class="contact-form">
          

          <form action="" method="post" autocomplete="off">
            <h3 class="title">Messager un influenceur</h3>
            
            <div class="input-container">
              
               <select class="selection" name="idinflu"> <?php 
              $requete= "SELECT id , name FROM user_form ";
              $select = mysqli_query($conn , $requete);
              while($ligne = mysqli_fetch_array( $select)){
                echo '<option value='. $ligne['id'] .'> '.$ligne['name'] .'</option>';
              }
                 

               ?>
               </select>
            </div>
            
            
            <div class="input-container textarea">
              <textarea name="msg" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Envoyer" class="btn"/><br><br>
          <center>  <a class="btn"  href="contrat.php"> Signer une contrat</a></center>
            
          </form>
        </div>
      </div>
    </div>

    <script src="script0.js"></script>
  </body>
</html>