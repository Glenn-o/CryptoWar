<?php
if(empty($_POST['submit']))
{
    header('Location: ../html/inscription.html');
}
$pseudo = htmlentities($_POST['username']); 
$email = htmlentities($_POST['email']);
$motDePasse = htmlentities($_POST['password']);
$mdp_correspond = "";
$champ_formulaire = "";
$inscrit = "";
$email_existe = "";
$niveau = 0;
$bdd = new PDO('mysql:host=127.0.0.1:3307;dbname=cryptowar_db', 'root', '');

if(!(empty($_POST['username']) && empty($_POST['email']) && empty($_POST['password']))){
    if ($_POST['password'] != $_POST['password_again']){
        $mdp_correspond = "Les mots de passe ne correspondent pas !";
    }
    else{
        $verif_mail = $bdd->prepare("SELECT Email FROM joueur WHERE email=?");//verification de l'email dans la bdd
        $verif_mail->execute([$email]); 
        $user = $verif_mail->fetch();
        if($user)
        {
            $email_existe = "Un compte utilise déjà cette adresse mail";
        }
        else{
            $mdp_crypte = sha1($motDePasse);
            $insertmbr = $bdd->prepare('INSERT INTO joueur(Pseudo, Email, Motdepasse, Niveau) VALUES(:pseudo, :email, :motDePasse, :niveau)');
            $insertmbr->execute(array('pseudo'=> $pseudo, 'email'=>$email, 'motDePasse'=>$mdp_crypte, 'niveau'=> $niveau));
            $inscrit = "Félicitation, vous êtes inscrit !";
        }
    }
}
else{
    $champ_formulaire = "Tous les champs doivent être remplis";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Ubuntu&display=swap" rel="stylesheet">
</head>
<body id="body_inscription">
    <header>
        <i><p>CryptoWar</p></i>
    </header>
    <div id="formulaire_inscription">
        <h1>S'inscrire</h1>
        <form action="../php/inscription_post.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Pseudo">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Mot de passe">
            <input type="password" id="password" name="password_again" placeholder="Retapez votre mot de passe">
            <input type="submit" id="submit_login" name="submit" value="inscription">
        </form>
        <p><?php echo $mdp_correspond; ?></p>
        <p><?php echo $champ_formulaire; ?></p>
        <p><?php echo $inscrit; ?></p>
        <p><?php echo $email_existe; ?></p>
        <a href="../html/connexion.html">Vous avez déjà un compte ?</a>
    </div>
</body>
</html>
