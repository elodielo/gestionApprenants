<?php

include_once __DIR__ . '/Includes/header.php';
?>

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

