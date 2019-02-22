<?php

if(isset($_GET['entre']))
{
  $messagesParPage=$_GET['entre'];
  global $messagesParPage;
}else {
  $_GET['entre'] = $messagesParPage=5;
}

  include('connexion_bdd.php');

    if (isset($_GET['genre'])) {
      $retour_total = $bdd->prepare('SELECT COUNT(*) AS total
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE genre.nom = :genre');
        $retour_total->bindValue(':genre', $_GET['genre']);
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
        DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") AS date_fin,
        DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") AS date_debut,
        distrib.nom AS nom_d,
        genre.nom AS nom_g
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE genre.nom = :genre
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $req->bindParam(':genre', $_GET['genre']);
        $resultat = $req->execute();
    }
    elseif (isset($_GET['titre']) ) {
      $retour_total = $bdd->prepare('SELECT COUNT(*) AS total
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE film.titre LIKE "%":titre"%"');
        $retour_total->bindValue(':titre', $_GET['titre']);
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
        DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") AS date_fin,
        DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") AS date_debut,
        distrib.nom AS nom_d,
        genre.nom AS nom_g
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE film.titre LIKE "%":titre"%"
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $req->bindParam(':titre', $_GET['titre']);
        $resultat = $req->execute();
    }
    elseif (isset($_GET['distrib']) ) {
      $retour_total = $bdd->prepare('SELECT COUNT(*) AS total
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE distrib.nom LIKE "%":distrib"%"');
        $retour_total->bindValue(':distrib', $_GET['distrib']);
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
        DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") AS date_fin,
        DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") AS date_debut,
        distrib.nom AS nom_d,
        genre.nom AS nom_g
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE distrib.nom LIKE "%":distrib"%"
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $req->bindParam(':distrib', $_GET['distrib']);
        $resultat = $req->execute();
    }
    elseif (isset($_GET['dates']) ) {
      $retour_total = $bdd->prepare('SELECT COUNT(*) AS total
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") LIKE "%":dates"%"
        OR DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") LIKE "%":dates"%"');
        $retour_total->bindValue(':dates', $_GET['dates']);
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
        DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") AS date_fin,
        DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") AS date_debut,
        distrib.nom AS nom_d,
        genre.nom AS nom_g
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        WHERE DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") LIKE "%":dates"%"
        OR DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") LIKE "%":dates"%"
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $req->bindParam(':dates', $_GET['dates']);
        $resultat = $req->execute();
    }
    else {
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
        DATE_FORMAT(date_fin_affiche, "%d.%m.%Y") AS date_fin,
        DATE_FORMAT(date_debut_affiche, "%d.%m.%Y") AS date_debut,
        distrib.nom AS nom_d,
        genre.nom AS nom_g
        FROM film
        LEFT JOIN genre ON film.id_genre = genre.id_genre
        LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
        LIMIT '.$premiereEntree.', '.$messagesParPage.'');

        $resultat = $req->execute();
    }
