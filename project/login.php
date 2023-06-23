<?php
// Inclure le fichier de configuration qui contient les informations de connexion à la base de données
include 'config.php';
// Démarrer la session pour stocker les données utilisateur
session_start();
// Vérifier si le bouton de soumission a été cliqué
if(isset($_POST['submit'])){
// Échapper les caractères spéciaux et protéger contre les injections SQL en récupérant l'email et le mot de passe entrés par l'utilisateur
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
// Requête pour récupérer les données de l'utilisateur correspondant à l'email et au mot de passe saisis
$select = mysqli_query($conn, "SELECT * FROM marque WHERE email = '$email' AND password = '$pass'") or die('query failed');
// Vérifier si les données de l'utilisateur ont été trouvées dans la base de données
if(mysqli_num_rows($select) > 0){
$row = mysqli_fetch_assoc($select);
$_SESSION['user_id'] = $row['id'];
header('location:marque.php');
}else{
$message[] = 'email ou mot de passe incorrect !';
}}?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>connexion</title>

   <!-- lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<!-- Conteneur du formulaire de connexion -->
<div class="form-container">

   <!-- Formulaire de connexion -->
   <form action="" method="post" enctype="multipart/form-data">
      <h3> se connecter</h3>

      <!-- Afficher les messages d'erreur en cas d'erreur de connexion -->
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

      <!-- Champ de saisie pour l'e-mail -->
     
      <input type="email" name="email" placeholder="enter email" class="box" required>

      <!-- Champ de saisie pour le mot de passe -->
      
      <input type="password" name="pass" placeholder="enter password" class="box" required>

      <!-- Bouton de connexion -->
      <input type="submit" name="submit" value="connecter" class="btn">

      <!-- Lien pour s'inscrire -->
      <p>Vous n'avez pas de compte? <a href="register.php">Inscrivez-vous maintenant</a></p>
   </form>

   <!-- CSS pour aligner le texte des étiquettes de champ à gauche -->
   <style>
      .Log{
         text-align: left;
      }
   </style>
</div>
</body>
</html>
