<?php

require '../config/Database.php';

$db = Database::connect();

$requette = $db->prepare("SELECT * FROM messages ORDER BY date DESC");
$requette->execute();

session_start();

while ($result = $requette-> fetch()) {
// code...

if ($result['id_expe'] == $_SESSION['id_expe'] && $result['id_desti'] == $_SESSION['id_desti']) {
  echo '

  <style>

    .s{
      background-color: black;
      padding: 10px;
      border-radius: 30px;
      color: white;
      font-size: 20px;
      text-align: left;
      margin : 10px;
      float: left;
      clear:both;
      transform: rotate(180deg);
      direction:ltr;
    }left


  </style>

  <div class="s"> '.$result['message'].' </div>

  ';
}

if ($result['id_desti'] == $_SESSION['id_expe'] && $result['id_expe'] == $_SESSION['id_desti']) {
  echo '

  <style>

    .r{
      border-color : black;
      border-width: 1px;
      border-style: solid;
      padding : 10px;
      border-radius: 30px;
      color : black;
      font-size : 20px;
      text-align: right;
      margin : 10px;
      float: right;
      clear:both;
      transform: rotate(180deg);
      direction:ltr;
    }

  </style>

  <div class="r"> '.$result['message'].' </div>

  ';
}


}

 ?>
