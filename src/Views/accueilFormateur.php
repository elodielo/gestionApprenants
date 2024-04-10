<?php

include_once __DIR__ . '/Includes/header.php';
// include_once __DIR__ . '/../Views/Includes/header.php';
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Promotion</a>
  </li>
</ul>


<h2> Cours du jour</h2>

<div class="d-flex justify-content-between bg-light position-absolute top-50 start-50 translate-middle w-75 p-3">
  <div>
    <h3>Nom Promo</h3>
    <p> Nombre participants</p>
  </div>
  <div>
    <p>date</p>
    <button id="validerPresenceFormateur" type="button" class="btn btn-primary">Valider présence</button>
  </div>
</div>

</body>