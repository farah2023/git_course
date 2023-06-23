<?php

// Inclut le fichier de configuration qui contient les informations de connexion à la base de données
include 'config.php';

// Vérifie si la session est démarrée et récupère l'id de l'utilisateur connecté
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   
}
// Vérifie si le formulaire a été soumis
if(isset($_POST['submit'])){

   // Récupère et échappe les valeurs des champs de nom 1, nom 2, service, prix, durée
   $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
   $name2 = mysqli_real_escape_string($conn, $_POST['name2']);
   $SERVICE = mysqli_real_escape_string($conn, $_POST['SERVICE']);
   $PRIX= mysqli_real_escape_string($conn, $_POST['PRIX']);
   $duree= mysqli_real_escape_string($conn, md5($_POST['duree'])); // Utilise la fonction md5 pour hasher la valeur de durée

   // Récupère le nom, la taille et le chemin temporaire de l'image téléchargée
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];

   // Définit le dossier où l'image sera enregistrée
   $image_folder = 'uploaded_img/'.$image;
   
   // Vérifie si la taille de l'image est supérieure à 2 000 000 octets (2 Mo)
   if($image_size > 2000000){
      $message[] = 'image size is too large!';
   }else{
      // Récupère l'id de l'utilisateur connecté depuis la session
      if(isset($user_id)){
         // Insère les valeurs dans la table de la base de données et vérifie si la requête a réussi
         $insert = mysqli_query($conn, "INSERT INTO `contrat1`( name1 , name2, SERVICE , PRIX , duree , image ,id_rempli ) VALUES('$name1', '$name2', '$SERVICE', '$PRIX','$duree', '$image','$user_id')") or die('query failed');
         // Si la requête a réussi, enregistre l'image dans le dossier correspondant, affiche un message de succès et redirige l'utilisateur vers la page marque.php
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:marque.php');
         }else{
            // Si la requête a échoué, affiche un message d'erreur
            $message[] = 'registeration failed!';
         }
      }else{
         // Si l'id de l'utilisateur connecté n'est pas disponible, affiche un message d'erreur
         $message[] = 'user id is not available!';
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
   <title>contrat</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

<!-- Formulaire d'ajout de contrat -->
<form action="" method="post" enctype="multipart/form-data">
   <h3>Contrat</h3>

   <?php
   // Vérifie s'il y a un message à afficher et l'affiche si c'est le cas
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>

   <!-- Champ pour le nom de la marque -->
   <input type="text" name="name1" placeholder=" Nom marque" class="box" required> 

   <!-- Champ pour le nom de l'influenceur -->
   <input type="text" name="name2" placeholder="Nom influenceur" class="box" required>

   <!-- Champ pour le type de service -->
   <select name="SERVICE" class="box">
      <option value="publicité"> Publicité</option>
      <option value="commercialisation"> Commercialisation</option>
      <option value="vente"> Vente</option>
      <option value="autres"> Autres</option>
   </select>

   <!-- Champ pour le prix -->
   <input type="text" name="PRIX" placeholder="PRIX " class="box" required> 

   <!-- Champ pour la durée du contrat -->
   <input type="text" name="duree" placeholder=" La durée de contrat" class="box" >

   <!-- Champ pour l'image -->
   <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">

   <!-- Bouton de soumission du formulaire -->
   <input type="submit" name="submit" value="valider" class="btn">
</form>

</div>

</body>
</html>