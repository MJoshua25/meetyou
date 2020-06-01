<?php

  include '../../config/Database.php';
  include '../../models/Individu.php';
  include '../../php/functions.php';

  session_start();

  if (isset($_SESSION['user'])) {

    // Recuperation du user connecté
    $user = $_SESSION['user'];

    $bdd = Database::connect();

    // Recuperation de la description du user
    $req = $bdd->prepare("SELECT * FROM description WHERE id_description=?");
    $req->execute([$user->id_description]);

    $description = $req->fetch();

    // Recuperation des criteres du user
    $req = $bdd->prepare("SELECT * FROM critere WHERE id_critere=?");
    $req->execute([$user->id_critere]);

    $critere = $req->fetch();

    // Recuperation du pays de residence du user
    $req = $bdd->prepare("SELECT * FROM pays WHERE id_pays=?");
    $req->execute([$user->id_pays]);

    $pays = $req->fetch();

    // Recuperation de la ville de residence du user
    $req = $bdd->prepare("SELECT * FROM villes WHERE id_ville=?");
    $req->execute([$user->id_ville]);

    $ville = $req->fetch();

    // Recuperation de la nationalite du user
    $req = $bdd->prepare("SELECT * FROM pays WHERE id_pays=?");
    $req->execute([$user->id_pays]);

    $nationalite = $req->fetch();

    ?>

    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>

          <?php

              include("../../name.php");
              echo $name." | Profil";

          ?>

        </title>
        <link rel="stylesheet" href="../../css/profil.css">
      </head>
      <body>

        <?php include '../../stuffs/header.php'; ?>

        <div class="body">

          <div class="pp-container">
            <div class="pp">


              <img src="../../images/main3.png" alt="">
              <!-- Mettre le taux de compatibilité ici dans la div de class="icons" -->
              <div class="ico-value">
                <div class="icons"><img src="../../images/icons/icons8-coeur-match-50.png" alt="">80</div><!-- Mettre ici là ou il ya 80 -->
              </div>
              <!-- Nom et age ici  -->
              <div class="name-age">
                <p><?php echo $user->prenoms; ?>,<span>&nbsp<?php echo age($user->date_naissance); ?></span></p>
              </div>
              <!-- Metier et Ville -->
              <div class="pp-title">
                <div class="ic-job"></div>
                <p><?php echo $user->profession; ?></p>
                <div class="ic-lieu"></div>
                <p><?php echo $nationalite['nom_pays']; ?>&nbsp(<?php echo $ville['nom_ville']; ?>)</p>
              </div>

            </div>
          </div>

          <div class="tab">

            <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'Profil');"><img src="../../images/icons/icons8-utilisateur-50.png" alt=""><p>Profil</p></button>
            <button class="tablinks" onclick="openTab(event, 'CI')"><img src="../../images/icons/icons8-guitare-50.png" alt=""><p>Centres d'intérêt</p></button>
          </div>

          <div id="Profil" class="tabcontent">
            <div class="tabsupp">
              <div class="description">
                <h2>Ma description personnelle</h2>
              </div>
              <div class="container">
                <fieldset>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-règle-50.png" alt=""></div>
                    <h4><?php echo $description['taille']; ?> cm</h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-peau-50.png" alt=""></div>
                    <h4><?php echo $description['teint']; ?></h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-homme-debout-50.png" alt=""></div>
                    <h4><?php echo $description['morphologie']; ?></h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-genre-50.png" alt=""></div>
                    <h4><?php echo $user->sexe; ?></h4>
                  </div>
                </fieldset>

                <fieldset>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-globe-50.png" alt=""></div>
                    <h4><?php echo $pays['nom_pays']; ?></h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-bâtiments-de-la-ville-50.png" alt=""></div>
                    <h4><?php echo $ville['nom_ville']; ?></h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-langue-50.png" alt=""></div>
                    <h4><?php echo $nationalite['nom_pays']; ?></h4>
                  </div>
                </fieldset>
              </div>

            </div>


            <div id = "Prof-rech" class="tabsupp">
              <div class="description">
                <h2>Profil recherché</h2>
              </div>
              <div class="container">
                <fieldset>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-règle-50.png" alt=""></div>
                    <!-- TailleMatch ici -->
                    <h4>Entre <span id="tailleMatch_inf"><?php echo $critere['taille_deb']; ?></span> et <span id="tailleMatch_sup"><?php echo $critere['taille_fin']; ?></span> cm</h4>

                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-peau-50.png" alt=""></div>
                    <h4><?php echo ($critere['teint']==null) ? "Sans importance" : $critere['teint']; ?></h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-homme-debout-50.png" alt=""></div>
                    <h4><?php echo ($critere['morphologie']==null) ? "Sans importance" : $critere['morphologie']; ?></h4>
                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-genre-50.png" alt=""></div>
                    <h4><?php echo $critere['sexe']; ?></h4>
                  </div>
                </fieldset>
                <fieldset>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-age-50.png" alt=""></div>
                    <!-- ageMatch ici -->
                    <h4>De <span id="age_inf"><?php echo $critere['age_deb']; ?></span> à <span id="age_sup"><?php echo $critere['age_fin']; ?></span> ans</h4>

                  </div>
                  <div class="ico-value">
                    <div class="icons"><img src="../../images/icons/icons8-info-50.png" alt=""></div>
                    <textarea rows="3" cols="" placeholder="Informations suplementaires ..." name="infoSup" disabled>
                      <?php echo $critere['commentaire']; ?>
                    </textarea>
                  </div>
                </fieldset>
              </div>
            </div>

            <div  id = "info" class="tabsupp">
              <div class="description">
                <h2>Informations personnelles</h2>
              </div>
              <div class="info-content">
                <form action="#" method="post">

                  <input  type="text" name="nom" id="" placeholder="Nom" disabled >

                  <input  type="text" name="prenoms" id="" placeholder="Prenoms" disabled >

                  <select name="nationalite" disabled >
                      <option disabled selected value="">Nationalité</option>
                      <option value="">Element 1</option>
                      <option value="">Element 2</option>
                      <option value="">Element 3</option>
                  </select>

                  <select name="sexe" disabled >
                      <option disabled selected value="">Sexe</option>
                      <option value="">Homme</option>
                      <option value="">Femme</option>
                      <option value="">Autre ...</option>
                  </select>

                  <input  type="text"  name="tel" id="" placeholder="Telephone" disabled >

                  <select name="pays" disabled>
                      <option disabled selected value="" disabled >Pays de residence</option>
                      <option value="">Element 1</option>
                      <option value="">Element 2</option>
                      <option value="">Element 3</option>
                  </select>

                  <select name="ville" disabled >
                      <option disabled selected value="">Ville</option>
                      <option value="">Element 1</option>
                      <option value="">Element 2</option>
                      <option value="">Element 3</option>
                  </select>
                  <button type="button" name="modifier"  id="btn_modifier" onclick="enable_info();">Modifier les infos personnelles</button>

                  <input type="submit" name="valider" id="btn_valider" value="Valider">

                </form>

              </div>

            </div>
          </div>


          <!-- <div id="Photo" class="tabcontent">
            <h2>Photo</h2>
            <p>Paris is the capital of France.</p>
          </div> -->

          <div id="CI" class="tabcontent">
            <div class="tabsupp">
              <div class="description">
                <h2>Centres d'intérêt</h2>
              </div>
              <div class="container">

                <fieldset id="loisirs" disabled>
                  <legend>Mes loisirs sont:
                    <span  class="topright" onclick="enable('loisirs')">🖊️</span>
                  </legend>
                  <textarea name="loisirs" rows="5" cols="80">Vous n'avez pas encore ajouté vos centres d'intérêt.</textarea>
                </fieldset>

                <fieldset id="musique" disabled>
                  <legend>Mes styles de musque préférés:
                    <span  class="topright" onclick="enable('musique')">🖊️</span>
                  </legend>

                  <textarea name="musique" rows="5" cols="80">Vous n'avez pas encore ajouté vos centres d'intérêt.</textarea>
                </fieldset>

                <fieldset id="sport" disabled>
                  <legend>Mes activités sportives:
                    <span  class="topright" onclick="enable('sport')">🖊️</span>
                  </legend>
                  <textarea name="sport" rows="5" cols="80" >Vous n'avez pas encore ajouté vos centres d'intérêt.</textarea>
                </fieldset>

              </div>
            </div>

          </div>

        </div>

        <?php include '../../stuffs/footer.php'; ?>

        <script>
          function openTab(evt, option) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(option).style.display = "block";
            evt.currentTarget.className += " active";
        }
        function enable(id){
          document.getElementById(id).disabled = false;
        }
        function enable_info(){
          var items = document.querySelectorAll('#info input[type="text"]');
          var items2 = document.querySelectorAll('#info select');
          for (var i = 0; i < items.length; i++) {
            items[i].disabled = !items[i].disabled;
          }
          for (var j = 0; j < items2.length; j++) {
            items2[j].disabled = !items2[j].disabled;
          }
          document.getElementById('btn_modifier').style.display="none";
          document.getElementById('btn_valider').style.display="block";
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
      </script>
      </body>

    </html>


    <?php

  } else {
    header("location: ../../");
  }


 ?>
