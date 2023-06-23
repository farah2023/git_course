<?php
session_start();
include 'config.php';
$idinflu = $_SESSION['user_id'];
if(isset($_POST['submit'])){
    //la fonction mysqli_real_escape_string pour échapper les caractères spéciaux d'une chaîne de caractères, afin de prévenir les attaques par injection SQL.
// échapper les valeurs des variables $_POST['idmarque'] et $_POST['msg'] afin de les rendre sécurisées pour une utilisation dans une requête SQL.
  $idmarque = mysqli_real_escape_string($conn, $_POST['idmarque']);
  $msg= mysqli_real_escape_string($conn, $_POST['msg']);
  // Les valeurs à insérer sont stockées dans les variables $idinflu, $idmarque et $msg, qui proviennent toutes des données envoyées via le formulaire POST.
// La colonne "sender" est définie sur "influ" pour indiquer que le message a été envoyé par un influenceur (par opposition à une marque).
  $insert = mysqli_query($conn, "INSERT INTO `message`(	influ_id, marque_id , msg, sender) VALUES( '$idinflu','$idmarque', '$msg','influ')") or die('query failed');
         if($insert){          
            $message[] = 'send successfully!';
            header('location:influmsg.php');
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
    <title>msg avec marque</title>
    <link rel="stylesheet" href="css/style0.css" />
    <!-- "crossorigin" est un attribut HTML utilisé pour spécifier comment le navigateur doit gérer les demandes de ressources provenant d'un autre domaine ou serveur que celui du site web actuel. -->
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- "container" est utilisée pour définir une section spécifique de la page qui doit être centrée horizontalement et qui a une largeur fixe. -->
    <div class="container">    
      <div class="form">
        <div class="contact-info">
          <h3 style=" text-align:center; margin-top: 5px;">Message recu:</h3>
          <?php
                  $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                 //La requête SQL utilise une jointure interne (INNER JOIN) pour combiner les résultats de la table "message" avec les résultats de la table "marque" en utilisant une condition de correspondance sur les ID de la marque dans les deux tables.
                  $requete = " SELECT name , msg  FROM message inner join marque on marque.id = message.marque_id WHERE influ_id = '$idinflu' and sender ='marque' ";
                  $result = mysqli_query($conn,$requete);

                if(!$result){
                 echo 'erreur'. mysqli_error();
                 }else{
                         }?>
                         <table style="margin-left:150px;" >
                         <tr style="font-size:large; color:#ff52bf;">
                             <td >Nom de marque</td>
                             <td>Message</td>
                         </tr>
                         <?php while($ligne = mysqli_fetch_array($result) ){?>
                     
                          <tr>
                             <td><?php echo $ligne['name'] ?></td>
                             <td><?php echo $ligne['msg'] ?></td></tr>   
                         <?php }?>
                   </table> 
                  </div> 
          </div>
          <div  style="background-color: #52aaff;  border-radius: 20%" class="contact-form">
                     <!-- "autocomplete" est un attribut HTML utilisé pour indiquer si les navigateurs doivent ou non proposer une fonctionnalité d'autocomplétion pour les champs de formulaire. -->
          <form action="" method="post" autocomplete="off">
            <h3 class="title">Messager une marque</h3>
           <!-- input-container pour desinger le contenaire des informations saisies -->
            <div class="input-container">
              <!-- permettre à l'utilisateur de choisir une marque parmi une liste prédéfinie. Il est important de s'assurer que la liste des marques proposées est à jour et pertinente pour l'utilisateur, afin de faciliter son expérience de navigation sur le site -->
            <select  class="selection" name="idmarque"> 
              <?php 
              $requete= "SELECT id , name FROM marque ";
              $select = mysqli_query($conn , $requete);
              while($ligne = mysqli_fetch_array( $select)){
                //  générer une option HTML pour un menu déroulant (select) en utilisant les valeurs des colonnes "id" et "name" d'une ligne de la table.
                echo '<option value='. $ligne['id'] .'> '.$ligne['name'] .'</option>';
              }               
               ?>
               </select>
            </div>
            <!-- input-container pour desinger le la partie de la page contenant des informations saisies -->
            <div class="input-container textarea">
              <textarea name="msg" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Envoyer" class="btn" /><br><br>
           <center><a class="btn" href="contrat.php"> Signer une contrat</a></center>
          </form>
        </div>
      </div>
    </div>
    <script src="script0.js"></script>
  </body>
</html>