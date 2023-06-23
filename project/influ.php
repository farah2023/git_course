<?php
// initialiser ou restaure une session en utilisant un identifiant de session unique pour le visiteur, qui est stocké dans un cookie sur le navigateur du visiteur.
session_start();
// Les variables de session sont utilisées pour stocker des informations sur l'utilisateur qui se connecte à un site Web, afin que ces informations puissent être utilisées sur plusieurs pages du site.
//  "user_id" un identifiant unique pour l'utilisateur actuellement connecté au site.

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/style2.css">
	<title>Tableau de bord: influenceur</title>
</head>
<body>
	<section id="sidebar">
		<!-- "brand" pour désinger la partie marques pour les influenceurs -->
		<a href="#" class="brand">
			<!--<i class='bx bxs-smile'></i>-->
		<img  class="logos" src="img/logo1.png" alt="">
		</a>
        <!-- section pour designer la partie menu dans le tableau de bord -->
		<ul class="side-menu top">
			<!--  "active" pour indiquer à l'utilisateur la page ou la section de la page sur laquelle il se trouve actuellement. -->
			<li class="active">
				<a href="#">
					<!-- "bx bxs-dashboard" est utilisée pour ajouter une icône de tableau de bord à une page Web. -->
					<i class='bx bxs-dashboard'></i>
					<span class="text">Tableau de bord</span>
				</a>
			</li>
			<li>
				<a href="#cont">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">partenariats</span>
				</a>
			</li>
			<li>
				<a href="influmsg.php">
					<!-- 'bx bxs-message-dots' "bx bxs-message-dots" est utilisée pour ajouter une icône de bulles de message à une page Web -->
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
		</ul>
		<!--"side-menu" pour décrire un menu de navigation situé sur le côté d'une page Web plutôt que dans l'en-tête -->
		<ul class="side-menu">
			<li>
				<a href="profile.php">
					<!-- "bx bxs-cog" est utilisée pour ajouter une icône de réglages -->
					<i class='bx bxs-cog' ></i>
					<span class="text">Paramétre</span>
				</a>
			</li>
			<li>
                <!-- permmette à l'utilisateur de se déconnecter -->
				<a href="code1.php" class="logout">
					<!--  "bx bxs-log-out-circle" est utilisée pour ajouter une icône de déconnexion à une page Web -->
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Quitter</span>
				</a>
			</li>
		</ul>
	</section>

	<!-- section de contenu proncipale-->
	<section id="content">
		<nav>
			<!-- "bx bx-menu" est utilisée pour ajouter une icône de menu à une page Web. -->
			<i class='bx bx-menu'></i>
			<form action="#">
            <!-- permmettre la saisie de formulaire -->
				<div class="form-input">
					<!-- offrir un espace pour la recherche d'une information dans la page -->
					<input type="search" placeholder="Recehrcher...">
					<!-- 'bx bx-search' icone pour indiquer la recherche -->
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
            <!-- notifier sur message -->
			<a href="influmsg.php" class="notification">
				<!-- 'bx bxs-bell' pour l'icone de la cloche -->
				<i class='bx bxs-bell' ></i>
				<span class="num"></span>
			</a>
			<a href="profile.php" class="profile">
                <!-- définir l'avatar de l'utilisateur connecté depuis lequel il peut acceder à son profil pour mettre à jour les information-->
				<img src="img/default-avatar.png">
			</a>
		</nav>
	
		<main>
			<!-- "head-title" pour désigner le titre de l'entete principal de la page-->
			<div class="head-title">
				<!-- "left" pour désigner l'espace de travail à gauche de la page -->
				<div class="left">
					<h1>Tableau de bord</h1>
                    <!-- la classe breadcrumb désigner une méthode de navigation qui permet à un utilisateur de suivre le chemin qu'il a emprunté pour arriver à une page donnée dans un site Web ou une application. -->
					<ul class="breadcrumb">
						<li>
							<a href="#">Tableau de bord</a>
						</li>
                        <!--'bx bx-chevron-right' est utilisé comme une classe pour afficher une icône de flèche droite. Cette icône est souvent utilisée pour indiquer une action de déplacement vers la droite, comme par exemple pour ouvrir un menu déroulant -->
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- permettre a l'utilisateur de télécharger le contrat sous format pdf! -->
				
			</div>

			<!-- "box-info" pour indiquer qu'il s'agit un espace ou les informations seront affichées -->
			<ul class="box-info">
				<li>
					<!-- "bx bxs-calendar-check" est utilisée pour ajouter une icône de calendrier à une page Web.  -->
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
					<p>Influenceurs</p>   
					<?php 
		           // La ligne suivante inclut le fichier de configuration pour se connecter à la base de données
		            include 'config.php';
		
		          // La requête SQL suivante récupère toutes les lignes de la table user_form
		          $dash_influ_query = "SELECT * from user_form ";
		          // La requête ci-dessus est exécutée
		         $dash_influ_query_run = mysqli_query($conn ,$dash_influ_query);
		        // Si des résultats ont été retournés par la requête SQL
		        if($influ_total= mysqli_num_rows($dash_influ_query_run)){
					// Le nombre total d'influenceurs est affiché dans un titre de niveau 3
			         echo '<h3>'.$influ_total.'</h3>';}
		            // Sinon, si aucun résultat n'a été retourné
					else{ // Le texte est affiché dans un titre de niveau 3
			             echo '<h3>Aucune influ</h3>';}?>	
					</span>
				</li>

				<li>
					<!-- "bx bxs-group" est utilisée pour ajouter une icône de groupe à une page Web -->
					<i class='bx bxs-group'></i>
					<span class="text">
						<p>Marques</p>
					<?php 
					 include 'config.php';
					$dash_marque_query = "SELECT * from marque";
					$dash_marque_query_run = mysqli_query($conn ,$dash_marque_query);
                    // Cette fonction renvoie le nombre de lignes dans le résultat de la requête
					if($marque_total= mysqli_num_rows($dash_marque_query_run))
					{
					// afficher le nombre total des marques inscrits sur la plateforme
					  echo '<h3>'.$marque_total.'</h3>';
					}
					else 				
					  echo '<h3>no data</h3>';
					?>	
					</span>
				</li>
			</ul>

            <!-- permettre d'afficher les données des marques existants pour des partenariats possibleq -->
			<div class="table-data">
				<!-- "order" pour ordonner l'affichage du contenu -->
				<div class="order">
					<!-- "head" designer l'entete du contenu -->
					<div class="head">
						<h3>Marques</h3>
                      
                        <!-- permettre de filtrer les résultats de recherche selon des critères -->
						<i class='bx bx-filter' ></i>
					</div>
					<?php
                       $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                        $requete = " SELECT * FROM marque ORDER BY id ASC";
                     $result = mysqli_query($conn,$requete);
                    if(!$result){
                    echo 'erreur'. mysqli_error();
                    }else{
                       }?>
					<table>
						<thead>
							<tr>
							    <th>Profile</th>
								<th>Nom</th>
								<th>Email</th>
								<th>Secteur d'activité</th>
								<th>Chiffre d'affaire($) </th>								
							</tr>
						</thead>
						<tbody>
						<?php while($ligne = mysqli_fetch_array($result) ){?>
							<tr>
								<!-- affichage des informations depuis la base de données la photo , le nom ...des influenceurs -->
							<td><?php echo "<img src='uploaded_img/" . $ligne['image']  . "' alt='User image'>";?></td>
                            <td><?php echo $ligne['name'] ?></td>
                            <td><?php echo $ligne['email'] ?></td>
                            <td><?php echo $ligne['SECTEUR'] ?></td>
                            <td><?php echo $ligne['chiffre'] ?></td>							
                            </tr><?php }?>
						</tbody>
					</table>
				</div>
				 <!-- permettre d'afficher les données des contrats existants pour les partenariats effectues -->
			<div class="table-data">
				<!-- "order" pour ordonner l'affichage du contenu -->
				<div id ="cont" class="order">
					<!-- "head" designer l'entete du contenu -->
					<div class="head">
						<h3>Mes contrats</h3>
                        
                        <!-- permettre de filtrer les résultats de recherche selon des critères -->
						<i class='bx bx-filter' ></i>
					</div>
					<?php
					  
					  $current_id=$_SESSION['user_id'];
                       $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
                        $requet = " SELECT * FROM contrat1 WHERE id_rempli ='$current_id' ";
                        $result = mysqli_query($conn,$requet);
                    if(!$result){
                    echo 'erreur'. mysqli_error();
                    }else{
                       }?>
					<table>
						<thead>
							<tr>
							    <th>Marque</th>
								<th>Influenceur</th>
								<th>Service</th>
								<th>Le prix</th>
								<th>La date </th>			
								<th>La signatue</th>	
								<th>Action</th>					
							</tr>
						</thead>
						<tbody>
						<?php while($ligne = mysqli_fetch_assoc($result) ){?>
							<tr>
								<!-- affichage des informations depuis la base de données le prix  , les noms la signature...des influenceurs -->
							
                            <td><?php echo $ligne['name1'] ?></td>
                            <td><?php echo $ligne['name2'] ?></td>
                            <td><?php echo $ligne['SERVICE'] ?></td>
                            <td><?php echo $ligne['PRIX'] ?></td>
							<td><?php echo $ligne['date'] ?></td>	
							<td><?php echo "<img src='uploaded_img/" . $ligne['image']  . "' alt='User image'>";?></td>	
							<td><a href="pdf_maker.php?id=<?php echo $ligne['id']; ?> & ACTION =DOWNLOAD" class="btn-download"><i class='bx bxs-cloud-download' ></i>
					        <span class="text">Telecharger PDF</span></a></td>	
					
                            </tr><?php }?>
						</tbody>
					</table>
				</div>
		</main>
	</section>
	<script src="script1.js"></script>
</body>
</html>