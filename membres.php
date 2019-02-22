<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=
    "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
     integrity=
     "sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
     crossorigin="anonymous"></script>
    <script src=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity=
    "sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>My cinema/Membres.</title>
  </head>
  <body>
    <?php require('header.php') ?>
    <div class="container">
      <div class="m-2">
        <h1>Tous les membres</h1>
      </div>
        <?php include('membres_post.php') ?>
        <div class="form-inline  filtres">
          <form method="get">
              <label for="recherche" class="form-control">
                Recherche par Nom/Prenom : </label>
              <input class="form-control" id="recherche" type="text"
              name="recherche" placeholder="Recherche ...">
              <button class="btn btn-dark"
              type="submit">Recherche</button>
          </form>
        </div>
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Prenom</th>
              <th scope="col">Date de naissance</th>
              <th scope="col">Email</th>
              <th scope="col">Code postal</th>
              <th scope="col">Ville</th>
              <th scope="col">Abonnement</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
              while ($resultat = $req->fetch()) {
            ?>
            <tr>
              <th scope='row'><a href="gestion.php?nom_p=<?= $resultat['nom_p'] ?>"><?php echo $resultat['nom_p'] ?></a></th>
              <th><?php echo $resultat['prenom'] ?></th>
              <th><?php echo $resultat['date_n'] ?></th>
              <th><?php echo $resultat['email'] ?></th>
              <th><?php echo $resultat['cpostal'] ?></th>
              <th><?php echo $resultat['ville'] ?></th>
              <th><?php echo $resultat['nom'] ?></th>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php if ($nombreDePages > 1): ?>
          <form method="get" class="form-inline">
            <select class="form-control" name="entre">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="50">50</option>
            </select>
            <button type="submit" class="btn btn-dark">Show</button>
          </form>
        <?php endif; ?>
        <?php
          if (isset($_GET['recherche'])) {
        ?>
        <div class="col-sm-6 offset-sm-4">
          <nav aria-label="Page navigation example" >
            <ul class="pagination">
              <?php
                for($i=1; $i<=$nombreDePages; $i++) {
                  if ($i==$pageActuelle && $pageActuelle == 1) {
              ?>
              <li class="page-item disabled">
                <a class="page-link">Previous</a></li>
              <li class="page-item active">
                  <a class="page-link" href=
                    "membres.php?page=<?= $i ?>
                    &entre=<?= $_GET['entre']; ?>
                    &recherche=<?= $_GET['recherche'] ?>"><?= $i ?></a></li>
                    <?php if ($nombreDePages > $pageActuelle){ ?>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>"><?= $i+1 ?></a></li>
                  <?php if ($i+2 <= $nombreDePages): ?>
                    <li class="page-item"><a class="page-link"
                       href="membres.php?page=<?= $i+2 ?>
                      &entre=<?= $_GET['entre']; ?>
                      &recherche=<?= $_GET['recherche']; ?>"><?= $i+2 ?></a></li>
                  <?php endif; ?>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>">Next</a></li>
                <?php
                  } else {
                ?>
                <li class="page-item disabled"><a class="page-link">Next</a></li>
                <?php
                    }
                  }
                  if($i==$pageActuelle && $pageActuelle > 1
                    && $pageActuelle != $nombreDePages) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>">Previous</a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                   href="membres.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>"><?= $i+1 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>">Next</a></li>
                <?php
                  }
                  if ($i==$pageActuelle && $pageActuelle == $nombreDePages
                    && $nombreDePages != 1) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>">Previous</a></li>
                  <?php if ($i-2 > 0): ?>
                    <li class="page-item"><a class="page-link"
                       href="membres.php?page=<?= $i-2 ?>
                      &entre=<?= $_GET['entre']; ?>
                      &recherche=<?= $_GET['recherche']; ?>"><?= $i-2 ?></a></li>
                  <?php endif; ?>
                <li class="page-item"><a class="page-link"
                   href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                   href="membres.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre']; ?>
                  &recherche=<?= $_GET['recherche']; ?>"><?= $i ?></a></li>
                <li class="page-item disabled">
                  <a class="page-link">Next</a></li>
                <?php
                    }
                  }
                ?>
              </ul>
            </nav>
          </div>
          <?php
            }
            if (!isset($_GET['recherche'])) {
          ?>
          <div class="col-sm-4 offset-sm-4">
            <nav aria-label="Page navigation example" >
              <ul class="pagination">
                <?php
                  for($i=1; $i<=$nombreDePages; $i++) {
                    if ($i==$pageActuelle && $pageActuelle == 1) {
                ?>
                <li class="page-item disabled">
                  <a class="page-link">Previous</a></li>
                <li class="page-item active">
                  <a class="page-link"
                    href="membres.php?page=<?= $i ?>
                    &entre=<?= $_GET['entre'] ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i+1 ?></a></li>
                <li class="page-item"><a class="page-link"
                   href="membres.php?page=<?= $i+2 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i+2 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>">Next</a></li>
                <?php
                  }
                  if($i==$pageActuelle && $pageActuelle > 1
                    && $pageActuelle != $nombreDePages) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>">Previous</a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                   href="membres.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i+1 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>">Next</a></li>
                <?php
                  }
                  if ($i==$pageActuelle && $pageActuelle == $nombreDePages) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>">Previous</a></li>
                <li class="page-item"><a class="page-link"
                   href="membres.php?page=<?= $i-2 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i-2 ?></a></li>
                <li class="page-item"><a class="page-link"
                   href="membres.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                   href="membres.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i ?></a></li>
                <li class="page-item disabled">
                  <a class="page-link">Next</a></li>
                <?php
                      }
                    }
                  }
                ?>
          </ul>
        </nav>
      </div>
    </div>
  </body>
</html>
