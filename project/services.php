<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Webpage Title -->
        <title>Services</title>
        
        <!-- Importaion de style pour: -->
        <href="css/fontawesome-all.min.css" rel="stylesheet"> <!-- Typographie -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Icons -->
        <link href="css/services.css" rel="stylesheet"> <!-- Page css -->
    </head>
    <body>
        
        <!-- Navigation -->
        <div class="navbar">
            <div class="container flex">
                <div class="logo-top"> 
                    <!--Insertion de l'image logo avec l'extention png, si jamais il y a erreur dans son affichage , le mot logo va s'afficher comme texte alternatif  -->
                    <img class="" src="img/logo.png" alt="logo">
                </div>
            </div> <!-- fin de container -->
        </div> <!-- fin de navbar -->
        <!-- fin de navigation -->
        
        <!-- Header -->
        <header>
            <div class="container">
                <div class="text-container">                   
                    <h1 class="h1-large">Bienvenue Sur Votre Espace <br> De Collaboration Link</h1>
                    <p id="slogan">" Connectez, Collaborez, Prosperez </p>
                    <a class="btnC" href="code1.php">Rjoignez nous</a>
                </div> <!-- fin de text-container -->
            </div> <!-- fin de container -->
        </header> <!-- fin de header -->
        <!-- fin de header -->


        <!-- Services -->
        <div id="services" class="services">
           <!-- <div class="container">-->
            <div class="cartes">
                <h4>Nos services</h4>
                <!--Un text descriptif-->
                <p class="serv">Une gamme complète de services pour maximiser l'impact <br> de vos campagnes de promotion</p>
                <div class="row">
                    <div class="box">
                      <img src="img/Analyse d'audience.png" alt="photo1">
                        <h3>Analyse d'audience</h3>
                           <p>Comprenez votre public cible et à créer des campagnes de marketing d'influence plus efficaces et plus pertinentes.</p>
                        <button class="btnP">10$</button>
                    </div>
                    <div class="box">
                      <img src="img/la gestion de campagnes publicitaires.png" alt="photo2">
                            <h3>Gestion des publicités</h3>
                         <p>Atteindrez votre public cible avec des campagnes efficaces et à fort impact avec stratégies publicitaires</p>    
                            <button class="btnP">30$</button>
                    </div>
                    <div class="box">
                     <img src="img/l'optimisation de contenu.png" alt="photo3">
                        <h3>Optimisation de contenu</h3>
                           <p>Améliorez la qualité de votre contenu pour votre public spécifique, ainsi qu'à augmenter votre engagement.</p>   
                            <button class="btnP">30$</button>
                    </div>
                </div> <!-- fin de row-->
          </div>  <!-- fin de cartes-->
        </div> <!-- fin de services -->
        </div> <!-- fin de container -->
        </div> <!-- fin de contact -->
        <!-- fin de contact -->

                <!-- Formulaire de Contact-->
                <p class="p-large">Nous contactez:</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control-input" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control-input" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control-textarea" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button">Envoyer</button>
                    </div>
                </form>
                <!-- fin de contact form -->

        <!--footer-->
        <footer>
            <div class="main-footer">
              <div class="logo">
                <img src="img/logo.png">
              </div>
              <div class="stuff">
                <div class="part1">
                  <div class="location">
                    <p class="about-us">Chez Look, nous sommes passionnés par la création d'expériences de marketing <br>
                        engageantes qui permettent à nos clients de se connecter avec votre public cible. <br> 
                        Notre équipe est composée de professionnels du marketing expérimentés 
                        et passionnés<br>, qui travaillent ensemble pour offrir des solutions marketing efficaces et innovantes.
                    </p>
                  </div>
                  <div class="location">
                    <img src="img/OIP (1).jpeg">
                    <p>+91-7405388470</p>
                  </div>
                  <div class="location">
                    <img src="img/OIP (2).jpeg">
                    <p>example@link.com</p>
                  </div>
                </div>
                <div class="part">
                  <p id="CTA">Veuillez visiter ceci:</p>
                  <p><a href="code1">Home</a></p>
                  <p><a href="#">What We Do</a></p>
                  <p><a href="#">FAQ</a> </p>
                </div>
        
                <div class="part1 icons">
                <p>Veuillez nous suivre sur:</p>
                  <i class="fa-brands fa-facebook"></i>
                  <i class="fa-brands fa-twitter"></i>
                  <i class="fa-brands fa-instagram"></i>
                </div>
              </div>
            </div>
            <div class="copyright">
              <p> <i class="fa fa-copywright"></i>Tous les droits sont reverses : 2023   <a href="code1.php">Link</a></p>
            </div>
          </footer>
    </body>
</html>