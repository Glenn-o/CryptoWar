<?php 
class Ressource
{
    function get_bitcoin($Id_joueur)//pour récupérer le nombre de bitcoin que le joueur possède
    {
        global $bdd;
        $recup = $bdd->prepare(" SELECT Bitcoin FROM ressources JOIN miner ON ressources.Id_Ressources = miner.Id_Joueur where Id_joueur = ?");
        $recup->execute([$Id_joueur]);
        $recup_bitcoin = $recup->fetch();
        return $recup_bitcoin[0];
    }
    function get_ethereum($Id_joueur)
    {
        global $bdd;
        $recup = $bdd->prepare(" SELECT Ethereum FROM ressources JOIN miner ON ressources.Id_Ressources = miner.Id_Joueur where Id_joueur = ?");
        $recup->execute([$Id_joueur]);
        $recup_ethereum = $recup->fetch();
        return $recup_ethereum[0];
    }
    function get_litecoin($Id_joueur)
    {
        global $bdd;
        $recup = $bdd->prepare(" SELECT Litecoin FROM ressources JOIN miner ON ressources.Id_Ressources = miner.Id_Joueur where Id_joueur = ?");
        $recup->execute([$Id_joueur]);
        $recup_litecoin = $recup->fetch();
        return $recup_litecoin[0];
    }
    function get_bitcoin_price()
    {
        $url = "https://www.bitstamp.net/api/v2/ticker/btceur/";//url de l'api pour le prix du bitcoin
        $fgc = file_get_contents($url);
        $json = json_decode($fgc, true);//decode du fichier en json
        $price = $json['last'];//la commande last de l'api sert à avoir le prix du bitcoin le plus récent
        return $price;
    }
    function get_ethereum_price()
    {
        $url = "https://www.bitstamp.net/api/v2/ticker/etheur/";
        $fgc = file_get_contents($url);
        $json = json_decode($fgc, true);
        $price = $json['last'];
        return $price;
    }
    function get_litecoin_price()
    {
        $url = "https://www.bitstamp.net/api/v2/ticker/ltceur";
        $fgc = file_get_contents($url);
        $json = json_decode($fgc, true);
        $price = $json['last'];
        return $price;
    }
}
?>