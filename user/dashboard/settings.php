<?php

  include '../../config/Database.php';
  include '../../models/Individu.php';

  session_start();

  if (isset($_SESSION['user'])) {

    $user = $_SESSION['user'];



    ?>

    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="../../css/settings.css">
      </head>
      <body>
        <header>
          <?php include '../../stuffs/header.php'; ?>
        </header>

        <div class="body">
          <div class="container">
            <!-- Div de gauche : liste-->
            <div class="list" id="params">
              <a href="#param-connexion"><h4>Paramètres de connexion</h4></a>
              <a href="#preferences"><h4>Vos préférences</h4></a>

            </div>
            <!-- Div de droite : screen -->
            <div class="screen" id="parametre">

              <!-- Div Paramètres de connexion -->
              <div class="content" id="param-connexion">
                <div class="description">
                  <h2>Paramètres d'emailing</h2>
                </div>
                <form class="" action="#" method="post" name="form_mail">
                  <div class="line">
                    <label for="mail">Adresse email:</label>
                    <input type="text" name="mail" value="<?php echo $user->email; ?>" placeholder="papitou@popito.com" onchange="save(1);">
                  </div>
                  <div class="line">
                    <input type="checkbox" name="mail_pub" value="">
                    <label for="mail">Adresse email publique(Visible sur le profil)</label>
                  </div>
                  <div class="line">
                    <input type="checkbox" name="mail_pub" value="">
                    <label for="mail">Je souhaite recevoir les newsletters du site</label>
                  </div>
                  <div class="line">
                    <input type="checkbox" name="mail_pub" value="">
                    <label for="mail">Je souhaite recevoir mes notifications par email</label>
                  </div>

                  <input id="btn_mail" type="submit" name="" value="Enregistrer" disabled>
                </form>

                <!-- Modification mot de passe -->
                <div class="description">
                  <h2>Modification du mot de passe</h2>
                </div>
                <form class="" action="index.html" method="post" name="form_mdp" id="form_mdp">
                  <div class="line">
                    <label for="new_mdp">Mot de passe:</label>
                    <input type="password" name="new_mdp" value="" placeholder="Entrer votre nouveau mot de passe ici">
                  </div>
                  <div class="line">
                    <label for="conf_new_mdp">Confirmation :</label>
                    <input type="password" name="conf_new_mdp" value="" placeholder="Confirmer le mot de passe" onchange="save(2);">
                  </div>
                  <input id="btn_mdp" type="submit" name="" value="Enregistrer" disabled >
                </form>

                <!-- Fermer mon compte -->
                <div class="description">
                  <h2>Fermer mon compte</h2>
                </div>

                <div class="line">
                  <p>Une fois votre compte fermé vous ne pourrez plus avoir accès à votre compte, vos profils compatibles
                  <br>ainsi que tous les services proposés sur ce site</p>
                  <br>Cliquez <a href="#" id="fermer_compte" >ici</a> pour fermer définitivement votre compte</p>
                </div>
              </div>
              <!-- Fin Div Paramètre de connexion -->

              <!-- Div Vos préférence -->
              <div class="content" id="preferences">
                <!-- Age et Taille -->
                <div class="description">
                  <h2>Age et taille</h2>
                </div>
                <form class="" action="index.html" method="post" name="form_pref" id="from_pref">
                  <div class="line">
                    <label>Tranche d'age recherchée :</label>
                    <select class="" name="age_inf" onchange="save(3);" >
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="19">20</option>
                    </select>
                    <label for="sup">à</label>
                    <select class="" name="age_sup" onchange="save(3);" >
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                  </div>
                  <div class="line">
                    <label>Taille comprise entre :</label>
                    <input type="text" name="taille_inf" value="" placeholder="...cm" onchange="save(3);" >
                    <label for="sup">et</label>
                    <input type="text" name="taille_sup" value="" placeholder="...cm" onchange="save(3);" >
                  </div>
                  <div class="description" id="ori">
                    <h2>Origine et religion</h2>
                  </div>
                  <div class="line">
                    <label for="">Origine:</label>
                    <select class="" name="origine" onchange="save(3);" >
                      <option value="Afrique">Afrique</option>
                      <option value="Amérique">Amérique</option>
                      <option value="Europe">Europe</option>
                      <option value="Asie">Asie</option>
                      <option value="Océanie">Océanie</option>
                      <option value="Antartique">Antartique</option>
                    </select>
                  </div>
                  <div class="line">
                    <label for="religion">Réligion:</label>
                    <select class="" name="religion" onchange="save(3);" >
                      <option value="Chretient">Chretient</option>
                      <option value="Musulman">Musulman</option>
                      <option value="Juif">Juif</option>
                      <option value="Boudhiste">Boudhiste</option>
                      <option value="Sans importance">Sans importance</option>
                    </select>
                  </div>
                  <div class="line">
                    <input type="submit" name="" value="Sauvegarder" disabled id="btn_pref">
                    <input type="reset" name="" value="Annuler" id="btn_pref_annuler" onclick="javascript:document.getElementById('btn_pref').disabled = true;this.style.display='none';">
                  </div>
                </form>
              </div>
              <!-- Fin Div Vos preferencess -->
            </div>

          </div>
        </div>

        <?php include '../../stuffs/footer.php'; ?>

      <script type="text/javascript">
        function save(n){
          var x = document.querySelectorAll('#form_mdp input[type="password"]');
          var y = document.querySelectorAll('#form_pref select,input[type="text"]');
          if (n==1) {
            document.getElementById('btn_mail').disabled = !document.getElementById('btn_mail').disabled;
          }else if(n==2) {
            if (x[0].value != x[1].value) {
              if(x[1].value ==""){
                document.getElementById('btn_mdp').disabled = true;
              }else {
                console.log(x[0].value+','+x[1].value);
                alert("Les deux champs ne correspondent pas!!");
                document.getElementById('btn_mdp').disabled = true;
              }
            }else {
              document.getElementById('btn_mdp').disabled = false;
            }
          }else {
            document.getElementById('btn_pref').disabled = false;
            document.getElementById('btn_pref_annuler').style.display = "block";
          }
        }
      </script>
      </body>
    </html>

    <?php

  } else {

    header('location: ../../');

  }


 ?>
