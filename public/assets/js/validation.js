console.log("JOJOJO")

document.addEventListener("DOMContentLoaded", function () {
    let validerPresenceFormateur = document.getElementById(
      "validerPresenceFormateur"
    );
    if (validerPresenceFormateur) {
      validerPresenceFormateur.addEventListener("click", function (event) {
        console.log("coucou");
        event.preventDefault();
        validationPresenceFormateur();
      });
    }
  });
  
  function validationPresenceFormateur() {
    // console.log("coucou");
    // Envoyer l'id du cours pour pouvoir récupérer le codeCours
    // CREER REQUETE AJAX - ENVOI SUR ROUTER - AFFICHE VUE AVEC LE CODE
  }