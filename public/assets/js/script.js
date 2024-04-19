let formulaireConnexion = document.getElementById("formConnexion");
let boutonFormulaire = document.getElementById("boutonSubmit");
let messageCo = document.getElementById("messageCo");

if (boutonFormulaire) {
  boutonFormulaire.addEventListener("click", function (event) {
    event.preventDefault();
    soumettreFormulaire();
  });
}

function soumettreFormulaire() {
  let mailCo = document.getElementById("mailCo").value;
  let mdpCo = document.getElementById("mdpCo").value;
  let xhr = new XMLHttpRequest();
  xhr.open("POST", HOME_URL + "connexion", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  let formData = {
    mailCo: mailCo,
    mdpCo: mdpCo,
  };
  xhr.send(JSON.stringify(formData));

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let validerPresenceFormateur = document.getElementById(
          "validerPresenceFormateur"
        );
        if (validerPresenceFormateur) {
          validerPresenceFormateur.addEventListener(
            "click",
            validationPresenceFormateur
          );
        }
        let boutonValidationCodeApprenant = document.getElementById(
          "boutonValidationCodeApprenant"
        );
        let inputValidationCodeApprenant = document.getElementById(
          "inputValidationCodeApprenant"
        );
        if (boutonValidationCodeApprenant) {
          boutonValidationCodeApprenant.addEventListener(
            "click",
            validationPresenceApprenant
          );
        }
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });
      } else {
        messageCo.innerHTML = "Erreur d'email ou de mot de passe";
      }
    }
  };
}

function validationPresenceFormateur() {
  let validerPresenceFormateur = document.getElementById(
    "validerPresenceFormateur"
  );
  let IdCours = validerPresenceFormateur.getAttribute("data-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", HOME_URL + "validationFormateur", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  let formData = {
    IdCours: IdCours,
  };
  xhr.send(JSON.stringify(formData));

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // let response = JSON.parse(xhr.responseText);
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });

        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
      } else {
      }
    }
  };
}

function validationPresenceApprenant() {
  let inputCode = inputValidationCodeApprenant.value;
  let xhr = new XMLHttpRequest();
  xhr.open("POST", HOME_URL + "validationApprenant", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  let formData = {
    inputCode: inputCode,
  };
  xhr.send(JSON.stringify(formData));
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // let response = JSON.parse(xhr.responseText);
        let response = xhr.responseText;
        document.body.innerHTML = response;
      } else {
      }
    }
  };
}

function affichePageCreationPromo() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", HOME_URL + "affichePageCreationPromo", true);
  xhr.send();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let validerCreationPromo = document.getElementById(
          "validerCreationPromo"
        );
        if (validerCreationPromo) {
          validerCreationPromo.addEventListener("click", (e) => {
            e.preventDefault();
            creerPromo();
          });
        }
        let retourCreationPromo = document.getElementById(
          "retourCreationPromo"
        );
        if (retourCreationPromo) {
          retourCreationPromo.addEventListener("click", (e) => {
            e.preventDefault();
            retourPageAccueilFormateur();
          });
        }
      } else {
      }
    }
  };
}

function creerPromo() {
  let nomPromotion = document.getElementById("nomPromotion").value;
  let dateDebutPromo = document.getElementById("dateDebutPromo").value;
  let dateFinPromo = document.getElementById("dateFinPromo").value;
  let placesDisposPromo = document.getElementById("placesDisposPromo").value;

  if (
    nomPromotion != "" &&
    dateDebutPromo != "" &&
    dateFinPromo &&
    placesDisposPromo != ""
  ) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", HOME_URL + "creationPromotion", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    let formData = {
      nomPromotion: nomPromotion,
      dateDebutPromo: dateDebutPromo,
      dateFinPromo: dateFinPromo,
      placesDisposPromo: placesDisposPromo,
    };
    xhr.send(JSON.stringify(formData));

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          // let response = JSON.parse(xhr.responseText);
          let response = xhr.responseText;
          document.body.innerHTML = response;
        }
      } else {
      }
    };
  } else {
    alert("veuillez remplir les champs");
  }
}

function retourPageAccueilFormateur() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", HOME_URL + "retourPageAccueilFormateur", true);
  xhr.send();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });
      } else {
      }
    }
  };
}

function voirPromo() {
  let idDeLaPromoAAfficher = this.getAttribute("data-voir-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", HOME_URL + "afficherPromoChoisie", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  let formData = {
    idDeLaPromoAAfficher: idDeLaPromoAAfficher,
  };
  xhr.send(JSON.stringify(formData));
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let boutonsSupprimerApprenant = document.querySelectorAll(
          ".supprimerApprenant"
        );
        boutonsSupprimerApprenant.forEach(function (boutonSupprimerApprenant) {
          boutonSupprimerApprenant.addEventListener(
            "click",
            supprimerApprenant
          );
        });
        let boutonAjoutApprenant = document.getElementById(
          "boutonAjoutApprenant"
        );
        boutonAjoutApprenant.addEventListener("click", (e) => {
          e.preventDefault();
          affichePageCreationApprenant();
        });
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });
      }
    }
  };
}

function supprimerPromo() {
  let idDeLaPromoASupprimer = this.getAttribute("data-supprime-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", HOME_URL + "supprimerPromoChoisie", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  let formData = {
    idDeLaPromoASupprimer: idDeLaPromoASupprimer,
  };
  xhr.send(JSON.stringify(formData));
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });
      }
    }
  };
}

function affichePageCreationApprenant() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", HOME_URL + "afficheFormulaireCreationApprenant", true);
  xhr.send();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let boutonSauvegarderApprenant = document.getElementById(
          "sauvegarderApprenant"
        );
        boutonSauvegarderApprenant.addEventListener("click", (e) => {
          e.preventDefault();
          sauvegarderApprenant();
        });
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });
      } else {
      }
    }
  };
}

function sauvegarderApprenant() {
  let nomApprenant = document.getElementById("nomApprenant").value;
  let prenomApprenant = document.getElementById("prenomApprenant").value;
  let mailApprenant = document.getElementById("mailApprenant").value;
  if (nomApprenant != "" && prenomApprenant != "" && mailApprenant != "") {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", HOME_URL + "sauvegarderApprenant", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    let formData = {
      nomApprenant: nomApprenant,
      prenomApprenant: prenomApprenant,
      mailApprenant: mailApprenant,
    };
    xhr.send(JSON.stringify(formData));
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          let response = xhr.responseText;
          document.body.innerHTML = response;
          let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
          if (boutonAjoutPromo) {
            boutonAjoutPromo.addEventListener(
              "click",
              affichePageCreationPromo
            );
          }
          let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
          boutonsVoirPromo.forEach(function (boutonVoirPromo) {
            boutonVoirPromo.addEventListener("click", voirPromo);
          });
          let boutonsSupprimerPromo =
            document.querySelectorAll(".supprimerPromo");
          boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
            boutonSupprimerPromo.addEventListener("click", supprimerPromo);
          });
        }
      }
    };
  } else {
    alert("Veuillez compléter les champs");
  }
}

let boutonCreationMDP = document.getElementById("boutonCreationMDP");
if(boutonCreationMDP){
boutonCreationMDP.addEventListener("click", function (event) {
  event.preventDefault();
  creerMDP();
});}

function creerMDP() {
  let mdpCreation = document.getElementById("mdpCreation").value;
  let mdpCreation2 = document.getElementById("mdpCreation2").value;
  if (mdpCreation != "") {
    if (mdpCreation == mdpCreation2) {
      const params = new URLSearchParams(window.location.search);
      const email = params.get("email");
      let xhr = new XMLHttpRequest();
      xhr.open("POST", HOME_URL + "creerMDP", true);
      xhr.setRequestHeader("Content-Type", "application/json");
      let formData = {
        mdpCreation: mdpCreation,
        mdpCreation2: mdpCreation2,
        email: email,
      };
      xhr.send(JSON.stringify(formData));
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            let response = xhr.responseText;
            document.body.innerHTML = response;
            window.location.href = HOME_URL;
          }
        }
      };
    } else {
      alert("les mots de passe ne correspondent pas");
    }
  } else {
    alert("les champs sont vides");
  }
}

function supprimerApprenant() {
  let idDeLApprenantASupprimer = this.getAttribute("data-supprimeAp-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", HOME_URL + "supprimerApprenantChoisi", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  let formData = {
    idDeLApprenantASupprimer: idDeLApprenantASupprimer,
  };
  xhr.send(JSON.stringify(formData));
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        let response = xhr.responseText;
        document.body.innerHTML = response;
        let boutonAjoutPromo = document.getElementById("boutonAjoutPromo");
        if (boutonAjoutPromo) {
          boutonAjoutPromo.addEventListener("click", affichePageCreationPromo);
        }
        let boutonsVoirPromo = document.querySelectorAll(".voirPromo");
        boutonsVoirPromo.forEach(function (boutonVoirPromo) {
          boutonVoirPromo.addEventListener("click", voirPromo);
        });
        let boutonsSupprimerPromo =
          document.querySelectorAll(".supprimerPromo");
        boutonsSupprimerPromo.forEach(function (boutonSupprimerPromo) {
          boutonSupprimerPromo.addEventListener("click", supprimerPromo);
        });
      }
    }
  };
}


let sauvegarderCours = document.getElementById("sauvegarderCours");
if(sauvegarderCours){
  sauvegarderCours.addEventListener("click", function (event) {
    event.preventDefault();
    sauverCours();
  });
}

function sauverCours(){
  let dateDebutCours = document.getElementById("dateDebutCours").value;
  let heureDebut = document.getElementById("heureDebut").value;
  let heureFin = document.getElementById("heureFin").value;
  let idPromo = document.getElementById("idPromo").value;
  if (dateDebutCours != "" && heureDebut != "" && heureFin != "") {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", HOME_URL + "sauverCours", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    let formData = {
      dateDebutCours: dateDebutCours,
      heureDebut: heureDebut,
      heureFin: heureFin,
      idPromo:idPromo
    };
    xhr.send(JSON.stringify(formData));
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          let response = xhr.responseText;
          document.body.innerHTML = response;}}}}
}