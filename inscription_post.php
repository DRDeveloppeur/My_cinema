<?php
//connexion a la BDD
  $bdd = new PDO ('mysql:host=localhost;dbname=epitech_tp;charser=utf8', 'root', '',
  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//Hachage du mot de passe
  $pass_hache = password_hash(htmlspecialchars($_POST['pass']), PASSWORD_DEFAULT);
//Insertion a la BDD
  $req = $bdd -> prepare('INSERT INTO gerent(pseudo, pass)
  VALUES(?, ?)');
  $req->execute(array(htmlspecialchars($_POST['pseudo']),
    $pass_hache));

//Reedirection vers la page de connexion
  header('location: index.php');
?>
