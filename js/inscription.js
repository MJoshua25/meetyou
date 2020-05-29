var currentTab = 0; // currentTab est mis a  (0)
showTab(currentTab);

function showTab(n) {
  // on affiche le fieldset correpondant ici
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  etapes(n);
}

function nextPrev(n) {
  // Cette fonction affiche le fieldset correct
  var x = document.getElementsByClassName("tab");
  // Si le formulaire actuel est mal rempli:
  // if (n ==1 && !validateForm()) return false; //si tu veux eviter de remplir tout les champs met le if en commentaire
  // On cache le fieldset courant:
  x[currentTab].style.display = "none";
  currentTab += n;
  showTab(currentTab);
}

function submit() {
  if (validateForm()) {
    var btn = document.getElementById('submit');
    btn.disabled = false;
  }
}

function validateForm() {
  // Vérifie si tous les champs d'un fieldset sont remplies
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  w = x[currentTab].querySelectorAll('input[type="checkbox"]');
  l = x[currentTab].querySelectorAll('#part4 select');

  for (i = 0; i < y.length ; i++) {
    if (y[i].value == "") {
      // on change la classe pour que les input se mettent en rouge si un champ est vide
      y[i].className += "invalid";
      valid = false;
    }
  }
  for (i = 0; i < z.length ; i++) {
    if (z[i].value == "") {
      // on change la classe pour que les input se mettent en rouge si un champ est vide
      alert("veuillez remplir tous les champs");
      valid = false;
      break;
    }
  }
  for (i = 0; i < l.length ; i++) {
    if (l[i].value == "") {
      // on change la classe pour que les input se mettent en rouge si un champ est vide
      alert("veuillez remplir tous les champs");
      valid = false;
      break;
    }
  }

  if (w.length !=0) {
    var j=0;
    for (i = 0; i < w.length ; i++) {
      if (w[i].checked == true) {
        j++;
      }
    }
    if (j < 5) {
      alert("Veuillez choisir au moins 5(cinq) centres d'intérêt svp!");
      valid = false;
    }
  }
  if(valid){
    document.getElementById('submit').disabled = false;
  }


  return valid; // return the valid status
}

function etapes(n) {
  var i, x = document.getElementsByClassName("etape");
  // remove all active class
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  // add the "active" class on the current step:
  for (i = 0; i<=n;i++){
    x[i].className += " active";
  }

}
