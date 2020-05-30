
<?php

  include('../config/Database.php') ;

  session_start();

  if(
    isset($_POST['nom']) && isset($_POST['prenoms']) && $_SESSION['email'] && $_SESSION['password'] && isset($_POST['date_naissance']) &&
    isset($_POST['nationalite']) && isset($_POST['sexe']) && $_POST['profession'] && $_POST['religion'] && isset($_POST['telephone']) &&
    isset($_POST['pays']) && isset($_POST['ville']) && isset($_POST['taille']) && isset($_POST['teint']) && isset($_POST['morphologie']) &&
    isset($_POST['commentaire']) && isset($_POST['ci']) && isset($_POST['sexeMatch']) && isset($_POST['ageMatch_deb']) && isset($_POST['ageMatch_fin']) &&
    isset($_POST['tailleMatch_deb']) && isset($_POST['tailleMatch_fin']) && isset($_POST['teintMatch']) && isset($_POST['morphologieMatch']) &&
    isset($_POST['nationaliteMatch']) && isset($_POST['commentaireMatch'])
  )

  {

    // Recuperation des infos et de la description de celui qui s'inscrit
    $nom = $_POST['nom'];
    $prenoms = $_POST['prenoms'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $date_naissance = $_POST['date_naissance'];
    $nationalite = $_POST['nationalite'];
    $sexe = $_POST['sexe'];
    $profession = $_POST['profession'];
    $religion = $_POST['religion'];
    $telephone = $_POST['telephone'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $taille = $_POST['taille'];
    $teint = $_POST['teint'];
    $morphologie = $_POST['morphologie'];
    $commentaire = $_POST['commentaire'];
    //$ci = $_POST['ci[]'];

    // Destruction de la session créee
    session_destroy();

    // Recuperation des infos sur le profil recherché
    $sexeMatch = $_POST['sexeMatch'];
    $ageMatch_deb = $_POST['ageMatch_deb'];
    $ageMatch_fin = $_POST['ageMatch_fin'];
    $tailleMatch_deb = $_POST['tailleMatch_deb'];
    $tailleMatch_fin = $_POST['tailleMatch_fin'];
    $teintMatch = $_POST['teintMatch'];
    $morphologieMatch = $_POST['morphologieMatch'];
    $nationaliteMatch = $_POST['nationaliteMatch'];
    $religionMatch = $_POST['religionMatch'];
    $commentaireMatch = $_POST['commentaireMatch'];
    $ci = implode(',',$_POST['ci']);

    // Verifier si certains criteres n'ont pas d'importance pour le user
    if ($teintMatch == 'null') {
      $teintMatch = null;
    }

    if ($morphologieMatch == 'null') {
      $morphologieMatch = null;
    }

    if ($nationaliteMatch == 'null') {
      $nationaliteMatch = null;
    }

    if ($religionMatch == 'null') {
      $religionMatch = null;
    }

    // Generation d'un id pour les champs id_description,id_ci et id_critere de la table individu
    $id = uniqid('',true);

    // Connexion à la base de donnees
    $bdd = Database::connect();

    // Insertion dans la table description
    $req = $bdd->prepare("INSERT INTO description VALUES(?,?,?,?,?)");
    $req->execute([$id,$taille,$teint,$morphologie,$commentaire]);

    // Insertion dans la table critere
    $req = $bdd->prepare("INSERT INTO critere VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute([$id,$ageMatch_deb,$ageMatch_fin,$sexeMatch,
    $teintMatch,$tailleMatch_deb,$tailleMatch_fin,$morphologieMatch,
    $nationaliteMatch,$religionMatch,$commentaireMatch]);

    //Insertion dans la table centre_interet
    $req = $bdd->prepare("INSERT INTO centre_interet VALUES(?,?)");
    $req->execute([$id,$ci]);

    // Insertion dans la table individu
    $req = $bdd->prepare("INSERT INTO individu VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute([null,$nom,$prenoms,$email,$telephone,$password,$sexe,$date_naissance,
    $profession,null,date("Y-m-d H:i:s"),$nationalite,$religion,$ville,$pays,$id,$id,$id]);

    $req -> closeCursor();

    header('location: ../?success');

  }

 ?>
