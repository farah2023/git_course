<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/stylex.css" />
    <!-- Boxicons CDN Link -->
    <link
          href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
          rel="stylesheet"
        />
</head>
<body>
    <!--La section de la barre horizontale à droite qui contient des liens -->
        <div class="sidebar">
            <!--La partie concernant le logo à gauche en haut-->
          <div class="logo-details">
           
            <img class="logoo" src="img/logo2-r.png">
            
          </div>
            <!--La partie concernant les liens dans la barre de coté avec les icons-->
          <ul class="nav-links">
            <li>
              <a href="#" class="active">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Tableau de bord</span>
              </a>
            </li>
            
            <li>
              <a href="#contrat">
                <i class="bx bx-book-alt"></i>
                <span class="links_name">contrats</span>
              </a>
            </li>
            <li>
              <a href="#msg">
                <i class="bx bx-message" ></i>
                <span class="links_name">Messages</span>
              </a>
            </li>
            <!--La partie qui me permet de déconnexionner de Tableau de bord-->
            <li class="log_out">
              <a href="code1.php">
                <i class="bx bx-log-out"></i>
                <span class="links_name">Déconnexion</span>
              </a>
            </li>
          </ul>
        </div>
        <!--La partie qui me permet de visualiser l'interface de tableau de bord-->
        <section class="home-section">
          <nav>
            <div class="sidebar-button">
              <i class="bx bx-menu sidebarBtn"></i>
              <span class="dashboard">Tableau de bord</span>
            </div>
            <!--Barre de recherche-->
            <div class="search-box">
              <input type="text" placeholder="Recherche..." />
              <i class="bx bx-search"></i>
            </div>
          </nav>
    
          <div class="home-content">
            <div class="overview-boxes">
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Influenceurs inscrits</div>
                  <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                  <?php 
                  include 'config.php';
                 $dash_category_query = "SELECT * from user_form";
                 $dash_category_query_run = mysqli_query($conn ,$dash_category_query);
                 if($category_total= mysqli_num_rows($dash_category_query_run))
                 {
                   echo '<h3>'.$category_total.'</h3>';
                 }
                 else 
               
                   echo '<h3>no data</h3>';
      
                 ?>
                  
                </div>
                </div>
              </div>
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Marques inscrites</div>
                  <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                  <?php 
                  include 'config.php';
                 $dash_marque_query = "SELECT * from marque";
                 $dash_marque_query_run = mysqli_query($conn ,$dash_marque_query);
                 if($marque_total= mysqli_num_rows($dash_marque_query_run))
                 {
                   echo '<h3>'.$marque_total.'</h3>';
                 }
                 else 
               
                   echo '<h3>no data</h3>';
      
                 ?>
                  
                </div>
                </div>
              </div>
              <div class="box">
                <div class="right-side">
                  <div class="box-topic">Partenariats effectués</div>
                  <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                  <?php 
                  include 'config.php';
                 $dash_marque_query = "SELECT * from contrat1";
                 $dash_marque_query_run = mysqli_query($conn ,$dash_marque_query);
                 if($marque_total= mysqli_num_rows($dash_marque_query_run))
                 {
                   echo '<h3>'.$marque_total.'</h3>';
                 }
                 else 
               
                   echo '<h3>no data</h3>';
      
                 ?>
                  
                </div>
                </div> 
              </div>
            </div>
    
            <div class="sales-boxes">
             <span> <div  style="margin:3%  ; padding:10px; width:100%" class="recent-sales box">
                <div class="title">influenceurs</div>
                <?php
                  $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                  $requete = " SELECT * FROM user_form ORDER BY id ASC";
                  $result = mysqli_query($conn,$requete);

                  if(!$result){
                  echo 'erreur'. mysqli_error();
                  }else{ }?>
    

             <table  >
              <tr>
                 <td>profile</td>
                 <td>nom influenceur</td>
                  <td>age</td>
                    <td>insta</td>
                   <td>fc</td>
                   <td>email</td>
                   <td>suppression</td>
       
              </tr>
              <?php while($ligne = mysqli_fetch_array($result) ){?>

                <tr>
               
                   <td><?php echo "<img class='user-image' src='uploaded_img/" . $ligne['image']  . "' alt='User image'>";?></td>
                   <td><?php echo $ligne['name'] ?></td>
                   <td><?php echo $ligne['age'] ?></td>
                   <td><?php echo $ligne['insta'] ?></td>
                   <td><?php echo $ligne['fc'] ?></td>
                   <td><?php echo $ligne['email'] ?></td>
                   <td> 
                          <form method="post" action="">
                            <input type="hidden" name="id" value="<?php echo $ligne['id'] ?>">
                             <input class="suppression" type="submit" name="supprimer" value="Supprimer">
                   
                          </form>
                    </td>
                 </tr>
                 <?php }?>
                  </table>
                 <?php
                  if(isset($_POST['supprimer'])){
                  $id = $_POST['id'];    
                  $requete = "DELETE FROM user_form WHERE id='$id'";
                  $result = mysqli_query($conn,$requete);
                  if(!$result){
                  echo 'erreur'. mysqli_error();
                 }else{ header("location: dash_admin.php"); //rediriger vers la page d'affichage de données après la suppression 
                }}?></tr>
                
                 
               
             
                </div>
                
              <div  class="top-sales box">
                <div class="title">les marques</div>
                <?php
                 $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                 $requete = " SELECT * FROM marque ORDER BY id ASC";
                 $result = mysqli_query($conn,$requete);
                 if(!$result){
                 echo 'erreur'. mysqli_error();
                 }else{}?>
                        

              <table>
               <tr>
                  <td>profile</td>
                  <td>nom marque</td>
                  <td>email</td>
                  <td>Secteur d'activités</td>
                  <td>chiffre d'affaire (en $)</td>
                  <td>supprimer</td>
        
               </tr>
                 <?php while($ligne = mysqli_fetch_array($result) ){?>

               <tr>
                <td> <?php echo "<img class='user-image' src='uploaded_img/" . $ligne['image']  . "' alt='User image'>";?></td>
                <td><?php echo $ligne['name'] ?></td>
                <td><?php echo $ligne['email'] ?></td>
                <td><?php echo $ligne['SECTEUR'] ?></td>
                <td><?php echo $ligne['chiffre'] ?></td>
                <td> 
                              <form method="post" action="">
                                <input type="hidden" name="id" value="<?php echo $ligne['id'] ?>">
                                  <input class="suppression" type="submit" name="supprimer" value="Supprimer">
                   
                              </form>
                             </td>
                          </tr>
                 <?php }?>
                          </table>
                 <?php
                  if(isset($_POST['supprimer'])){
                  $id = $_POST['id'];    
                  $requete = "DELETE FROM marque WHERE id='$id'";
                  $result = mysqli_query($conn,$requete);
                  if(!$result){
                  echo 'erreur'. mysqli_error();
                 }else{ header("location: dash_admin.php"); //rediriger vers la page d'affichage de données après la suppression 
                }}?></tr>
              </div>
              <div  id="contrat"  class="recent-sales box">
                <div   class="title">contrats</div>
                <?php
                  $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                  $requete = " SELECT name1,name2,SERVICE,date,PRIX FROM contrat1 ";
                  $result = mysqli_query($conn,$requete);

                if(!$result){
                 echo 'erreur'. mysqli_error();
                 }else{
                         }?>
                         <table style="margin-left:15%;"  class="sales-details ">
                         <tr >
                            
                             <td >NOM Marque</td>
                             <td  >NOM influenceur </td>
                             <td >Services</td>
                              <td >date</td>
                              <td >prix</td>
                         </tr>
                         <?php while($ligne = mysqli_fetch_array($result) ){?>
                     
                          <tr>
                             <td><?php echo $ligne['name1'] ?></td>
                             <td><?php echo $ligne['name2'] ?></td>
                             <td><?php echo $ligne['SERVICE'] ?></td>
                             <td><?php echo $ligne['date'] ?></td>
                             <td><?php echo $ligne['PRIX'] ?></td>
                             
                          </tr>
                 <?php }?>
                          </table>
                

              </div>
              <div id="msg" class="recent-sales box">
                <div class="title">Messages</div>
                <?php
                  $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                  $requete = " SELECT * FROM contact ";
                  $result = mysqli_query($conn,$requete);

                if(!$result){
                 echo 'erreur'. mysqli_error();
                 }else{
                         }?>
                         <table style="margin-left:25%;" class="sales-details ">
                         <tr>
                             <td >nom</td>
                             <td >email</td>
                             <td>Messages</td>
                             
                            
                         </tr>
                         <?php while($ligne = mysqli_fetch_array($result) ){?>
                     
                          <tr>
                             <td><?php echo $ligne['name'] ?></td>
                             <td><?php echo $ligne['email'] ?></td>
                             <td><?php echo $ligne['msg'] ?></td></tr>
                             
                             
                         <?php }?>
                     </table>
                
              </div>
            </span>
            </div>
          </div>
        </section>
    
        <script>
        // Ce code récupère deux éléments du document HTML par leur classe
      let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");

// La fonction suivante s'exécute lorsqu'on clique sur le bouton de la sidebar
sidebarBtn.onclick = function () {

// Toggle la classe "active" de la sidebar pour la rendre visible ou non
sidebar.classList.toggle("active");

// Si la sidebar a la classe "active"
if (sidebar.classList.contains("active")) {
  // Remplace l'icône du menu par une flèche pointant vers la droite
sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
// Si la sidebar n'a pas la classe "active"
} else {
  // Remplace l'icône de la flèche par l'icône du menu
sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
}
        </script>
</body>
</html>