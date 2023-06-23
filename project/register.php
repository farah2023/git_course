<?php

include 'config.php';

if(isset($_POST['submit'])){ // Vérifie si le bouton "submit" a été soumis par le formulaire

   $name = mysqli_real_escape_string($conn, $_POST['name']); // Échappe les caractères spéciaux du champ "name"
   $SECTEUR = mysqli_real_escape_string($conn, $_POST['SECTEUR']); // Échappe les caractères spéciaux du champ "SECTEUR"
   $chiffre= mysqli_real_escape_string($conn, $_POST['chiffre']); // Échappe les caractères spéciaux du champ "chiffre"
   $email = mysqli_real_escape_string($conn, $_POST['email']); // Échappe les caractères spéciaux du champ "email"
   $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); // Échappe les caractères spéciaux du champ "password" et le chiffre avec md5
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword'])); // Échappe les caractères spéciaux du champ "cpassword" et le chiffre avec md5
   $image = $_FILES['image']['name']; // Récupère le nom de l'image
   $image_size = $_FILES['image']['size']; // Récupère la taille de l'image
   $image_tmp_name = $_FILES['image']['tmp_name']; // Récupère le nom temporaire de l'image
   $image_folder = 'uploaded_img/'.$image; // Définit le chemin du dossier où l'image sera stockée

   $select = mysqli_query($conn, "SELECT * FROM `marque` WHERE email = '$email' AND password = '$pass'") or die('query failed'); // Exécute une requête pour vérifier si l'utilisateur existe dans la base de données


   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!'; // Vérifie si les mots de passe ne correspondent pas
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!'; // Vérifie si la taille de l'image est trop grande
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `marque`(name, email, password, image, SECTEUR , chiffre) VALUES('$name', '$email', '$pass', '$image', '$SECTEUR', '$chiffre')") or die('query failed'); // Insère les données du formulaire dans la base de données

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder); // Enregistre l'image dans le dossier 'uploaded_img'
            $message[] = 'registered successfully!'; // Message de confirmation d'enregistrement réussi
            header('location:login.php'); // Redirige vers la page de connexion
         }else{
            $message[] = 'registeration failed!'; // Message d'erreur en cas d'échec d'enregistrement
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>s'inscire</h3>

      <!-- Afficher les messages d'erreur éventuels -->
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      
      <input type="text" name="name" placeholder="enter nom complet" class="box" required> 

      <!-- Sélectionner un secteur d'activité -->
      
      <select name="SECTEUR" class="box">
         <option value="vetements"> vetements</option>
         <option value="food"> food</option>
         <option value="home"> home</option>
         <option value="mekup"> mekup</option>
         <option value=" electroniques"> electroniques</option>
         <option value="autres"> autres</option>
      </select>

      <!-- Saisir le chiffre d'affaires -->
      
      <input type="text" name="chiffre" placeholder="votre chiffre d'affaire" class="box" required> 

      <!-- Saisir l'adresse email -->
      
      <input type="email" name="email" placeholder="enter email" class="box" required>

      <!-- Saisir le mot de passe -->
      
      <input type="password" name="password" placeholder="enter mot de passe" class="box" required>

      <!-- Confirmer le mot de passe -->
      
      <input type="password" name="cpassword" placeholder="confirm mot de passe" class="box" required>

      <!-- Télécharger une image -->
      
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">

      <!-- Bouton pour envoyer le formulaire -->
      
      <input type="submit" name="submit" value="s'inscrire" class="btn">

      <!-- Lien pour se connecter à un compte existant -->
      
      <p>j'ai deja un compte.   <a href="login.php">connexion</a></p>
   </form>

</div>

</body>
</html>
