<?php
session_start();
if(empty($_POST['submit']))
{
    header('Location: ../html/connexion.html');
}
require 'joueur.php';
$bdd = new PDO('mysql:host=127.0.0.1:3307;dbname=cryptowar_db', 'root', '');
$email = htmlentities($_POST['email']);
$_SESSION['email'] = $email;
$motDePasse = htmlentities($_POST['password']);
$pasdecompte = "";
$mdp_different = "";
$champ_formulaire = "";
$joueur = new Joueur;

if(!(empty($_POST['email']) && empty($_POST['password'])))
{
    $joueur->connexion($email, $motDePasse);
}
else
{
    $champ_formulaire = "Tous les champs doivent être remplis";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Ubuntu&display=swap" rel="stylesheet">
</head>
<body id="body_connexion">
    <header>
        <i><p>CryptoWar</p></i>
    </header>
    <div id="formulaire">
        <h1>Se connecter</h1>
        <form action="../php/connexion_post.php" method="POST">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Mot de passe">
            <input type="submit" id="submit_login" name="submit" value="connexion">
        </form>
        <p><?php echo $champ_formulaire;?></p>
        <p><?php echo $pasdecompte;?></p>
        <p><?php echo $mdp_different;?></p>
        <a href="#">Mot de passe oublié ?</a>
    </div>
</body>
</html>