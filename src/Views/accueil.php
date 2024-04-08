<?php

include_once __DIR__ . '/Includes/header.php';
?>

<div id="containerConnexion" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
    <h2> Bienvenue </h2>
    <form id="formConnexion">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email*</label>
    <input type="email" class="form-control" id="mailCo" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe*</label>
    <input type="password" class="form-control" id="mdpCo">
  </div>

  <button type="submit" class="btn btn-primary">Connexion</button>
</form>
</div>




</body>

