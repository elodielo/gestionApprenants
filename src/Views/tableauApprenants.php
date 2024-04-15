<?php

include_once __DIR__ . '/Includes/header.php';
?>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tableau Apprenants</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Retards</button>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

    <div class="d-flex justify-content-around">
          <div>
            <h2>Promotion <?php echo $promo->nomPromo ?></h2>
            </div>
          <button type="button" id="boutonAjoutApprenant" class="btn btn-success">Ajouter apprenant</button>
        </div>
    
        <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom de famille</th>
          <th scope="col">Prénom</th>
          <th scope="col">Mail</th>
          <th scope="col">Compte activé</th>
          <th scope="col">Rôle</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($apprenants as $apprenant) {?>
          <tr >
          <th scope="row"><?php echo $apprenant->nom ?></th>
          <td><?php echo $apprenant->prenom ?></td>
          <td><?php echo $apprenant->mail ?></td>
          <td> oui </td>
          <td class="d-flex justify-content-evenly">
          <a href="#" class="editerApprenant link-unstyled" data-editeAp-id = <?php echo $promo->id?> >Editer</a>
          <a href="#" class="supprimerApprenant link-unstyled" data-supprimeAp-id = <?php echo $promo->id?>  >Supprimer</a></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
</div>  



