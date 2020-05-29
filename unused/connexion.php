<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
        <?php
            include("name.php");
            echo $name." | Connexion";
        ?>
    </title>
    <script>
        function test() {
            if (document.getElementById("t").value=="aziz") {
                document.getElementById("t").style.borderColor = "green";
            } else {
                document.getElementById("t").style.borderColor = "blue";

            }
        }
    </script>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <form class="acceuil-connexion" action="php/connecting.php" method="post">

        <img src="images/icon1.png" class="logo" alt="">

        <h1>Connectez-vous !</h1>

        <input type="text" id="t" required name="mail" placeholder="Adresse e-mail">

        <input type="password" required name="password" placeholder="Mot de passe">

        <input type="reset" value="Effacer">

        <input type="submit" value="Se connecter">

        <p>Vous n'avez pas encore de compte ? <a class="forget" href="inscription.php">Inscrivez vous ici !</a></p>
    </form>
  </body>
</html>
