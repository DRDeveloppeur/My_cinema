<?php
include('connexion_bdd.php');
function getMembre()
{
  global $bdd;
  if (isset($_GET['nom_p'])) {
    $membreI = htmlspecialchars($_GET['nom_p']);
    $req = $bdd->prepare('SELECT *, f.nom AS nom_p,
      DATE_FORMAT(date_abo, "%d.%m.%Y") AS date_abo,
      DATE_FORMAT(date_inscription, "%d.%m.%Y") AS date_inscription,
      DATE_FORMAT(h.date, "%d.%m.%Y") AS date_h,
      DATE_FORMAT(date_dernier_film, "%d.%m.%Y") AS date_dernier_film,
      a.resum AS resum_a
      FROM fiche_personne AS f
      LEFT JOIN membre AS m ON f.id_perso = m.id_fiche_perso
      LEFT JOIN abonnement AS a ON m.id_abo = a.id_abo
      LEFT JOIN historique_membre AS h ON h.id_membre = m.id_membre
      LEFT JOIN film AS flm ON m.id_dernier_film = flm.id_film
      WHERE f.nom = :search OR f.prenom = :search');
      $req->bindValue(':search', $membreI);
      $req->execute();
      return $req->fetch();
  }
}

function historyFilms() {
  if (!empty($_GET['nom_p'])) {
    global $bdd;
    $reqFilms = $bdd->prepare('SELECT *,
      DATE_FORMAT(h.date, "%d.%m.%Y") AS date_h
      FROM fiche_personne AS fp
      LEFT JOIN membre AS m ON fp.id_perso = m.id_fiche_perso
      LEFT JOIN historique_membre AS h ON h.id_membre = m.id_membre
      LEFT JOIN film AS f ON f.id_film = h.id_film
      WHERE fp.nom = :search OR fp.prenom = :search
      AND h.id_membre = m.id_membre AND m.id_fiche_perso = fp.id_perso');
      $reqFilms->bindValue(':search', htmlspecialchars($_GET['nom_p']));
      $reqFilms->execute();
      return $reqFilms;
  }
}

function addCom() {
  $membre = getMembre();
  historyFilms();
  global $bdd;
  if (!empty($_POST['id_f'])) {
    $addCom = $bdd->prepare('UPDATE historique_membre SET avis = :mes
    WHERE id_membre = :id AND id_film = :film');
    $addCom->bindValue(':mes',  htmlspecialchars($_POST['com']));
    $addCom->bindValue(':film',  htmlspecialchars($_POST['id_f']));
    $addCom->bindValue(':id', (int) htmlspecialchars($_POST['id']), PDO::PARAM_INT);
    $addCom->execute();
  }
}

function updateAbo() {
  global $bdd;
  if (isset($_POST['abo']) || $_POST['abo'] == "0") {
    $upd = $bdd->prepare('UPDATE membre SET id_abo = :abo
      where id_membre = :id');
    $upd->bindValue(':abo', (int) htmlspecialchars($_POST['abo']));
    $upd->bindValue(':id', (int) htmlspecialchars($_POST['id']));
    $upd->execute();
  }
  if (isset($_POST['sup'])) {
    $upd = $bdd->prepare('UPDATE membre SET id_abo = NULL
      WHERE id_membre = :id');
    $upd->bindValue(':id', (int) htmlspecialchars($_POST['id']));
    $upd->execute();
  }
}
