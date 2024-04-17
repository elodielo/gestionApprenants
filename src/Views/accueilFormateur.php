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
        <h3> <?php echo $promo->nomPromo ?></h3>
        <p> <?php echo $promo->placesDispos ?> participants attendus</p>
      </div>
      <div>
        <p><?php echo $courAct->dateJour ?></p>
        <button id="validerPresenceFormateur" data-id="<?php echo $courAct->id ?>" type="button" class="btn btn-primary">Valider présence</button>
      </div>

    </div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

    <?php
    include __DIR__ . '/tableauFormations.php'; ?>

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">

  </div>

</div>