<?php

if(isset($_GET['entre']))
{
  $messagesParPage=$_GET['entre'];
  global $messagesParPage;
}else {
  $_GET['entre'] = $messagesParPage=5;
}

  include('connexion_bdd.php');

    if (isset($_GET['recherche']) || isset($_GET['genre'])) {

      $retour_total = $bdd->prepare('SELECT COUNT(*) AS total
        FROM fiche_personne AS f
        LEFT JOIN membre AS m ON f.id_perso = m.id_fiche_perso
        LEFT JOIN abonnement AS a ON m.id_abo = a.id_abo
        WHERE f.nom LIKE "%":recherche"%"
        OR f.prenom LIKE "%":recherche"%"
        OR a.nom LIKE "%":recherche"%"');
        $retour_total->bindParam(':recherche', $_GET['recherche']);
        $retour_total->execute();
        $donnees_total = $retour_total->fetch();
        $total = $donnees_total['total'];
        $total = (int) $total;
        $messagesParPage = (int) $messagesParPage;
        $nombreDePages = ceil($total/$messagesParPage);
        if(isset($_GET['page']))
        {
          $pageActuelle=intval($_GET['page']);
          if($pageActuelle>$nombreDePages)
          {
            $pageActuelle=$nombreDePages;
          }
        }
        else
        {
          $pageActuelle=1;
        }

        $premiereEntree=($pageActuelle-1)*$messagesParPage;


      $req = $bdd->prepare('SELECT *,
        DATE_FORMAT(date_naissance, "%d.%m.%Y") AS date_n,
        f.nom AS nom_p, UPPER(f.nom)
        FROM fiche_personne AS f
        LEFT JOIN membre AS m ON f.id_perso = m.id_fiche_perso
        LEFT JOIN abonnement AS a ON m.id_abo = a.id_abo
        WHERE f.nom LIKE "%":recherche"%"
        OR f.prenom LIKE "%":recherche"%"
        OR a.nom LIKE "%":recherche"%"
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $req->bindParam(':recherche', $_GET['recherche']);
        $resultat = $req->execute();
    } else {
      $retour_total = $bdd->prepare('SELECT COUNT(*) AS total FROM film');
      $retour_total->execute();
      $donnees_total = $retour_total->fetch();
      $total = $donnees_total['total'];
      $nombreDePages = ceil($total/$messagesParPage);
      if(isset($_GET['page']))
      {
        $pageActuelle=intval($_GET['page']);
        if($pageActuelle>$nombreDePages)
        {
          $pageActuelle=$nombreDePages;
        }
      }
      else
      {
        $pageActuelle=1;
      }

      $premiereEntree=($pageActuelle-1)*$messagesParPage;

      $req = $bdd->prepare('SELECT *,
        DATE_FORMAT(date_naissance, "%d.%m.%Y") AS date_n,
        f.nom AS nom_p, UPPER(f.nom)
        FROM fiche_personne AS f
        LEFT JOIN membre AS m ON f.id_perso = m.id_fiche_perso
        LEFT JOIN abonnement AS a ON m.id_abo = a.id_abo
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $resultat = $req->execute();
    }
