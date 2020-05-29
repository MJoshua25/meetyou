
<?php

  include '../../config/Database.php';
  include '../../models/Individu.php';

  session_start();

  if (isset($_SESSION['user'])) {

    $user = $_SESSION['user'];

    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>
          <?php
              include("../../name.php");
              echo $name." | Welcome !";
          ?>
        </title>

        <link rel="stylesheet" href="../../css/welcome.css">
      </head>
      <body>
        <?php include '../../stuffs/header.php'; ?>
        <div class="body">
          <div class="bg-image">
            <!-- Nom de l'utilisateur ici -->
            <div class="name">
              <p>Bienvenue,&nbsp<span><?php echo $user->nom; ?></span></p>
            </div>
            <!-- Photo user -->
            <div class="photo">
              <img src="../../images/a5b832097e960f42da8d6b1063187ea0.png" alt="photoUser">
            </div>
          </div>

          <div class="main">
            <!-- Overview profis compatibles -->
            <div class="msg-box" id="prof_comp">
              <div class="header">Profils compatibles</div>
                <!-- Photos profils compatibles -->
              <div class="container">
                <div class="photo photo-match">
                  <img src="../../images/main3.png" alt="">
                  <div class="info_match">
                    <p>Lucie,&nbsp<span>19</span></p>
                  </div>
                </div>
                <div class="photo photo-match">

                </div>
                <div class="photo photo-match">

                </div>
              </div>
              <div class="consul"><a href="matches.php">Consulter vos profils compatibles</a></div>
            </div>
            <!--Fin Overview profis compatibles -->

            <!-- Overview Messages -->
            <div class="msg-box" id="messages">
              <div class="header">Messages</div>
              <a href="#">
                <div class="container">
                  <div class="photo photo-msg">
                    <img src="../../images/main3.png" alt="img">
                  </div>
                  <div class="cont-info">
                    <h4>Jerry</h4>
                    <p>Lundi 4 Mars 2018 18:02</p>
                    <span>Message here...</span>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="container">
                  <div class="photo photo-msg">
                    <img src="../../images/main3.png" alt="img">
                  </div>
                  <div class="cont-info">
                    <h4>Jerry</h4>
                    <p>Lundi 4 Mars 2018 18:02</p>
                    <span>Message here...</span>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="container">
                  <div class="photo photo-msg">
                    <img src="../../images/main3.png" alt="img">
                  </div>
                  <div class="cont-info">
                    <h4>Jerry</h4>
                    <p>Lundi 4 Mars 2018 18:02</p>
                    <span>Message here...</span>
                  </div>
                </div>
              </a>
              <a href="#">
                <div class="container">
                  <div class="photo photo-msg">
                    <img src="../../images/main3.png" alt="img">
                  </div>
                  <div class="cont-info">
                    <h4>Jerry</h4>
                    <p>Lundi 4 Mars 2018 18:02</p>
                    <span>Message here...</span>
                  </div>
                </div>
              </a>
            </div>
            <!--Fin Overview Messages -->
          </div>
        </div>
        <?php include '../../stuffs/footer.php'; ?>
      </body>
    </html>


    <?php

  } else {
    header('location: ../..');
  }

 ?>
