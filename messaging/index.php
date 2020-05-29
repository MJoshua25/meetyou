<?php

if (isset($_POST['valider'])) {

  session_start();

  $_SESSION['id_expe'] = $_POST['id_expe'];
  $_SESSION['id_desti'] = $_POST['id_desti'];

  header('location: home.php');

} else {

 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
     <form class="home-screen" action="" method="post">
       <input type="text" class="t" name="id_expe" value="" placeholder="id expediteur (Numero quelconque)">
       <input type="text" class="t" name="id_desti" value="" placeholder="id destinataire (Numero quelconque)">
       <input type="submit" class="s" name="valider" value="Connexion">

       <!-- pour pouvoir voir si les messages sont bien reçus, il faut se reconnecter en inversant les nombres saisis
       a la premiere connexion.
       NB :  Ya pas bug dans code ça la ta mercon ! -->

     </form>
   </body>
 </html>

  <?php

}

 ?>
