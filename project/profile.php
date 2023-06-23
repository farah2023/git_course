<?php

include 'config.php'; // Inclure le fichier de configuration qui contient les informations de connexion à la base de données
session_start(); // Démarrer une session PHP
$user_id = $_SESSION['user_id']; // Récupérer l'ID de l'utilisateur à partir de la session

if(!isset($user_id)){ // Si l'utilisateur n'est pas connecté
   header('location:logini.php'); // Rediriger vers la page de connexion
};

if(isset($_GET['logout'])){ // Si l'utilisateur a cliqué sur le bouton de déconnexion
   unset($user_id); // Supprimer l'ID de l'utilisateur de la session
   session_destroy(); // Détruire la session
   header('location:logini.php'); // Rediriger vers la page de connexion
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css"> 

</head>
<body>
   
<div class="container">

<div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed'); // Exécuter une requête SQL pour récupérer les données de l'utilisateur à partir de la base de données
         if(mysqli_num_rows($select) > 0){ // Vérifier si la requête a retourné des résultats
            $fetch = mysqli_fetch_assoc($select); // Récupérer les données de l'utilisateur sous forme de tableau associatif
         }
         if($fetch['image'] == ''){ // Si l'utilisateur n'a pas d'image de profil
            echo '<img src="images/default-avatar.png">'; // Afficher une image par défaut
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">'; // Sinon, afficher l'image de profil de l'utilisateur
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3> <!-- Afficher le nom de l'utilisateur -->
      <a href="update_profilei.php" class="btn">modifier le profile</a> <!-- Lien vers la page de mise à jour du profil -->
      <a href="influ.php?logout=<?php echo $user_id; ?>" class="delete-btn">Quitter</a> <!-- Lien de déconnexion -->
      <!-- <p>new <a href="logini.php">login</a> or <a href="registeri.php">register</a> </p> -->
   </div> <!-- Fermer la balise div pour le profil de l'utilisateur -->

</div>

</body>
</html>