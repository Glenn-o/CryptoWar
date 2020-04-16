<div id="info_joueur">
    <img src="assets/image/bell.png" class="cloche" alt="img_notification">
    <p><?php $joueur->get_niveau($_SESSION['email']) ?></p>
    <p><?php $joueur->get_pseudo($_SESSION['email']);?></p>
    <img src="assets/image/next_white.png" class="fleche" alt="img_down">
</div>