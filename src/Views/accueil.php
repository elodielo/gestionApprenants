<?php

include_once __DIR__ . '/Includes/header.php';
?>

<div id="containerConnexion" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
  <h2 class="text-center"> Bienvenue </h2>
  <form id="formConnexion">
    <div class="mb-3">
      <label for="mailCo" class="form-label">Email*</label>
      <input type="email" class="form-control" id="mailCo" aria-describedby="emailHelp">

    </div>
    <div class="mb-3">
      <label for="mdpCo" class="form-label">Mot de passe*</label>
      <input type="password" class="form-control" id="mdpCo">
    </div>
    <div id="messageCo"> </div>

    <div class="text-center">
      <button type="submit" id="boutonSubmit" class="mx-auto btn btn-primary">Connexion</button>
    </div>
  </form>
</div>




</body>