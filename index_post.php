<?php
// Connexion a la BDD
  $bdd = new PDO ('mysql:host=localhost;dbname=epitech_tp;charser=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//Recuperation de l'utilisateur et du passe hacher
  $req = $bdd->prepare('SELECT id, pseudo, pass FROM gerent WHERE pseudo = :pseudo');
  $req->execute(array('pseudo' => $_POST['pseudo']));
  $resultat = $req->fetch();
//Comparaison du pass envoyée et celui de la BDD
  $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
  if (!$resultat) {
    ?>
    <div class="alert alert-danger" role="alert">
      Pseudo ou Mot de passe incorect !
    </div>
    <?php
  }
  else {
    if ($isPasswordCorrect) {
      session_start();
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $_POST['pseudo'];
      header('location: my_cinema.php');
    }
    else {
      ?>
      <div class="alert alert-danger" role="alert">
        Pseudo ou Mot de passe incorect !
      </div>
      <?php
    }
  }
?>
