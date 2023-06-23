<?php
// Inclusion du fichier de configuration de la base de données
include 'config.php';
// Vérification de la soumission du formulaire
if(isset($_POST['submit'])){
  // Récupération des données du formulaire et échappement des caractères spéciaux pour éviter les failles de sécurité
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $insta = mysqli_real_escape_string($conn, $_POST['insta']);
   $fc= mysqli_real_escape_string($conn, $_POST['fc']); 
   $email = mysqli_real_escape_string($conn, $_POST['email']); 
   $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); // Cryptage du mot de passe en utilisant la fonction md5
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword'])); // Cryptage de la confirmation du mot de passe
   $image = $_FILES['image']['name']; // Récupération du nom du fichier image
   $image_size = $_FILES['image']['size']; // Récupération de la taille du fichier image
   $image_tmp_name = $_FILES['image']['tmp_name']; // Récupération du nom temporaire du fichier image
   $image_folder = 'uploaded_img/'.$image; // Définition de l'emplacement du dossier de stockage des images

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
// Vérifie si la requête retourne des lignes pour déterminer si l'utilisateur existe déjà dans la base de données
  // Vérifie si le nombre de lignes dans le résultat de la requête est supérieur à 0 
if(mysqli_num_rows($select) > 0){
   $message[] = 'utilisateur deja existe'; 
}else{
   // Vérifie si les mots de passe ne correspondent pas
   if($pass != $cpass){
      $message[] = 'mot de passe incompatible, veuillez confirmer!'; // Erreur de confirmation de mot de passe
   }elseif($image_size > 2000000){
      $message[] = 'taille d\'image trop grande!'; // Erreur de taille d'image
   }else{
      // Insère les données dans la base de données et redirige vers la page de connexion en cas de succès
      $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, age , insta ,fc) VALUES('$name', '$email', '$pass', '$image', '$age', '$insta', '$fc')") or die('query failed');
      if($insert){
         move_uploaded_file($image_tmp_name, $image_folder); // Déplace l'image téléchargée vers le dossier image
         $message[] = 'Inscription réussie!'; // Message de réussite
         header('location:logini.php'); // Redirige vers la page de connexion
      }else{
         $message[] = 'Inscription échouée!'; // Message d'erreur
      }  }   }}?>
<!DOCTYPE html> 
<html lang="en"> <!-- Déclaration de la langue utilisée pour la page -->
<head>
   <meta charset="UTF-8"> <!-- Définition de l'encodage de caractères de la page -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Paramétrage pour les navigateurs Internet Explorer -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Paramétrage pour les appareils mobiles -->
   <title>register</title> <!-- Titre de la page -->
   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container"> <!-- Container pour le formulaire d'inscription -->
   <form action="" method="post" enctype="multipart/form-data"> <!-- Début du formulaire -->
      <h3>s'inscire</h3> <!-- Titre du formulaire -->
      <?php
      if(isset($message)){ // Si un message est présent
         foreach($message as $message){ // Pour chaque message dans la liste de messages
            echo '<div class="message">'.$message.'</div>'; // Afficher le message dans un div avec la classe "message"
         }
      }
      ?> <!-- Fin de la boucle -->
      
      <input type="text" name="name" placeholder="enter nom complet" class="box" required> 
<!-- Champ de saisie pour le nom complet de l'utilisateur -->

<select name="age" class="box">
   <option value="moins de 20 ans"> moins de 20 ans</option>
   <option value="entre 20 ans et 30 ans"> entre 20 ans et 30 ans</option>
   <option value="plus de 30 ans"> plus de 30 ans</option>
</select>
<!-- Liste déroulante pour sélectionner l'âge de l'utilisateur -->

<input type="text" name="insta" placeholder="  instagram" class="box" required>
<!-- Champ de saisie pour le lien Instagram de l'utilisateur -->

<input type="text" name="fc" placeholder=" feccook" class="box" required>
<!-- Champ de saisie pour le lien Facebook de l'utilisateur -->

<input type="email" name="email" placeholder="enter email" class="box" required>
<!-- Champ de saisie pour l'adresse e-mail de l'utilisateur -->

<input type="password" name="password" placeholder="enter mot de passe" class="box" required>
<!-- Champ de saisie pour le mot de passe de l'utilisateur -->

<input type="password" name="cpassword" placeholder="confirm mot de passe" class="box" required>
<!-- Champ de saisie pour confirmer le mot de passe de l'utilisateur -->

<input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
<!-- Champ pour téléverser une image -->
<input type="submit" name="submit" value="s'inscrire" class="btn">
<!-- Bouton pour soumettre le formulaire d'inscription -->
<p>j'ai déjà un compte. <a href="logini.php">connexion</a></p>
<!-- Lien pour se connecter si l'utilisateur a déjà un compte -->
    </form> <!-- Fin du formulaire -->
   </div> <!-- Fin du container pour le formulaire d'inscription -->
</body>
</html> <!-- Fin de la page HTML -->