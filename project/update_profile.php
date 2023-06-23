<?php
error_reporting(0);
?>

<?php

// On inclut le fichier de configuration contenant les informations de connexion à la base de données
include 'config.php';

// On démarre la session pour récupérer l'identifiant de l'utilisateur connecté
session_start();
$user_id = $_SESSION['user_id'];

// Si le formulaire d'édition de profil est soumis
if(isset($_POST['update_profile'])){

   // On récupère les nouvelles informations du profil de l'utilisateur
   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_SECTEUR  = mysqli_real_escape_string($conn, $_POST['update_SECTEUR']);
   $update_chiffre = mysqli_real_escape_string($conn, $_POST['update_chiffre']);

   // On met à jour les informations dans la base de données
   mysqli_query($conn, "UPDATE `marque` SET name = '$update_name', email = '$update_email', SECTEUR = '$update_SECTEUR', chiffre = '$update_chiffre' WHERE id = '$user_id'") or die('query failed');

   // On récupère les anciens et nouveaux mots de passe pour les mettre à jour si nécessaire
   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
}
   // Si au moins un des champs de mot de passe est rempli
   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){

      // On vérifie que l'ancien mot de passe correspond à celui enregistré dans la base de données
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';

      // On vérifie que le nouveau mot de passe et sa confirmation sont identiques
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';

      // Si tout est bon, on met à jour le mot de passe dans la base de données
      }else{
         mysqli_query($conn, "UPDATE `marque` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }
$update_image = $_FILES['update_image']['name']; // On récupère le nom du fichier image
$update_image_size = $_FILES['update_image']['size']; // On récupère la taille du fichier image

$update_image_tmp_name = $_FILES['update_image']['tmp_name']; // On récupère le chemin temporaire du fichier image

$update_image_folder = 'uploaded_img/'.$update_image; // On définit le chemin où le fichier image sera enregistré

if(!empty($update_image)){ // Si un fichier image a été sélectionné

   if($update_image_size > 2000000){ // Si la taille du fichier image dépasse 2 Mo
      $message[] = 'image is too large'; // On ajoute un message d'erreur
   }else{
      $image_update_query = mysqli_query($conn, "UPDATE `marque` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed'); // On met à jour la base de données avec le nom de la nouvelle image
      if($image_update_query){
         move_uploaded_file($update_image_tmp_name, $update_image_folder); // On déplace le fichier image vers le dossier de destination
      }
      $message[] = 'image updated succssfully!'; // On ajoute un message de succès
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      // Récupération des données de l'utilisateur
      $select = mysqli_query($conn, "SELECT * FROM `marque` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         // Affichage de l'image de profil de l'utilisateur
         if($fetch['image'] == ''){
            echo '<img src="img/default-avatar.png">';
         }else{
            //  affiche l'image téléchargée par l'utilisateur sur le serveur. La source de l'image est créée en concaténant le chemin de la destination d'upload avec le nom de fichier de l'image récupéré à partir de la base de données.
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }

         // Affichage des messages d'erreur/succès
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>

<div class="flex">
         <div class="inputBox">
            <span>nom Complet:</span> <!-- Label pour le champ nom complet -->
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box"> <!-- Champ pour le nom complet avec la valeur pré-remplie depuis la base de données -->
            <span> email :</span> <!-- Label pour le champ email -->
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box"> <!-- Champ pour l'email avec la valeur pré-remplie depuis la base de données -->
            <span>Secteur d'activités:</span> <!-- Label pour le champ SECTEUR -->
            <input  name="update_SECTEUR " value="<?php echo $fetch['SECTEUR']; ?>" class="box"> <!-- Champ pour le SECTEUR avec la valeur pré-remplie depuis la base de données -->
            <span>image :</span> <!-- Label pour le champ image -->
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box"> <!-- Champ pour télécharger une image -->
         </div>
         <div class="inputBox">
            <span>chiffre d'affaire :</span> <!-- Label pour le champ chiffre d'affaire -->
            <input  name="update_chiffre" value="<?php echo $fetch['chiffre']; ?>" class="box"> <!-- Champ pour le chiffre d'affaire avec la valeur pré-remplie depuis la base de données -->
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>"> <!-- Champ masqué pour stocker le mot de passe actuel -->
            <span>ancien mot de passe :</span> <!-- Label pour le champ de l'ancien mot de passe -->
            <input type="password" name="update_pass" placeholder="enter previous password" class="box"> <!-- Champ pour l'ancien mot de passe avec un message de rappel -->
            <span>nouveau mot de passe :</span> <!-- Label pour le champ du nouveau mot de passe -->
            <input type="password" name="new_pass" placeholder="enter new password" class="box"> <!-- Champ pour le nouveau mot de passe avec un message de rappel -->
            <span>confirmer le mot de passe :</span> <!-- Label pour le champ de confirmation du nouveau mot de passe -->
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box"> <!-- Champ pour confirmer le nouveau mot de passe avec un message de rappel -->
         </div>
      </div>
      <input type="submit" value="modifier profile" name="update_profile" class="btn"> <!-- Bouton pour mettre à jour le profil -->
      <a href="profile2.php" class="delete-btn">précédente</a> <!-- Lien pour revenir à la page précédente -->
   </form>
</div>
</body>
</html>