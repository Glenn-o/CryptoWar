<?php 
session_start();
if(empty($_SESSION['email']))
{
    header('Location: assets/html/index.html');
}
require 'assets/php/joueur.php';
$bdd = new PDO('mysql:host=127.0.0.1:3307;dbname=cryptowar_db', 'root', '');
$joueur = new Joueur;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Ubuntu&display=swap" rel="stylesheet">
</head>
<body id="body_accueil">
   <?php require 'assets/php/menu.php';?>
    <section id="main">
        <?php require 'assets/php/info_joueur.php';?>
        <h1>Accueil</h1>
        <a href="assets/php/deconnexion.php">déconnexion</a>
    </section>
</body>
</html>