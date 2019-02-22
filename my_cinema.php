<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
    <script src =
    "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity =
    "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin = "anonymous"></script>
    <script src =
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
     integrity =
     "sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
     crossorigin = "anonymous"></script>
    <script src =
    "https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity =
    "sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin = "anonymous"></script>
    <link rel = "stylesheet" href = "css/bootstrap.min.css">
    <link rel="stylesheet" href = "style.css">
    <title>My cinema/Films.</title>
  </head>
  <body>
    <?php require('header.php') ?>
    <div class = "container">
      <div class = "m-2">
        <h1>Tous les films</h1>
        <?php include('my_cinema_post.php') ?>
        <div class = "form-inline  filtres">
          <div class = "btn-group">
            <form method = "get">
              <button class = "btn btn-secondary btn-sm dropdown-toggle"
                type = "button" data-toggle = "dropdown" aria-haspopup = "true"
                aria-expanded = "false">
                Genre
              </button>
              <div class = "dropdown-menu scroll">
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=detective">Detective</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=dramatic%20comedy">Dramatic comedy</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Science%20fiction">Science fiction</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=drama">Drama</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Documentary">Documentary</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=animation">Animation</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Comedy">Comedy</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Fantasy">Fantasy</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Action">Action</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Thriller">Thriller</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Adventure">Adventure</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Various">Various</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Historical">Historical</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Western">Western</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Romance">Romance</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Music">Music</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Musical">Musical</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Horror">Horror</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=War">War</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Unknow">Unknow</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Spying">Spying</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Historical%20epic">Historical epic</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Biography">Biography</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Experimental">Experimental</a>
                <a class = "dropdown-item" href =
                "my_cinema.php?genre=Short%20film">Short film</a>
              </div>
            </form>
          </div>
          <form method = "get">
            <input class = "form-control offset-sm-2" type = "text"
              name = "titre" placeholder = "Recherche par titre ...">
            <button class = "btn btn-dark offset-sm-4"
            type = "submit">Recherche</button>
          </form>
          <form method = "get">
            <input class = "form-control offset-sm-1" type = "text"
              name="distrib" placeholder="Recherche par distributeur ...">
            <button class = "btn btn-dark offset-sm-3"
            type = "submit">Recherche</button>
          </form>
          <form method = "get">
            <input class = "form-control" type = "text"
            name = "dates" placeholder = "Recherche par date ...">
            <button class = "btn btn-dark offset-sm-2"
            type = "submit">Recherche</button>
          </form>
        </div>
        <table class = "table table-striped table-dark">
          <thead>
            <tr>
              <th scope = "col">Nom du film</th>
              <th scope = "col">Genre</th>
              <th scope = "col">Distrinuteur</th>
              <th scope = "col">Du</th>
              <th scope = "col">Au</th>
              <th scope = "col">Durée</th>
              <th scope = "col">Production</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php
              while ($resultat = $req->fetch()) {
            ?>
            <tr>
              <th scope = 'row'><?php echo $resultat['titre'] ?></th>
              <th><?php echo $resultat['nom_g']; ?></th>
              <th><?php echo $resultat['nom_d']; ?></th>
              <th><?php echo $resultat['date_debut']; ?></th>
              <th><?php echo $resultat['date_fin']; ?></th>
              <th><?php echo $resultat['duree_min']; ?> min</th>
              <th><?php echo $resultat['annee_prod']; ?></th>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php if ($nombreDePages > 1): ?>
          <form method = "get" class = "form-inline">
            <select class = "form-control" name = "entre">
              <option value = "5">5</option>
              <option value = "10">10</option>
              <option value = "20">20</option>
              <option value = "50">50</option>
            </select>
            <button type = "submit" class = "btn btn-dark">Show</button>
          </form>
        <?php endif; ?>
        <?php
          if (isset($_GET['genre']) || isset($_GET['titre']) ||
          isset($_GET['dates'])) {
        ?>
        <div class = "col-sm-6 offset-sm-4">
          <nav aria-label = "Page navigation example" >
            <ul class = "pagination">
              <?php
                for($i=1; $i<=$nombreDePages; $i++) {
                  if ($i==$pageActuelle && $pageActuelle == 1) {
              ?>
              <li class = "page-item disabled">
                <a class = "page-link">Previous</a></li>
              <li class = "page-item active">
                  <a class = "page-link" href =
                    "my_cinema.php?page=<?= $i ?>
                    &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                    &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                    &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                    &dates=<?= $_GET['dates']; } ?>"><?= $i ?></a></li>
                    <?php if ($nombreDePages > $pageActuelle){ ?>
                <li class = "page-item"><a class = "page-link"
                  href = "my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>"><?= $i+1 ?></a></li>
                  <?php if ($i+2 <= $nombreDePages): ?>
                    <li class = "page-item"><a class = "page-link"
                      href="my_cinema.php?page=<?= $i+2 ?>
                      &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                      &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                      &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                      &dates=<?= $_GET['dates']; } ?>"><?= $i+2 ?></a></li>
                  <?php endif; ?>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>">Next</a></li>
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
                  href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>">Previous</a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                 href="my_cinema.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>"><?= $i+1 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>">Next</a></li>
                <?php
                  }
                  if ($i==$pageActuelle && $pageActuelle == $nombreDePages
                    && $nombreDePages != 1) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>">Previous</a></li>
                  <?php if ($i-2 > 0): ?>
                    <li class="page-item"><a class="page-link"
                     href="my_cinema.php?page=<?= $i-2 ?>
                      &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                      &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                      &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                      &dates=<?= $_GET['dates']; } ?>"><?= $i-2 ?></a></li>
                  <?php endif; ?>
                <li class="page-item"><a class="page-link"
                 href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                 href="my_cinema.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre']; if(isset($_GET['genre'])){ ?>
                  &genre=<?= $_GET['genre']; }if(isset($_GET['titre'])){ ?>
                  &titre=<?= $_GET['titre']; }if(isset($_GET['dates'])){ ?>
                  &dates=<?= $_GET['dates']; } ?>"><?= $i ?></a></li>
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
            if (!isset($_GET['genre']) && !isset($_GET['titre'])
           && !isset($_GET['dates'])) {
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
                    href="my_cinema.php?page=<?= $i ?>
                    &entre=<?= $_GET['entre'] ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i+1 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+2 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i+2 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>">Next</a></li>
                <?php
                  }
                  if($i==$pageActuelle && $pageActuelle > 1
                    && $pageActuelle != $nombreDePages) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>">Previous</a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                 href="my_cinema.php?page=<?= $i ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i+1 ?></a></li>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i+1 ?>
                  &entre=<?= $_GET['entre'] ?>">Next</a></li>
                <?php
                  }
                  if ($i==$pageActuelle && $pageActuelle == $nombreDePages) {
                ?>
                <li class="page-item"><a class="page-link"
                  href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>">Previous</a></li>
                <li class="page-item"><a class="page-link"
                 href="my_cinema.php?page=<?= $i-2 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i-2 ?></a></li>
                <li class="page-item"><a class="page-link"
                 href="my_cinema.php?page=<?= $i-1 ?>
                  &entre=<?= $_GET['entre'] ?>"><?= $i-1 ?></a></li>
                <li class="page-item active"><a class="page-link"
                 href="my_cinema.php?page=<?= $i ?>
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
    </div>
  </body>
</html>
