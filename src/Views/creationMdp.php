<?php

include_once __DIR__ . '/Includes/header.php';
?>

<div id="containerCreation" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
    <h2 class="text-center"> Bienvenue </h2>
    <div class="text-center"> Pour clôturer votre inscription et créer votre compte, veuillez choisir un mot de passe</div>
    <form id="formConnexion">
    <div class="mb-3">
    <label for="mdpCreation" class="form-label">Mot de passe*</label>
    <input type="password" class="form-control" id="mdpCreation">
  </div>

  <div class="mb-3">
    <label for="mdpCreation2" class="form-label">Mot de passe*</label>
    <input type="password" class="form-control" id="mdpCreation2">
  </div>
<div class="text-center">
  <button id="boutonCreationMDP" class="btn btn-primary">Sauvegarder</button>
</div>
</form>
</div>




</body>

