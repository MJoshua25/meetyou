<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>
            <?php
                include("../name.php");
                echo $name." | Inscription";
            ?>
        </title>

        <meta charset="UTF-8">
        <link href="css/inscription.css" rel="stylesheet">

        <script>

            function changeImg() {
                document.getElementById("pic").src = "images/images.jpeg";
            }
        </script>
    </head>
    <script type="text/javascript" src="js/inscription.js"></script>

    <body>
      <header>
        <nav>
          <div>
            <p>Y😍u<span>Meet</span></p>
          </div>
        </nav>
      </header>


      <!-- progressbar -->
        <ul id="progressbar">
          <li class ="active">Inscription</li>
          <li class ="etape">Description</li>
          <li class ="etape">Profil recherché</li>
        </ul>

        <form id="msform" action="php/signup.php" method="post">

          <fieldset class="tab">
            <!-- Informations de l'utilisateur ici le nom des variables est explicite -->
            <h1>Informations personnelles !</h1>
                <!-- <img src="" id="pic" required onClick="changeImg()">
                <input required type="file" oninput="this.className = ''"  name="" id="parcourir" > -->
                <input  type="text" oninput="this.className = ''"  name="nom" id="" placeholder="Nom">

                <input  type="text" oninput="this.className = ''"  name="prenoms" id="" placeholder="Prenoms">

                <input  type="date" oninput="this.className = ''"  name="dateNaiss" id="" placeholder="Date de naissance">

                <select name="nationalite">
                    <option disabled selected value="">Nationalité</option>
                    <option value="">Element 1</option>
                    <option value="">Element 2</option>
                    <option value="">Element 3</option>
                </select>

                <select name="sexe">
                    <option disabled selected value="">Sexe</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autre">Autre ...</option>
                </select>

                <input  type="tel" oninput="this.className = ''"  name="tel" id="" placeholder="Telephone">

                <select name="pays">
                    <option disabled selected value="">Pays de residence</option>
                    <option value="">Element 1</option>
                    <option value="">Element 2</option>
                    <option value="">Element 3</option>
                </select>

                <select name="ville">
                    <option disabled selected value="">Ville</option>
                    <option value="">Element 1</option>
                    <option value="">Element 2</option>
                    <option value="">Element 3</option>
                </select>
                <input type="button" name="next" class="next action-button" value="Suivant" onclick="nextPrev(1)"/>
          </fieldset>

          <fieldset class="tab">

            <h1>Comment vous decriez vous ?</h1>
            <!-- Description de l'utilisateur les nom des variables sont suivies de "User" -->
            <div class="part-2">
                <input type="text" name="tailleUser" oninput="this.className = ''"  placeholder="Taille(en cm)">

                <select name="teintUser">
                    <option selected disabled value="">Teint</option>
                    <option value="">Clair</option>
                    <option value="">Noir</option>
                    <option value="">Bronzé</option>
                </select>

                <select name="morphUser">
                    <option selected disabled value="">Morphologie</option>
                    <option value="">Mince</option>
                    <option value="">Gros</option>
                    <option value="">Autre ...</option>
                </select>
            </div>

            <input type="button" name="previous" class="previous action-button" value="Précédent" id="prevBtn" onclick="nextPrev(-1)" />
            <input type="button" name="next" class="next action-button" value="Suivant" id="nextBtn" onclick="nextPrev(1)" />

          </fieldset>

          <fieldset class="tab">

            <div class="part-3">
                <h1>Quel profil recherchez vous ?</h1>
                <!-- Description du profil que l'utilisateur recherche le nom des variables est suivi de "Match"
              ex: sexeMatch pour le sexe que l'utilisateur recherche  -->
                <select name="sexeMatch">
                    <option disabled selected value="">Sexe</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autre">Autre ...</option>
                </select>

                <input type="text" oninput="this.className = ''"  name="ageMatch" placeholder="Age">

                <input type="text" oninput="this.className = ''"  name="tailleMatch" placeholder="Taille(en cm)">

                <select name="teintMatch">
                    <option selected disabled value="">Teint</option>
                    <option value="">Clair</option>
                    <option value="">Noir</option>
                    <option value="">Bronzé</option>
                </select>

                <select name="morphMatch">
                    <option selected disabled value="">Morphologie</option>
                    <option value="">Mince</option>
                    <option value="">Gros</option>
                    <option value="">Autre ...</option>
                </select>

                <h1>Que recherchez vous chez la personne ?</h1>
                <textarea rows="3" cols="" placeholder="Informations suplementaires ..." name="infoSup"></textarea>

            </div>

            <input type="button" name="previous" class="previous action-button" value="Précédent" id="prevBtn" onclick="nextPrev(-1)" />
            <input type="submit" name="submit" class="submit action-button" value="Valider" />

          </fieldset>

        </form>

    </body>
</html>
