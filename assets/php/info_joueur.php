<div id="info_joueur">
    <div id="info">
        <img src="../image/bell.png" class="cloche" alt="img_notification">
        <p><?php echo $joueur->get_niveau($_SESSION['email']) ?></p>
        <p><?php echo $joueur->get_pseudo($_SESSION['email']);?></p>
        <img src="../image/next_white.png" alt="img_down" id="fleche">
    </div>
    <div id="menu_joueur">
        <a href="" id="profil">mon profil</a>
        <a href="deconnexion.php" id="deconnexion">déconnexion</a>
    </div>
</div>