<style>
.navbar {
  position: fixed;
  width: 100%;
  background-color: rgb(50, 49, 61);
  overflow: auto;
}
.logo a:hover{
  background-color: red;
}
.logo p{
  color: red;
  font-size: 25px;
  margin-right: 550px;
}
.logo span{
  color: blue;
}
.navbar a {
  display: flex;
  float: right;
  padding: 10px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  margin-right: 20px;
}
.navbar p{
  margin-top: 2px;
  margin-left: 10px;
  margin-bottom: 0;
  text-align:center
}

.navbar a:hover {
  background-color: rgba(85, 106, 128, 0.7);
}
.navbar a:hover:last-child {
  background-color: inherit;
  cursor: default;
}
.dropdown {
  float: right;
  overflow: hidden;
  margin-right: 50px;
}

.dropdown .dropbtn {
  border: none;
  outline: none;
  color: white;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
  padding-top:6px;
}
.dropdown-content {
  position: fixed;
  padding: 12px 16px;
  border-radius: 5px;
  margin-top: 51px;
  right: 42px;
  display: none;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 1px 8px 10px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  width: 80%;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;

}
.dropdown-content p{
  margin-top: -25px;
  margin-bottom: 0;
  text-align:center
}
.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.l{
  border-bottom: 1px solid rgb(186, 186, 186);
}

#n:hover{
  background-color: #ddd;
  cursor: pointer;
}

.active {
  background-color: #4CAF50;
}
/* icons */

.ic-user:before{
  content:url(../../images/icons/icons8-utilisateur-30.png);
}
.ic-message:before{
  content:url(../../images/icons/icons8-message-25.png);
}
.ic-heart:before{
  content:url(../../images/icons/icons8-coeurs-25.png);
}
.ic-home:before{
  content:url(../../images/icons/icons8-accueil-25.png);
}
.ic-log-out:before{
  content:url(../../images/icons/icons8-log-out-25.png);
}
.ic-setting:before{
  content:url(../../images/icons/icons8-paramètres-25.png);
}
.ic-prof:before{
  content:url(../../images/icons/icons8-prof-25.png);
}
.ic-prof:before{
  content:url(../../images/icons/icons8-prof-25.png);
}

.ic-game:before{
  content:url(../../images/icons/icons8-manette-25.png);
}

/* icons */

@media screen and (max-width: 500px) {
  .navbar a, .dropdown {
    float: none;
    display: block;
  }
}
</style>

<div class="navbar">
  <div class="dropdown">
    <a class="dropbtn"><i class="ic-user"></i>
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-content">
      <a href="index.php"><i class="ic-home"></i><p>Accueil</p></a>
      <a href="profil.php" class="l"><i class="ic-prof"></i><p>Mon profil</p></a>
      <a href="settings.php"><i class="ic-setting"></i><p>&nbspParamètres</p></a>
      <a href="../../php/deconnecting.php" id="n"><i class="ic-log-out"></i><p class="b">&nbsp &nbspSe deconnecter</p></a>
    </div>
  </div>
  <a href="matches.php"><i class="ic-heart"></i><p>Profils compatibles</p></a>
  <a href="messages.php"><i class="ic-message"></i><p>Messages</p></a>
  <a href="game.html"><i class="ic-game"></i><p>Jeux</p></a>
  <a href="index.php" class="logo"><p>Y😍u<span>Meet</span></p></a>



</div>
