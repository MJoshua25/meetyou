<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>
            <?php 
            
                include("../name.php");
                echo $name." | Restauration du mot de passe";
            
            ?>
        </title>
        <meta charset="UTF-8">
        <link href="css/xxx.css" rel="stylesheet">
    </head>
    <body>
        <form action="codeconf.php" method="post">
            <h1>Recuperation du mot de passe</h1>

            <input type="text" name="" id="" placeholder="Email ou  numero de telephone">

            <input type="submit" value="Valider">
        </form>
    </body>
</html>