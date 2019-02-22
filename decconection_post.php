<?php
session_start();
$_SESSION['pseudo'];
$_SESSION['id'];
session_destroy();
header('location: index.php');
