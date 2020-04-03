<?php ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <i><p>CryptoWar</p></i>
    </header>
    <div id="formulaire">
        <img src="../image/Bitcoin.png" alt="logo_bitcoin" id="logo">
        <h1>Se connecter</h1>
        <form action="../php/connexion_post.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Pseudo">
            <input type="password" id="password" name="password" placeholder="Mot de passe">
            <input type="submit" id="submit" name="submit" value="Connexion">
        </form>
    </div>
</body>
</html>

