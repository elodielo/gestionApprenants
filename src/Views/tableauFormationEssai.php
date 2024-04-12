<?php

include_once __DIR__ . '/Includes/header.php';
?>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Accueil</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Promotions</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Utilisateurs</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

    <h2> Cours du jour</h2>

    <div class="d-flex justify-content-between bg-light position-absolute top-50 start-50 translate-middle w-75 p-3">
      <div>
        <h3> NOM PROMO</h3>
        <p> PLACES DISPOS attendus</p>
      </div>
      <div>
        <p>DATE JOUR</p>
        <button id="validerPresenceFormateur" data-id="IDCOUR" type="button" class="btn btn-primary">CODE COURS</button>
      </div>

    </div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
    <div class="d-flex justify-content-around">
      <div>
        <h2>Toutes les promotions</h2>
       
      </div>
      <button type="button" class="btn btn-success btn-sm">Ajouter promotion</button>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Promotion</th>
      <th scope="col">Debut</th>
      <th scope="col">Fin</th>
      <th scope="col">Place</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach($promos as $promo) {?>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td class="d-flex justify-content-evenly">
      <a href="#" class="link-unstyled">Voir</a>
      <a href="#" class="link-unstyled">Editer</a>
      <a href="#" class="link-unstyled">Supprimer</a></td>
    </tr>
  </tbody>
  <?php } ?>
</table>

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">

  </div>

</div>