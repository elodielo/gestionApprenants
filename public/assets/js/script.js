let formulaireConnexion = document.getElementById("formConnexion");

formulaireConnexion.addEventListener("submit", function (event) {
  event.preventDefault();
 soumettreFormulaire()
});

function soumettreFormulaire() {
    let mailCo = document.getElementById('mailCo').value;
    let mdpCo = document.getElementById('mdpCo').value;
    
    let formData = {
        mailCo: mailCo,
        mdpCo: mdpCo
    };
    let xhr = new XMLHttpRequest();
    xhr.open('POST', HOME_URL + 'mon-routeur', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Traiter la réponse du serveur
            let response = JSON.parse(xhr.responseText);
            console.log(response);
            // Mettre à jour l'interface utilisateur en conséquence
        }
    };
    xhr.send(JSON.stringify(formData));
}
