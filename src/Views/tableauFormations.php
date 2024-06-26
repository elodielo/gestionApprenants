<div class="d-flex justify-content-around">
  <div>
    <h2>Toutes les promotions</h2>
  </div>
  <button type="button" id="boutonAjoutPromo" class="btn btn-success">Ajouter promotion</button>
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
    <?php foreach ($promos as $promo) { ?>
      <tr>
        <th scope="row"><?php echo $promo->nomPromo ?></th>
        <td><?php echo $promo->dateDebut ?></td>
        <td><?php echo $promo->dateFin ?></td>
        <td> <?php echo $promo->placesDispos ?></td>
        <td class="d-flex justify-content-evenly">
          <a class="voirPromo link-unstyled" data-voir-id=<?php echo $promo->id ?>>Voir</a>
          <a class="editerPromo link-unstyled" data-edite-id=<?php echo $promo->id ?>>Editer</a>
          <a class="supprimerPromo link-unstyled" data-supprime-id=<?php echo $promo->id ?>>Supprimer</a>
        </td>
      </tr>
  </tbody>
<?php } ?>
</table>