<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Gestion membre</title>
  </head>
  <body>
  <?php include('header.php'); ?>
  <?php include('gestion_post.php'); ?>
  <div class="container">

    <?php if (!empty($_POST['abo'])) {
      updateAbo();
    }
    $retur = historyFilms();
    addCom();
    $membre = getMembre();
      ?>
      <form method="post">
        <input style="display:none;" name="id"
        value="<?= $membre['id_membre'];?>">
        <ul class="list-group">
          <li class="list-group-item">Nom : <?= $membre['nom_p'] ?></li>
          <li class="list-group-item">Prenom : <?= $membre['prenom']; ?>
          <li class="list-group-item">Dte d'inscription :
            <?=$membre['date_inscription']; ?>
          <li class="list-group-item">Abonnement : <?= $membre['nom']; ?> |
          ( <?= $membre['resum_a']; ?> ) Prix : <?= $membre['prix'] ?>€.
          <p>Pour modifier tapez:</p>
          <p>0 Pour l'abonnement VIP. Prix 60€ pour 30 jours.</p>
          <p>1 Pour l'abonnement GOLD. Prix 500€ pour 365 jours.</p>
          <p>2 Pour l'abonnement Classic. Prix 40€ pour 30 jours.</p>
          <p>3 Pour l'abonnement pass day. Prix 15€ pour 1 jour.</p>
          <p>4 Pour l'abonnement malsch. Prix 238€ pour 4 jours.</p>
          <input type="number" max="4" min="0" name="abo">
          <button type="submit">Modifier</button>
          <button type="submit" name="sup" value = NULL>Suprimer</button>
          <li class="list-group-item">Abonner depuis le :
          <?= $membre['date_abo']; ?>
          <li class="list-group-item"><h3>Films vue : </h3><br>
            <p>Ajouter un commentaire :
            <input type="text" name="com" placeholder="Commentaire..."></p>
          <?php while ($films = $retur->fetch()) { ?>
            <?= $films['titre']; ?> |
            <p>Vue le <?= $films['date_h']?> | <button type="submit"
              name="id_f" value="<?= $films['id_film'] ?>">
              Ajouter le commentaire</button></p>
          <?php } ?>
        </ul>
      </form>
    </div>
  </body>
</html>
