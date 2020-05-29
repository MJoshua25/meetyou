<?php

  require '../config/Database.php';
  $db = Database::connect();

  if (!empty($_POST['message']) && trim($_POST['message'])!=""){

    session_start();

    $id_expedi = $_SESSION['id_expe'];
    $id_desti = $_SESSION['id_desti'];
    $datetime = date('Y-m-d H:i:s');
    $message = $_POST['message'];

    $requette = $db->prepare("INSERT INTO messages (id_expe,id_desti,message,date) VALUES (?,?,?,?)");
    $requette->execute([$id_expedi,$id_desti,$message,$datetime]);

    echo "<div class='success'>Message envoyé !</div>";

  }else {
    echo "<div class='error'>Veuillez saisir un message !</div>";
  }

 ?>
