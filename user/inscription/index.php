<?php

  include '../../config/Database.php';

  if (isset($_POST['mail_reg']) and isset($_POST['pwd_reg'])) {

    $bdd = Database::connect();

    $req = $bdd->prepare("SELECT * FROM individu WHERE email=?");
    $req->execute([$_POST['mail_reg']]);

    if($exist = $req->fetch()) {

      echo '<script>alert("'."L'email saisi est déja utilisé par un autre compte !".'");</script>';

      header('location: ../../?exist');

    } else {

      session_start();

      $_SESSION['email'] = $_POST['mail_reg'];
      $_SESSION['password'] = $_POST['pwd_reg'];

    ?>

      <!DOCTYPE html>
      <html lang="fr">
          <head>
              <title>
                  <?php
                      include("../../name.php");
                      echo $name." | Inscription !";
                  ?>
              </title>

              <meta charset="UTF-8">
              <link href="../../css/inscription.css" rel="stylesheet">

              <script>

                  function changeImg() {
                      document.getElementById("pic").src = "images/images.jpeg";
                  }

              </script>

          </head>

          <body>
            <header>
              <nav>
                <div>
                  <p>Y😍u<span>Meet</span></p>
                </div>
              </nav>

            </header>

            <!-- progressbar -->
          <div class="progress">
            <ul id="progressbar">
              <li class ="etape">Informations</li>
              <li class ="etape">Description</li>
              <li class ="etape">Centres d'interet</li>
              <li class ="etape">Profil recherché</li>
            </ul>
          </div>
          <!-- progressbar -->

              <form id="msform" action="../../php/signup.php" method="post">

                <fieldset class="tab">
                  <!-- Informations de l'utilisateur ici le nom des variables est explicite -->
                  <h1>Informations personnelles !</h1>
                      <!-- <img src="" id="pic" required onClick="changeImg()">
                      <input required type="file" oninput="this.className = ''"  name="" id="parcourir" > -->
                      <input  type="text" oninput="this.className = ''"  name="nom" id="" placeholder="Nom">

                      <input  type="text" oninput="this.className = ''"  name="prenoms" id="" placeholder="Prenoms">

                      <input  type="date" oninput="this.className = ''"  name="date_naissance" id="" placeholder="Date de naissance">

                      <select class="" name="nationalite">
                        <option disabled selected value="">Nationalité</option>
                        <?php include 'pays.php'; ?>
                      </select>

                      <select required name="sexe">
                          <option disabled selected value="">Sexe</option>
                          <option value="Homme">Homme</option>
                          <option value="Femme">Femme</option>
                          <option value="Inconnu">Autre ...</option>
                      </select>

                      <input  type="text" oninput="this.className = ''"  name="profession" id="" placeholder="Profession">

                      <select required name="religion">
                          <option disabled selected value="">Religion</option>
                          <option value="Juif">Juif</option>
                          <option value="Chretien">Chrétien</option>
                          <option value="Musulman">Musulman</option>
                          <option value="Boudhiste">Boudhiste</option>
                          <option value="Inconnue">Autre..</option>
                      </select>

                      <input  type="tel" oninput="this.className = ''"  name="telephone" id="tel" placeholder="Telephone">
                      <p id="error">error</p>

                      <select onchange="getVilles(document.getElementById('pays').value);" required id="pays" name="pays">
                        <option disabled selected value="">Pays de residence</option>
                        <?php include 'pays.php'; ?>
                      </select>

                      <select required id="ville" name="ville">
                          <option disabled selected value="">Ville</option>
                          <?php include 'villes.php'; ?>
                      </select>

                      <input type="button" name="next" class="next action-button" value="Suivant" onclick="nextPrev(1);">
                </fieldset>

                <fieldset class="tab">

                  <h1>Comment vous decririez vous ?</h1>
                  <!-- Description de l'utilisateur -->
                  <div class="part-2">
                      <select name="taille" id="tailleUser">
                          <option selected disabled value="">Votre taille (cm)</option>
                      </select>

                      <select name="teint">
                          <option selected disabled value="">Teint</option>
                          <option value="Clair">Clair</option>
                          <option value="Noir">Noir</option>
                          <option value="Bronze">Bronzé</option>
                      </select>

                      <select name="morphologie">
                          <option selected disabled value="">Morphologie</option>
                          <option value="Mince">Mince</option>
                          <option value="Gros">Gros</option>
                          <option value="Autre">Autre ...</option>
                      </select>

                      <h1>Dites-nous en plus sur vous ! (facultatif)</h1>
                      <textarea rows="3" cols="" placeholder="Informations suplementaires ..." name="commentaire"></textarea>
                  </div>

                  <input type="button" name="previous" class="previous action-button" value="Précédent" id="prevBtn" onclick="nextPrev(-1)" />
                  <input type="button" name="next" class="next action-button" value="Suivant" id="nextBtn" onclick="nextPrev(1)" />

                </fieldset>
                <fieldset class="tab">
                  <h1>Vos centres d'intérêt</h1>
                  <h4>Veuillez choisir vos centres d'intérêt dans la liste ci dessous(5choix ou plus)</h4>
                  <div class="container">
                    <ul class="ci">
                      <?php include 'interets.php'; ?>
                      <!-- <li><input type="checkbox" name ="ci[]" id="check1" value="Sport"><label for="check1">Sport</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check2" value="Lecture"><label for="check2">Lecture</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check3" value="Musique"><label for="check3">Musique</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check4" value="Science"><label for="check4">Science</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check5" value="Mode"><label for="check5">Mode</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check6" value="Cinema/Animation"><label for="check6">Cinema/Animation</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check7" value="Nature"><label for="check7">Nature</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Voyage"><label for="check1">Voyage</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Plage"><label for="check1">Plage</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Decouverte"><label for="check1">Decouverte</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Education"><label for="check1">Education</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Danse"><label for="check1">Danse</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Technologie"><label for="check1">Technologie</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Karaoke"><label for="check1">Karaoke</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Manga/Animes"><label for="check1">Manga/Animes</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Culture"><label for="check1">Culture</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Histoire"><label for="check1">Histoire</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Politique"><label for="check1">Politique</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Religion"><label for="check1">Religion</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Pornographie"><label for="check1">Pornographie</label></li>
                      <li><input type="checkbox" name ="ci[]" id="check1" value="Divers"><label for="check1">Divers</label></li> -->
                    </ul>
                </div>
                <input type="button" name="previous" class="previous action-button" value="Précédent" id="prevBtn" onclick="nextPrev(-1)" />
                <input type="button" name="next" class="next action-button" value="Suivant" id="nextBtn" onclick="nextPrev(1)" />
                </fieldset>

                <fieldset class="tab">

                  <div class="part-4" id="part4">
                      <h1>Quel profil recherchez vous ?</h1>
                      <!-- Description du profil que l'utilisateur recherche le nom des variables est suivi de "Match"
                    ex: sexeMatch pour le sexe que l'utilisateur recherche  -->
                      <select required name="sexeMatch">
                          <option disabled selected value="">Sexe</option>
                          <option value="Homme">Homme</option>
                          <option value="Femme">Femme</option>
                          <option value="Inconnu">Autre ...</option>
                      </select>

                      <!-- <input type="text" oninput="this.className = ''"  name="ageMatch" placeholder="Age">

                      <input type="text" oninput="this.className = ''"  name="tailleMatch" placeholder="Taille(en cm)"> -->

                      <div class="line">
                        <!-- Age -->
                        <label>Tranche d'age recherchée :</label>
                        <select required id="ageMatch_inf" name="ageMatch_deb">
                          <option value="" selected disabled>0</option>
                        </select>
                        <label for="ageMatch_sup">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspà</label>
                        <select required id="ageMatch_sup" name="ageMatch_fin" >
                          <option value="" selected disabled>0</option>
                        </select>
                      </div>
                      <!-- Taille -->
                      <div class="line">
                        <label>Taille (cm) comprise entre :</label>
                        <select required id="tailleMatch_inf" name="tailleMatch_deb">
                            <option value="" selected disabled>0</option>
                        </select>
                        <label for="tailleMatch_sup">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspet</label>
                        <select required id="tailleMatch_sup" name="tailleMatch_fin">
                            <option value="" selected disabled>0</option>
                        </select>
                      </div>

                      <select required name="teintMatch">
                          <option selected disabled value="">Teint</option>
                          <option value="null">Sans importance</option>
                          <option value="Clair">Clair</option>
                          <option value="Noir">Noir</option>
                          <option value="Bronze">Bronzé</option>
                      </select>

                      <select required name="morphologieMatch">
                          <option selected disabled value="">Morphologie</option>
                          <option value="null">Sans importance</option>
                          <option value="Mince">Mince</option>
                          <option value="Gros">Gros</option>
                          <option value="Autre">Autre ...</option>
                      </select>

                      <select class="" name="nationaliteMatch">
                        <option disabled selected value="">Nationalité</option>
                        <option value="null">Sans importance</option>
                        <?php include 'pays.php'; ?>
                      </select>

                      <select required name="religionMatch">
                          <option disabled selected value="">Religion</option>
                          <option value="null">Sans importance</option>
                          <option value="Juif">Juif</option>
                          <option value="Chretient">Chrétient</option>
                          <option value="Musulman">Musulman</option>
                          <option value="Boudhiste">Boudhiste</option>
                          <option value="Inconnue">Autre..</option>
                      </select>

                      <h1>Que recherchez vous chez la personne ? (facultatif)</h1>
                      <textarea rows="3" cols="" placeholder="Informations suplementaires ..." name="commentaireMatch"></textarea>

                  </div>

                  <input type="button" name="previous" class="previous action-button" value="Précédent" id="prevBtn" onclick="nextPrev(-1)">
                  <input type="submit" name="submit" id="submit" class="submit action-button" value="Valider">

                </fieldset>

              </form>
              <script type="text/javascript">
                setvalue("tailleUser",100,200);
                setvalue("ageMatch_inf",18,60);
                setvalue("ageMatch_sup",18,60);
                setvalue("tailleMatch_inf",100,200);
                setvalue("tailleMatch_sup",100,200);
                function setvalue(id,n,m){
                  var select = document.getElementById(id);
                  for(var i = n; i <= m; i++) {
                    var el = document.createElement("option");
                    el.textContent = i;
                    el.value = i;
                    select.appendChild(el);
                  }
                }

                var options = [];

                function getVilles(className) {
                  if (options.length != 0) {
                    for (var opt in options) {
                      if(document.getElementById(opt) != null) {
                        document.getElementById(opt).hidden = true;
                      }
                    }
                  }
                  var opts = document.getElementsByClassName(className);
                  options = opts;
                  if (opts.length != 0) {
                    for (var opt in opts) {
                      if(document.getElementById(opt) != null) {
                        document.getElementById(opt).hidden = false;
                      }
                    }
                  }
                }

              </script>
              <script type="text/javascript" src="../../js/inscription.js"></script>
          </body>
      </html>


    <?php
    }

    $req -> closeCursor();

    $bdd = Database::disconnect();

  }else {

    header('location: ../../');

  }

 ?>
