<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Messaging | Chat</title>
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="jquery/jquery.js"></script>
    <script type="text/javascript" src="js/get.js"></script>
    <script type="text/javascript" src="js/send.js"></script>
  </head>
  <body>

    <div class="home-screen">
      <div style="transform: rotate(180deg);direction:rtl;" class="messages">

        <!-- Affichage des messages -->

      </div>

      <form class="sender" method="post">
        <div class="form-div">
          <input type="text" name="id_receiver" value="6" hidden>
          <input type="text" name="message" class="mes" placeholder="Entrez votre message">
          <input type="submit" value="envoyer">
        </div>
        <div hidden class="return">
        </div>
      </form>

    </div>

  </body>
</html>
