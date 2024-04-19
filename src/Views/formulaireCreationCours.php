<?php

include_once __DIR__ . '/Includes/header.php';
?>

<div id="containerConnexion" class="w-50 p-3 position-absolute top-50 start-50 translate-middle bg-light">
  <h2> Création d'un cours </h2>
  <form id="formCreationPromotion">
    <div class="mb-3">
      <label for="dateDebutCours" class="form-label">Date de début</label>
      <input type="date" class="form-control" id="dateDebutCours">
    </div>
    <div class="mb-3">
      <label for="heureDebut" class="form-label">Heure debut</label>
      <input type="time" class="form-control" id="heureDebut">
    </div>
    <div class="mb-3">
      <label for="heureFin" class="form-label">Heure fin</label>
      <input type="time" class="form-control" id="heureFin">
    </div>
    <div class="mb-3">
      <label for="idPromo" class="form-label">numéro promo</label>
      <input type="number" class="form-control" id="idPromo" aria-describedby="emailHelp">
    </div>

    <div class="d-flex justify-content-between">
      <button id="sauvegarderCours" class="btn btn-primary"> Sauvegarder </button>
    </div>

  </form>
</div>

</body>
<!-- 
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" >Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" >Promotions</a>
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