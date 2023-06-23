<?php

// inclusion du fichier de configuration de la base de données
include 'config.php';

// démarrage de la session
session_start();

if(isset($_POST['submit'])){
   // récupération et échappement des caractères de l'email et du mot de passe
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

   // sélection de l'utilisateur correspondant à l'email et au mot de passe fournis
   $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   
   // si un utilisateur correspondant est trouvé, enregistrement de l'id de l'utilisateur en session et redirection vers la page d'accueil
   if(mysqli_num_rows($select) > 0){
     $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:dash_admin.php');
   }else{
      // sinon, affichage d'un message d'erreur
      $message[] = 'incorrect email or password!';
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>conection</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- Formulaire HTML pour permettre à l'utilisateur admin de se connecter -->
<div class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>se connecter</h3>
      <?php
      // si des messages d'erreur doivent être affichés, boucler à travers eux et afficher chacun dans une div
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <!--champs de saisi d'email obligatoire-->
      <label class="logad">Email</label>
      <input type="email" name="email" placeholder="entrer l'email" class="box" required>
      <!--champs de saisi de mot de passe obligatoire-->
      <label class="logad">Mot de passe</label>
      <input type="password" name="pass" placeholder="entrer le mot de passe" class="box" required>
      <!--boutton d;envoie de donnees-->
      <input type="submit" name="submit" value="connexion" class="btn">
      <!-- <p>Vous n'avez pas de compte ? <a href="registerad.php">inscrivez-vous maintenant</a></p> -->
   </form>
</div>

</body>
</html>