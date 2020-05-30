<?php

  $bdd = Database::connect();

  $req = $bdd->prepare("SELECT * FROM liste_centre_interet");
  $req->execute();

  while ($data = $req->fetch()) {
    echo "<li><input type='checkbox' name ='ci[]' id='check{$data['id_ci']}' value='{$data['ci']}'><label for='check{$data['id_ci']}'>{$data['ci']}</label></li>";
  }

  $bdd = Database::disconnect();

 ?>
