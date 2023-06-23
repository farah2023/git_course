<?php
// inclure le fichier de configuration pour établir une connexion à la base de données
include 'config.php';

// démarrer une session pour stocker les données utilisateur
session_start();

if(isset($_POST['submit'])){
   // récupérer et échapper les champs d'e-mail et de mot de passe du formulaire de soumission
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   // exécuter une requête pour sélectionner l'utilisateur du formulaire ayant l'e-mail et le mot de passe donnés
   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   // vérifier si un utilisateur correspondant a été trouvé dans la base de données
   if(mysqli_num_rows($select) > 0){
      // récupérer les données de l'utilisateur et les stocker dans la session
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      // rediriger l'utilisateur vers la page d'accueil
      header('location:influ.php');
   }else{
      // si aucun utilisateur correspondant n'a été trouvé, afficher un message d'erreur
      $message[] = 'email ou mot de passe incorrect!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

<form action="" method="post" enctype="multipart/form-data">
<!-- Afficher le formulaire et utiliser la méthode POST pour soumettre les données -->
      <h3>se connecter</h3>
      <?php
      // Si un message d'erreur est présent, parcourir le tableau et afficher chaque message dans une div
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <!-- Champ de saisie pour l'adresse email de l'utilisateur avec une indication pour l'utilisateur -->
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <!-- Champ de saisie pour le mot de passe de l'utilisateur avec une indication pour l'utilisateur -->
      <input type="submit" name="submit" value="se connecter" class="btn">
      <!-- Bouton de soumission du formulaire -->
      <p>Vous n'avez pas de compte? <a href="registeri.php">s'inscrire</a></p>
      <!-- Lien pour rediriger l'utilisateur vers la page d'inscription s'il n'a pas encore de compte -->
   </form>


</div>

</body>
</html>