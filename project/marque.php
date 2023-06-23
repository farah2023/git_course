<?php 
session_start();
?>

<!DOCTYPE html>
<!-- La ligne suivante spécifie que la langue du document est l'anglais -->
<html lang="en">
<head>
	<!-- La ligne suivante déclare l'encodage des caractères du document -->
	<meta charset="UTF-8">
	<!-- La ligne suivante définit la taille initiale de la fenêtre d'affichage pour le document -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Les lignes suivantes importent la feuille de style de la bibliothèque Boxicons -->
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- La ligne suivante importe une feuille de style CSS personnalisée appelée style2.css -->
<link rel="stylesheet" href="css/style2.css">

<!-- La ligne suivante définit le titre de la page Web comme "dash_marque" -->
<title>Tableau de bord : marque</title>

</head>
<body>


<!-- La section suivante contient la barre latérale de la page Web -->
<section id="sidebar">
	<!-- La balise d'ancre suivante est un lien vers la page d'accueil du site Web -->
	<a href="#" class="brand">
		<!-- La ligne suivante a été mise en commentaire, elle contient peut-être un élément d'icône -->
		<img  class="logos" src="img/logo1.png" alt="">
	</a>
	<!-- La liste non ordonnée suivante contient les éléments de menu de la barre latérale -->
	<ul class="side-menu top"><!-- La classe "side-menu" contient deux éléments de liste pour les paramètres et la déconnexion -->
	
			
<ul class="side-menu"><!-- Le premier élément de liste pointe vers une page tableau de bord -->
	
<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau de bord</span>
				</a>
			</li>
	<!-- Le second élément de liste pointe vers une page de déconnexion -->
	
</ul>
<li>
				<a href="#cont">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">partenariats</span>
				</a>
			</li>
			<li>
				<a href="marquemsg.php">
					<i class='bx bxs-message-dots' ></i>
					<span  class="text">Message</span>
				</a>
			</li>
			
		</ul>
	<!-- La classe "side-menu" contient deux éléments de liste pour les paramètres et la déconnexion -->
<ul class="side-menu">
	<!-- Le premier élément de liste pointe vers une page de paramètres -->
	<li>
		<a href="profile2.php">
			<i class='bx bxs-cog' ></i> <!-- Icône de paramètres -->
			<span class="text">paramétre</span> <!-- Texte indiquant "parametre" -->
		</a>
	</li>
	<!-- Le second élément de liste pointe vers une page de déconnexion -->
	<li>
		<a href="code1.php" class="logout">
			<i class='bx bxs-log-out-circle' ></i> <!-- Icône de déconnexion -->
			<span class="text">Deconnexion</span> <!-- Texte indiquant "Deconnexion" -->
		</a>
	</li>
</ul>

	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="marquemsg.php" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">
				
				</span>
			</a>
			<a href="profile2.php" class="profile">
				<img src="img/default-avatar.png">
			
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Tableau de bord</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Tableau de bord</a>
						</li>
						<!-- Les éléments suivants sont des liens qui pointent vers différentes pages du site -->
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Accueil</a>
						</li>
					</ul>
				</div>
				
			</div>
			<!-- La classe "box-info" contient deux listes pour afficher des informations sur les contrats -->
			<ul class="box-info">
			<li>
    <!-- Icon for contracts -->
    <i class='bx bxs-calendar-check' ></i>
    <span class="text">
       
        <!-- Text describing the data -->
        <p>Marques</p>
		<?php 
		// La ligne suivante inclut le fichier de configuration pour se connecter à la base de données
		include 'config.php';
		
		// La requête SQL suivante récupère toutes les lignes de la table marque
		$dash_marque_query = "SELECT * from marque ";
		// La requête ci-dessus est exécutée
		$dash_marque_query_run = mysqli_query($conn ,$dash_marque_query);
		// Si des résultats ont été retournés par la requête SQL
		if($marque_total= mysqli_num_rows($dash_marque_query_run))
		{
			// Le nombre total des marques est affiché dans un titre de niveau 3
			echo '<h3>'.$marque_total.'</h3>';
		}
		// Sinon, si aucun résultat n'a été retourné
		else 
		{
			// Le texte est affiché dans un titre de niveau 3
			echo '<h3>Aucune marque </h3>';
		}
	?>	
    </span>
</li>
				<li>
					<i class='bx bxs-group' ></i>
				<!-- Le span suivant contient un texte et un nombre qui représentent le nombre d'influenceurs dans la base de données -->
        <span class="text">
	    <p>Influenceurs</p>
	    <?php 
		// La ligne suivante inclut le fichier de configuration pour se connecter à la base de données
		include 'config.php';
		
		// La requête SQL suivante récupère toutes les lignes de la table user_form
		$dash_influence_query = "SELECT * from user_form";
		// La requête ci-dessus est exécutée
		$dash_influence_query_run = mysqli_query($conn ,$dash_influence_query);
		// Si des résultats ont été retournés par la requête SQL
		if($influence_total= mysqli_num_rows($dash_influence_query_run))
		{
			// Le nombre total d'influenceurs est affiché dans un titre de niveau 3
			echo '<h3>'.$influence_total.'</h3>';
		}
		// Sinon, si aucun résultat n'a été retourné
		else 
		{
			// Le texte est affiché dans un titre de niveau 3
			echo '<h3>Aucune donnee existants</h3>';
		}
	?>	
</span>
			</ul>

			<div class="table-data">
	<!-- Titre de la section -->
	<div class="order">
		<div class="head">
			<h3>Influenceurs</h3>
			<i class='bx bx-search' ></i>
			<i class='bx bx-filter' ></i>
		</div>
		<?php
			// Connexion à la base de données
			$conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); 
			// Requête SQL pour récupérer tous les enregistrements de la table user_form
			$requete = "SELECT * FROM user_form ORDER BY id ASC";
			$result = mysqli_query($conn,$requete);
			// Vérification si la requête est valide
			if(!$result){
				echo 'erreur'. mysqli_error();
			}else{
		?>
		<!-- Tableau pour afficher les résultats de la requête -->
		<table>
		<thead> <!-- Balise d'en-tête du tableau -->
    <tr> <!-- Ligne de l'en-tête -->
	   <th>Profile</th>
        <th> Nom d'influenceur</th> <!-- Cellule de l'en-tête avec le titre "nom influenceur" -->
        <th>Email</th> <!-- Cellule de l'en-tête avec le titre "email" -->
        <th>Instagram</th> <!-- Cellule de l'en-tête avec le titre "insta" -->
        <th>Facebook</th> <!-- Cellule de l'en-tête avec le titre "fc" -->
    </tr>
</thead>
			<tbody>
				<?php
					// Boucle pour afficher chaque ligne de l'enregistrement
					while($ligne = mysqli_fetch_array($result) ){
				?>
				<tr>
				<td><?php echo "<img src='uploaded_img/" . $ligne['image']  . "' alt='User image'>";?></td>
					<td><?php echo $ligne['name'] ?></td>
					<td><?php echo $ligne['email'] ?></td>
					<td><?php echo $ligne['insta'] ?></td>
					<td><?php echo $ligne['fc'] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php } ?>
	</div>
</div>	
<div class="table-data">
				<!-- "order" pour ordonner l'affichage du contenu -->
				<div  class="order">
					<!-- "head" designer l'entete du contenu -->
					<div id="cont" class="head">
						<h3>Mes contrats</h3>
                        
                        <!-- permettre de filtrer les résultats de recherche selon des critères -->
						<i class='bx bx-filter' ></i>
					</div>
					<?php
					
					$cur_id = $_SESSION['user_id'];
					
                       $conn = mysqli_connect('localhost','root','','projet',3308) or die('connection failed'); //connexion a la base de donner
                        $requete = " SELECT * FROM contrat1 WHERE id_rempli = '$cur_id'"; //recuperer les lignes de contrat telle que l'id de celui qui rempli le contrat et la meme que d'utilisateur connecter					$result = mysqli_query($conn,$requete);
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
						<?php while($ligne = mysqli_fetch_array($result) ){?>
							<tr>
								<!-- affichage des informations depuis la base de données la signature ,le srvice  , les noms ...des influenceurs -->
							
                            <td><?php echo $ligne['name1'] ?></td>
                            <td><?php echo $ligne['name2'] ?></td>
                            <td><?php echo $ligne['SERVICE'] ?></td>
                            <td><?php echo $ligne['PRIX'] ?></td>
							<td><?php echo $ligne['date'] ?></td>	
							<td><?php echo "<img src='uploaded_img/" . $ligne['image']  . "' alt='User image'>";?></td>		
							<td><a href="pdf_maker.php?id=<?php echo $ligne['id']; ?> & ACTION =DOWNLOAD"  class="btn-download">
					        <!--l'element permet de generer le contrat en format pdf pour les marques et influenceurs-->
					        <i class='bx bxs-cloud-download' ></i><span class="text">Telecharger PDF</span></a></td>	
					
				
                            </tr><?php }?>
						</tbody>
					</table>
				</div>
		</main>
	</section>
	<!-- lien vers le code JS -->
	<script src="script1.js"></script>
</body>
</html>