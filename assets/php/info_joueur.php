<div id="info_joueur">
    <div id="info">
        <img src="assets/image/bell.png" class="cloche" alt="img_notification">
        <p><?php $joueur->get_niveau($_SESSION['email']) ?></p>
        <p><?php $joueur->get_pseudo($_SESSION['email']);?></p>
        <img src="assets/image/next_white.png" alt="img_down" id="fleche">
    </div>
    <div id="menu_joueur">
        <a href="" id="profil">mon profil</a>
        <a href="assets/php/deconnexion.php" id="deconnexion">déconnexion</a>
    </div>
</div>