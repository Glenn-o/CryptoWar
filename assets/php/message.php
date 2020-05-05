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
if(isset($_POST['submit'])){
    $joueur->set_message(($joueur->get_pseudo($_SESSION['email'])), ($_POST['contenu']), (intval($joueur->get_id($_SESSION['email']))));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Ubuntu&display=swap" rel="stylesheet">
</head>
<body id="body_message" onLoad="refresh_div()">
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
    <section id="main_message">
        <?php require 'info_joueur.php';?>
        <div id="chat">
            <?php $joueur->get_message();?>
        </div>
        <form action="message.php" method="POST" id="form_chat">
            <input type="text" name="contenu">
            <input type="submit" name="submit">
        </form>
    </section>
    <script src="../js/app.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>