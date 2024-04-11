<?php
include_once __DIR__ . '/../Views/Includes/header.php'; ?>

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
      </ul>

      <h2>Cours du jour</h2>
      <div id="containerCreation" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
        <h3 class="text-center"> <?php echo $promo->nomPromo ?> </h3>
        <p><?php echo $promo->placesDispos ?> participants attendus</p>
        <form id="formValidationCode">
          <div class="">
          <span class="badge text-bg-secondary">Signature Validée</span>          </div>
        </form>
      </div>
    