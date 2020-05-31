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
  if (n ==1 && !validateForm()) return false; //si tu veux eviter de remplir tout les champs met le if en commentaire
  // On cache le fieldset courant:
  x[currentTab].style.display = "none";
  currentTab += n;
  showTab(currentTab);
}

function validateForm() {
  // Vérifie si tous les champs d'un fieldset sont remplies
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  w = x[currentTab].querySelectorAll('input[type="checkbox"]');
  l = x[currentTab].querySelectorAll('#part4 select');
  tel = document.getElementById('tel');

  for (i = 0; i < y.length ; i++) {
    if (y[i].value == "") {
      // on change la classe pour que les input se mettent en rouge si un champ est vide
      y[i].className += "invalid";
      valid = false;
    }
  }
  for (i = 0; i < z.length ; i++) {
    if (z[i].value == "") {
      alert("veuillez remplir tous les champs");
      valid = false;
      break;
    }
  }
  for (i = 0; i < l.length ; i++) {
    if (l[i].value == "") {
      alert("veuillez remplir tous les champs");
      valid = false;
      break;
    }
  }
  function tel_ok(){
    var a =0;
    if(tel.value != ""){
      for (i = 0; i < tel.value.length;i++) {
        if ((tel.value[i] in ['0','1','2','3','4','5','6','7','8','9'])==false) {
          tel.className += "invalid";
          errors("Le numéro de telephone ne dois contenir que des chiffres");
          display = true;
          valid = false;
          break;
        }
        a++;
      }
    }
    if (a ==tel.value.length){
      return true;
    }
  }

  if(tel.value !="" && tel_ok() && tel.value.length <=7){
      errors("Le numéro de telephone dois contenir au moins 8 chiffres");
      valid = false;
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
  //
  // if(valid){
  //   document.getElementById('submit').disabled = false;
  // }

  return valid; // return the valid status
}

function errors(message) {
  error = document.getElementById('error');
  error.style.display = "block";
  error.innerHTML = message;
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

// select (pays et profil recherché)

setvalue("tailleUser",100,200);
setvalue("ageMatch_inf",18,80);
setvalue("tailleMatch_inf",100,200);


function setvalue(id,n,m){
  var select = document.getElementById(id);
  for(var i = n; i <= m; i++) {
    var el = document.createElement("option");
    el.textContent = i;
    el.value = i;
    select.appendChild(el);
  }
}

function sendvalue(id,id2){
  var select1 = document.getElementById(id); //Le premier select
  var select2 = document.getElementById(id2);
  var opts = select2.getElementsByTagName("option");
  while(opts[1]) {
      select2.removeChild(opts[1]);
  }
  var len = select1.options.length;
  var n = select1.value;//on recupère la valeur courante du select
  var m = select1.options[len-1].value;//on recupère la valeur du dernier élément du premier select
  for(var i = n; i <= m; i++) {
    var el = document.createElement("option");
    el.textContent = i;
    el.value = i;
    select2.appendChild(el);
    }
  }

  function getVilles(pays){
     var villes = document.getElementById("ville");
     var x = villes.getElementsByTagName("option");
     for (var i = 1; i < x.length; i++) {
       if(x[i].className == pays){
         x[i].hidden = false;
       }else {
         x[i].hidden = true;
       }
     }



  }
