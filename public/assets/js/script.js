let formulaireConnexion = document.getElementById("formConnexion");
let boutonFormulaire =  document.getElementById("boutonSubmit");
let messageCo = document.getElementById("messageCo");
let validerPresenceFormateur = document.getElementById("validerPresenceFormateur");

boutonFormulaire.addEventListener("click", function (event) {
  event.preventDefault();
 soumettreFormulaire()
});

function soumettreFormulaire() {
    let mailCo = document.getElementById('mailCo').value;
    let mdpCo = document.getElementById('mdpCo').value;
    let xhr = new XMLHttpRequest();
    xhr.open('POST', HOME_URL + 'connexion', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    let formData = {
        mailCo: mailCo,
        mdpCo: mdpCo
    };
    xhr.send(JSON.stringify(formData));

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // let response = JSON.parse(xhr.responseText);
                let response = xhr.responseText;
                document.body.innerHTML = response;
            } else {
                messageCo.innerHTML = "Erreur d'email ou de mot de passe";
            }
        }
    };
}

if(validerPresenceFormateur)
{
    validerPresenceFormateur.addEventListener("click", function (event) {
        event.preventDefault();
        validationPresenceFormateur();
      });
}

function validationPresenceFormateur()
{
    // Envoyer l'id du cours pour pouvoir récupérer le codeCours
    // CREER REQUETE AJAX - ENVOI SUR ROUTER - AFFICHE VUE AVEC LE CODE
}