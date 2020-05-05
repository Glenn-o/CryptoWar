<?php 
session_start();
if(empty($_SESSION['email']))
{
    header('Location: assets/html/index.html');
}
require 'assets/php/joueur.php';
require 'assets/php/ressource.php';
$bdd = new PDO('mysql:host=127.0.0.1:3307;dbname=cryptowar_db', 'root', '');
$joueur = new Joueur;
$ressource = new Ressource;
$joueur->set_argent(($ressource->get_bitcoin_price() * $ressource->get_bitcoin($joueur->get_id($_SESSION['email']))) + ($ressource->get_ethereum_price() * $ressource->get_ethereum($joueur->get_id($_SESSION['email']))) + ($ressource->get_litecoin_price() * $ressource->get_litecoin($joueur->get_id($_SESSION['email']))), $_SESSION['email']);
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
    <section id="menu">
            <h1>CryptoWar</h1>
            <nav>
                <p>Menu</p>
                <ul>
                    <a href=""><li class="focus"><img src="assets/image/home_focus.png" alt="logo_accueil">Accueil</li></a>
                    <a href="assets/php/page_unite.php"><li><img src="assets/image/swords.png" alt="logo_unite">Unités</li></a>
                    <a href=""><li><img src="assets/image/run.png" alt="logo_action">Action</li></a>
                    <a href=""><li><img src="assets/image/hangar.png" alt="logo_hangar">Entrepôt</li></a>
                    <a href=""><li><img src="assets/image/mail.png" alt="logo_mail">Message</li></a>
                </ul>
            </nav>
    </section>
    <section id="main">
        <div id="info_joueur">
            <div id="info">
                <img src="assets/image/bell.png" class="cloche" alt="img_notification">
                <p><?php echo $joueur->get_niveau($_SESSION['email']) ?></p>
                <p><?php echo $joueur->get_pseudo($_SESSION['email']);?></p>
                <img src="assets/image/next_white.png" alt="img_down" id="fleche">
            </div>
            <div id="menu_joueur">
                <a href="" id="profil">mon profil</a>
                <a href="assets/php/deconnexion.php" id="deconnexion">déconnexion</a>
            </div>
        </div>
        <h1 class="accueil">Accueil</h1>
        <div id="container_ressource">
            <div id="bitcoin">
                <strong><p>Bitcoin</p></strong>
                <p class="prix"><?php echo ($ressource->get_bitcoin_price()); ?> €</p>
                <p><?php echo($ressource->get_bitcoin($joueur->get_id($_SESSION['email'])));?></p>
            </div>
            <div id="ethereum">
                <strong><p>Ethereum</p></strong>
                <p class="prix"><?php echo($ressource->get_ethereum_price()); ?> €</p>
                <p><?php echo($ressource->get_ethereum($joueur->get_id($_SESSION['email'])));?></p>
            </div>
            <div id="litecoin">
                <strong><p>Litecoin</p></strong>
                <p class="prix"><?php echo($ressource->get_litecoin_price()); ?> €</p>
                <p><?php echo($ressource->get_litecoin($joueur->get_id($_SESSION['email'])));?></p>
            </div>
        </div>

        <div id="container_bottom">
            <div id="container_argent_joueur">
                <p><?php $joueur->get_pseudo($_SESSION['email'])?></p>
                <div id="argent_joueur">
                    <img src="assets/image/euro.png" alt="logo_argent">
                    <p>Argent:</p>
                    <p class="argent"><?php $argent = ($ressource->get_bitcoin_price() * $ressource->get_bitcoin($joueur->get_id($_SESSION['email']))) + ($ressource->get_ethereum_price() * $ressource->get_ethereum($joueur->get_id($_SESSION['email']))) + ($ressource->get_litecoin_price() * $ressource->get_litecoin($joueur->get_id($_SESSION['email']))); echo $argent; ?> €</p>
                </div>
                <div id="classement_joueur">
                    <img src ="assets/image/top-three.png"alt="logo_classement">
                    <p>Classement:</p>
                </div>
            </div>
            <div id="container_classement">
                <h1>Classement</h1>
                <?php $joueur->get_classement(); ?>
            </div>
        </div>
    </section>
    <script src="assets/js/app.js"></script>
</body>
</html>