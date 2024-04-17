<?php

include_once __DIR__ . '/Includes/header.php';
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Promotion</a>
  </li>
</ul>


<div id="containerConnexion" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
  <h2> Création d'une promotion </h2>
  <form id="formCreationPromotion">
    <div class="mb-3">
      <label for="nomPromotion" class="form-label">Nom de la promotion</label>
      <input type="text" class="form-control" id="nomPromotion">
    </div>
    <div class="mb-3">
      <label for="dateDebutPromo" class="form-label">Date de début</label>
      <input type="date" class="form-control" id="dateDebutPromo">
    </div>
    <div class="mb-3">
      <label for="dateFinPromo" class="form-label">Date de fin</label>
      <input type="date" class="form-control" id="dateFinPromo">
    </div>
    <div class="mb-3">
      <label for="placesDisposPromo" class="form-label">places disponibles</label>
      <input type="email" class="form-control" id="placesDisposPromo" aria-describedby="emailHelp">
    </div>

    <div class="d-flex justify-content-between">
      <button id="retourCreationPromo" class="btn btn-primary"> Retour </button>
      <button id="validerCreationPromo" class="btn btn-primary"> Sauvegarder </button>
    </div>

  </form>
</div>

</body>
<!-- 
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Promotions</a>
        </li>
      </ul>


      <div id="containerConnexion" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
        <h2> Création d'un apprenant </h2>
        <form id="formCreationApprenant">
          <div class="mb-3">
            <label for="nomApprenant" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nomApprenant">
          </div>
          <div class="mb-3">
            <label for="prenomApprenant" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenomApprenant">
          </div>
          <div class="mb-3">
            <label for="mailApprenant" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="mailApprenant" aria-describedby="emailHelp">
          </div>

          <button type="submit" class="btn btn-primary"> Sauvegarder </button>


        </form>
      </div>
 -->