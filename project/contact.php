<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $msg= mysqli_real_escape_string($conn, $_POST['msg']);
   
   $insert = mysqli_query($conn, "INSERT INTO `contact`(name, email, msg) VALUES('$name', '$email', '$msg')") or die('query failed');

         if($insert){
           
            $message[] = 'send successfully!';
            header('location:contact.php');
         }else{
            $message[] = 'sent failed!';
         }
   }
   



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/style0.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Contactez-nous</h3>
          <p class="text">
            Par ce contacte vous pouvez demander la suppression de votre compte de la platforme et vous pouvez poser n'imorte quelle question a propos de la platforme
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>92 Cherry Drive Uniondale, NY 11553</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>link@email.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>+200 53-779 88</p>
            </div>
          </div>

          <div class="social-media">
            <p>Contactez-nous sur :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="post" autocomplete="off">
            <h3 class="title">Contactez-nous</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Nom utilisateur</label>
              <span>Nom utilisateur</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container textarea">
              <textarea name="msg" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="envoyer" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="script0.js"></script>
  </body>
</html>