<?php

  $bdd = Database::connect();

  $req = $bdd->prepare("SELECT * FROM villes");
  $req->execute();

  while ($data = $req->fetch()) {
    echo "<option hidden id='{$data['id_ville']}' class='{$data['id_pays']}' value='{$data['id_ville']}'>{$data['nom_ville']}</option>";
  }

  $bdd = Database::disconnect();

 ?>
