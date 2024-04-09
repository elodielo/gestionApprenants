<?php

include_once __DIR__ . '/Includes/header.php';
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
  </li>
</ul>

<h2>Cours du jour </h2>
<div id="containerCreation" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
    <h3 class="text-center"> DWW3 </h3>
    <!-- A changer selon la classe  -->
    <p> Nombre de participants </p>
    <!-- A renseigner -->
    <form id="formValidationCode">
    <div class="mb-3">
    <label for="validationCode" class="form-label">Code*</label>
    <input type="number" class="form-control" id="validationCode">
  </div>

<div class="">
  <button type="submit" id="boutonValidationCode" class="btn btn-primary"> Valider la présence </button>
</div>
</form>
</div>

</body>

