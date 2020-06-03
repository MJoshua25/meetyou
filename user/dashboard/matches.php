<?php

  include '../../config/Database.php';
  include '../../models/Individu.php';
  include '../../php/functions.php';

  session_start();

  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $user->matches = getMatchs($user);
    $matchs = $user->matches;
    // echo("Taille = ".count($matchs));
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>
          <?php
              include("../../name.php");
              echo $name." | Bienvenue chez vous !";
          ?>
      </title>
      <link rel="stylesheet" href="../../css/settings.css">
  </head>
  <body>

    <header>
      <?php include '../../stuffs/header.php'; ?>
    </header>

    <div class="body" id="prof_comp">
      <!-- Div préférences -->
      <div class="list" id="pref">
        <h3>Vos préférences</h3>
        <!-- Age ici -->
        <h3>Age</h3>
        <span>De <span id="age_inf">18</span> à <span id="age_sup">60</span> ans</span>
        <!-- Taille ici -->
        <h3>Taille</h3>
        <span>Entre <span id="tailleMatch_inf">100</span> et <span id="tailleMatch_sup">200</span>  cm</span>

        <h3>Origine et religion</h3>
        <!-- origine ici -->
        <span>Sans importance</span><br>
        <!-- religion ici -->
        <span>Musulman</span> <br>
        <a href="settings.php#preferences">
          <button class="" type="button" name="button">Modifier</button>
        </a>
      </div>
      <!-- Div overview match -->
      <div class="screen" id="profils">


        <?php

          foreach ($matchs as $match) {
              $taux =round($match->taux, 0);
              $age = age($match->date_naissance);
            echo'

            <div class="content profil" >
              <div class="container">
                <div class="photo">
                  <!-- Photo matches -->
                  <img src="../../images/user.webp">
                </div>
                <div class="info_match">
                  <!-- Nom matches -->
                  <h2>'.$match->nom.',&nbsp'.$age.'&nbsp&nbsp<span>taux = '.$taux.'</span></h2>
                  <div class="line">
                    <div class="ic-job"></div>
                    <!-- Emploi matches -->
                    <label class="label-10">'.$match->profession.'</label>
                  </div>
                  <br>
                  <div class="line">
                    <div class="ic-lieu"></div>
                    <!-- Lieu de residence -->
                    <label class="label-10">'.getNationalite($match->id_pays).','.getVille($match->id_ville).'</label>
                  </div>
                  <div class="line">
                    <button class="btn" type="button" name="btn_msg" onclick=""><div class="ic-msg"><p>Envoyer un message</p></div></button>
                    <button class="btn blue" type="button" name="btn_profil" onclick="" ><div class="ic-profil"><p>Voir le profil</p></div></button>
                  </div>

                </div>
                <div class="photo taux">
                  <!-- Photo matches -->
                  <img src="../../images/gif/heart2.gif">
                </div>
              </div>
            </div>

            ';
        }
        ?>


        <!-- <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>

        <div class="content profil" >
          <div class="container">
            <div class="photo">
              <img src="../../images/user.webp">
            </div>
            <div class="info_match">

              <h2>Elodie,&nbsp<span>24</span></h2>
              <div class="line">
                <div class="ic-job"></div>
                <label class="label-10">Profession</label>
              </div>
              <br>
              <div class="line">
                <div class="ic-lieu"></div>
                <label class="label-10">Abidjan,cocody</label>
              </div>
              <div class="line">
                <button class="btn" type="button" name="btn_msg"><div class="ic-msg"><p>Envoyer un message</p></div></button>
                <button class="btn blue" type="button" name="btn_profil" ><div class="ic-profil"><p>Voir le profil</p></div></button>
              </div>

            </div>
          </div>
        </div>
   -->


      </div>
      </div>


    </div>

  </body>
  </html>
  <?php

  }else {
    header("location: ../../");
  }

?>
