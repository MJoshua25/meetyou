<?php

  function age($date) {

    $age = date('Y') - date('Y', strtotime($date));

    if (date('md') < date('md', strtotime($date))) {
      return $age - 1;
    }

    return $age;
  }


  function getMatchs($user){
    $allUsers = [];
    $liste = [];
    $bdd = Database::connect();
    $req = $bdd -> prepare('SELECT * FROM individu WHERE id != :id_user'); // get all individu except $user
    $req -> execute(array('id_user' => $user->id));
    while($data = $req -> fetch()){  // if user exists
      $indiv = new Individu($data);
      $indiv->destroyPassword();
      array_push($allUsers,$indiv);
    }
    $req -> closeCursor(); // end of processing
    $bdd = Database::disconnect();

    foreach ($allUsers as $pers) {
      $cri_user = getCritere($user);
      $cri_pers = getCritere($pers);
      $ci_user = getCi($user);
      $ci_pers = getCi($pers);
      $nbr_cri_commun = count(array_intersect($cri_pers,$cri_user));
      $nbr_ci_commun = count(array_intersect($cri_pers,$cri_user));
      $taux_critère = ($nbr_cri_commun /count($cri_user))*0.5;//ici 0.5 represente niv_critere a 50 %
      $taux_ci = ($nbr_ci_commun /count($cri_user))*0.5;//ici 0.5 represente niv_ci a 50 %
      $taux = ($taux_critère + $taux_ci)*100;
    	$pers->taux = $taux;
      array_push($liste, $pers);

    	// if($pers->taux >= 60 && ){
      // 	array_push($liste, $pers);
    	// }

    }

    return $liste;

  }

  function getCritere($user){
    $criteres = [];
    $bdd = Database::connect();
    $req = $bdd -> prepare('SELECT age_deb, age_fin, sexe, teint, taille_deb, taille_fin, morphologie, nationalite, religion FROM critere WHERE id_critere = :id_user');
    $req -> execute(array('id_user' => $user->id_critere));
    $data = $req -> fetch();
    // array_push($criteres,$user->id);
    array_push($criteres,$data['age_deb']);
    array_push($criteres,$data['age_fin']);
    array_push($criteres,$data['sexe']);
    array_push($criteres,$data['teint']);
    array_push($criteres,$data['taille_deb']);
    array_push($criteres,$data['taille_fin']);
    array_push($criteres,$data['morphologie']);
    array_push($criteres,$data['nationalite']);
    array_push($criteres,$data['religion']);

    return $criteres;
  }

  function getCi($user){
    $bdd = Database::connect();
    $req = $bdd -> prepare('SELECT ci FROM centre_interet WHERE id_ci = :id_user');
    $req -> execute(array('id_user' => $user->id_ci));
    $data = $req -> fetch();
    $ci = explode(",",$data['ci']);

    return $ci;
  }



 ?>
