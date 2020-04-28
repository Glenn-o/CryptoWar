<?php 
session_start();
if(empty($_SESSION['email']))
{
    header('Location: ../html/index.html');
}
require 'joueur.php';
require 'ressource.php';
$bdd = new PDO('mysql:host=127.0.0.1:3307;dbname=cryptowar_db', 'root', '');
$joueur = new Joueur;
$ressource = new Ressource;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Ubuntu&display=swap" rel="stylesheet">
</head>
<body id="body_unite">
    <section id="menu">
            <h1>CryptoWar</h1>
            <nav>
                <p>Menu</p>
                <ul>
                    <a href="../../index.php"><li><img src="../image/home.png" alt="logo_accueil">Accueil</li></a>
                    <a href=""><li  class="focus"><img src="../image/swords_focus.png" alt="logo_unite">Unités</li></a>
                    <a href=""><li><img src="../image/run.png" alt="logo_action">Action</li></a>
                    <a href=""><li><img src="../image/hangar.png" alt="logo_hangar">Entrepôt</li></a>
                    <a href=""><li><img src="../image/mail.png" alt="logo_mail">Message</li></a>
                </ul>
            </nav>
    </section>
    <section id="main_unite">
        <?php require 'info_joueur.php';?>
        <h1 class="unite">Unités</h1>
        <div id="container_unite2">
            <div id="container_hack">
                <img src="../image/hacker.png" alt="logo_hacker">
                <p>Hacker</p>
                <p>Vous en possédez :</p>
                <button>Acheter</button>
                <p>100€ / Unité</p>
            </div>

            <div id="container_tueur_a_gages">
                <img src="../image/blood.png" alt="blood_icon">
                <p>Tueur à gages</p>
                <p>Vous en possédez :</p>
                <button>Acheter</button>
                <p>10 000€ / Unité</p>
            </div>

            <div id="container_dev">
                <img src="../image/cyber-security.png" alt="security_icon">
                <p>Développeur en Cyber-Sécurité</p>
                <p>Vous en possédez :</p>
                <button>Acheter</button>
                <p>600€ / Jour <br> + <br> 100€ pour chaque protection</p>
            </div>
        </div>
    </section>
    <script src="../js/app.js"></script>
</body>
</html>