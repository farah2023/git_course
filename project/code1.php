<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Préconnecter à l'URL pour récupérer plus rapidement la police de caractère -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!-- Préconnecter à l'URL pour récupérer plus rapidement la police de caractère avec le header "crossorigin" -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <!-- Charger les polices de caractères Open Sans et Poppins depuis Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
   <!-- Charger la feuille de style pour l'animation des éléments avec AOS (Animate On Scroll) depuis unpkg.com -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://kit.fontawesome.com/68cd47e680.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style1.css">
  <title>platforme link</title>
   <!-- Ajouter une icône pour le site Web, ici un favicon en format PNG de 32x32 pixels -->
  <link rel="icon" type="image/x-icon" href="images/favicon-32x32.png">
</head>
<body>
  <!--Cette partie a pour objectif de fournir un interface utilisateur approprie pour attirer lattention-->
  <section>
    <div class="main">
        <!-- "content position" pour indiquer le positionnement du contenu de cette section -->
      <div class="content position">
        <div class="header">
          <!--La barre de navigation contenant le logo de notre plateforme, et 4 liens pour se diriger vers 4 nouvelle pages et un bouton pour la connexion au compte deja cree-->
          <nav class="nav-bar">
            <img  src="img/logo2-r.png" alt="logo">
            <!-- "nav-items" pour indiquer qu'il s'agit des élémnets de la barre de navigation -->
            <span class="nav-items">
                <a href="#">Accueil</a>
                <a href="sevices.php">Services</a>
                <a href="#about">link</a>
                <a href="contact.php">Contact</a>
                <!-- "signUpBtn" pour désigner le boutton qui va permettre à l'admin de se diriger vers la page loginad.php pour se connecter -->
                <a href="loginad.php" class="signUpBtn">Admin</a>  
            </span>
        </nav>
        </div>

        <!-- Définir une div avec la classe "flex-card", utilisée pour styliser un groupe d'éléments avec Flexbox -->
        <div class="flex-card">
             <!-- Définir une div avec la classe "side1", utilisée pour styliser une partie de la mise en page -->
          <div class="side1">
            <div class="text">
              <!-- texte inroductif de la plateforme -->
              <h3>Promouvoir votre marque aupres d'un large public</h3>
              <p>  Sur  notre plateforme , les marques peuvent
                atteindre un public plus large grâce aux
                influenceurs qui ont déjà une audience établie
                dans leur créneau.</p>
                <!-- Buttons permettant a un nouveau utilisateur de s inscrire dans la pelateforme selon son statut, il va se diriger vers le formulaire d inscription adapte-->
              <div class="button">
                <button><a  href="login.php"> Je suis une marque</a> </button>
                <button><a  href="logini.php">Je suis  influenceur</a></button>
              </div>
            </div>
          </div>
          <span class="side2">
          <!-- Image de la page d acceuil pour refleter le theme de la plateforme -->
          <!-- "srcset" est utilisé pour spécifier les différentes sources d'images pour un élément <img>. Il permet de fournir plusieurs fichiers image, chacun ayant une résolution différente, et de laisser le navigateur choisir la source d'image la plus appropriée en fonction de la taille et de la résolution de l'écran de l'utilisateur. -->
           <img id="img1" src="img/cloths.jpg" alt="app-mockup" srcset="">
           <img id="img2" src="img/22.jpg" alt="a-mockup" >
          </span>
        </div>
      </div>
    </div>
  </section><br><br>
  <!-- La partie poour montrer les avantages de notre plateforme -->
  <section class="adv" >
    <h3 class="titre" id="about">Pourquoi nous choisir?</h3><br><br>
    <!-- classe box reflete la fome contenant l image le titre et le paragraphe descriptif de chaque caracteristique -->
       <span class="box">  
        <!-- classe why pour designer la partie de pourquoi nous choisir -->
         <div class="why">
          <!-- classe icon pour designer l insertion de l image descriptif de chaque caracteristique de pourquoi nous choisir -->
            <img class= "icon" src="img/kfel-removebg-preview.png">
            <!-- deux br pour permmettre un affichage aise -->
              <h4>confidentialité</h4><br><br>
                <p>Nous prenons au sérieux la protection des données de nos utilisateurs et nous avons mis en 
                 place des mesures de sécurité pour assurer la confidentialité de leurs informations personnelles.</p>
         </div> <br>
         <div class="why">
            <img class= "icon" src="img/loop-removebg-preview.png" >
              <h4>transparence</h4><br><br>
                <p>Nous fournissons des informations claires pour établir la confiance entre notre entreprise, les marques et les influenceurs.
                 Rejoignez-nous  pour une expérience transparente !</p></div>    
          </div><br><br>

          <div class="why">
            <img class= "icon" src="img/performance-removebg-preview.png" >
               <h4>performance</h4><br><p>Nous avons optimisé chaque aspect de notre plateforme pour vous garantir une expérience  optimale en vous fournissant
               les outils dont vous avez besoin pour réussir votre business, puis atteindre une visibilité incroyable !</p></div>
           <div class="why">
             <img class= "icon" src="img/saroukh-removebg-preview.png" >
                <h4>rapidité</h4><br><br><p>Vous cherchez une plateforme qui répond à vos besoins rapidement et efficacement ? 
                 Découvrez notre plateforme ultra-rapide qui offre des temps de chargement records et une navigation fluide.</p>
            </div><br><br>
       </span> 
    </section><br><br><br><br><br><br>
       <!-- partie pour presneter les avis de notre utilisateurs -->
       <section> <h3 class="titre" >Nous sommes aux yeux de nos clients</h3></section>

       <!-- attribut data-aos pour ajouter des effets d'animation aux éléments d'une page web lorsqu'ils sont défilés dans la vue de l'utilisateur. -->
  <section class="card1" data-aos="zoom-in">
  
    <div class="item1">
      <div class="flap1"> 
        <p class="textt">"Travailler avec cette plateforme a été une expérience
          formidable pour moi. Leur équipe a été  attentive à mes
          besoins et m'a aidé à trouver des collaborations adaptées à
          mon style <div class=""></div></p>
      </div>
      <div class="flap2">
        <img src="img/1.png" alt="img1" srcset="">
      </div>
    </div>
  </section>
  

  </section>
  <!-- permettre de zoomer sur un élément lorsqu'il apparaît à l'écran --> 
  <section class="card1" data-aos="zoom-in">
    <!-- la classe  item1 reverse" pour permettre l affichage au sens inverse par rapport au precedent-->
    <div class="item1 reverse">
      <div class="flap1">
        <h2></h2>
        <p class="textt">"Travailler avec cette plateforme a été une expérience formidable
          . Je recommande vivement cette
          plateforme à tous les influenceurs qui cherchent à réussir dans
          cette industrie compétitive."</p>
      </div>
      <div class="flap2">
        <img src="img/2.png" alt="img2" srcset="">
      </div>
    </div>
  </section>
  <section class="card1" data-aos="zoom-in">
    <div class="item1">
      <div class="flap1">
        <h2></h2>
        <p class="textt">"En tant que marque émergente, nous avons cherché une solution efficace
          pour accroître notre visibilité sur les réseaux sociaux. Cette plateforme nous a
          aidé à atteindre nos objectifs grâce à son réseau d'influenceurs de qualité . Nous sommes ravis de
          continuer à travailler avec eux pour nos futures campagnes de marketing
          </p>
      </div>
      <!-- élément de bloc avec une classe nommée "flap2". Un élément <div> est généralement utilisé pour créer une zone de contenu générique 
        ou pour grouper des éléments HTML afin de les styliser avec des règles CSS. 
        La classe "flap2" pourrait être utilisée pour appliquer un style CSS spécifique à cet élément -->
      <div class="flap2">
        <img src="img/3.png" alt="img3" >
      </div>
    </div>
  </section>
  <!-- specifier la surface reservée au footer -->
  <div class="footer-area">
    <!-- specifier une surface intérieure dans footer-->
    <div class="footer-card">   
        </div>
      </div>
    </div>
  </div>
  <!--Partie de footer -->
  <footer>
    <div class="main-footer">
      <div class="logo">
        <img src="img/logo.png">
      </div>
      <!-- la classe stuff pour designer les elements groupes principalement dans le footer-->
      <div class="stuff">
        <div class="part1">
            <!-- Définir une div avec la classe "location", utilisée pour styliser la section dédiée à la localisation et informations de contact-->
          <div class="location">
            <img src="img/OIP.jpeg">
            <!-- specifier la localisation de centre de travail -->
            <p>120, Dream - Opposite Westgate, Krabi, FRANCE</p>
          </div>
          <div class="location">
            <img src="img/OIP (1).jpeg">
            <!-- donner la possibilite de contact via telephone -->
            <p>+91-7405388470</p>
          </div>
          <div class="location">
            <img src="img/OIP (2).jpeg">
             <!-- donner la possibilite de contact via mail -->
            <p>example@link.com</p>
          </div>
        </div>
        <div class="part1">
          <!-- ajouter des style dans l attribut html style -->
          <a style="color:white; font-size:small;" href="#about">A propos</a>
          <a href=""> </a>
          <a href=""></a>      
        </div>

        <!-- Inserer des icons de la bibiotheque cdn -->
        <div  class="part1 icons">
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-instagram"></i>
        </div>
      </div>
      <!-- Rappeler que les doits sont reserves a notre plateforme -->
      <div class="copyright">
      <p> <i class="fa fa-copywright"></i>Tous les droits sont reverses : 2023  <a href="https://www.frontendmentor.io/challenges/huddle-landing-page-with-alternating-feature-blocks-5ca5f5981e82137ec91a5100">Link</a></p>
    </div>
    </div>  
  </footer>
  <!--Partie pour ajouter du dynamisme a la page-->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
  // Définition d'une fonction nommée myfunction qui sera appelée plus tard
   function myfunction() {
  // Récupère l'élément HTML avec l'ID "img1" et modifie son style CSS
  // pour mettre sa propriété z-index à "1", ce qui le place au-dessus
  // de tous les autres éléments de la page qui ont un z-index inférieur
  document.getElementById("img1").style.zIndex = "1";
 // Définition d'une autre fonction nommée myfunction1 qui sera appelée plus tard
}
function myfunction1() {
  // Récupère l'élément HTML avec l'ID "img2" et modifie son style CSS
  // pour mettre sa propriété z-index à "-1", ce qui le place en-dessous
  // de tous les autres éléments de la page qui ont un z-index supérieur
  document.getElementById("img2").style.zIndex = "-1";
}
// Initialisation de la bibliothèque d'animation AOS (Animate On Scroll)
// qui ajoute des effets d'animation aux éléments lorsqu'ils sont défilés
// dans la vue de l'utilisateur. Cette fonction doit être appelée une seule fois
// au début de l'exécution de votre script.
    AOS.init();
  </script>
</body>
</html>