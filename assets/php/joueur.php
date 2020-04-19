<?php
class Joueur
{
    // private $pseudo;
    // private $niveau;

    // function get_pseudo()
    // {
    //     return $this->pseudo;
    // }

    function get_pseudo($email)//pour recupérer le pseudo avec l'email
    {
        global $bdd;
        $recup = $bdd->prepare("SELECT Pseudo FROM joueur where email = ?");
        $recup->execute([$email]);
        $recup_pseudo = $recup->fetch();
        echo $recup_pseudo[0];

    }
    function get_niveau($email)//pour recupérer le niveau avec l'email
    {
        global $bdd;
        $recup = $bdd->prepare("SELECT Niveau FROM joueur where email = ?");
        $recup->execute([$email]);
        $recup_niveau = $recup->fetch();
        echo $recup_niveau[0];
 
    }
    function get_id($email)
    {
        global $bdd;
        $recup = $bdd->prepare("SELECT Id_Joueur FROM joueur where email = ?");
        $recup->execute([$email]);
        $recup_id = $recup->fetch();
        return $recup_id[0];
    }
    function connexion($email, $mdp)//pour se connecter
    {
        global $bdd;
        $verif_mail = $bdd->prepare("SELECT Email FROM joueur WHERE email=?");
        $verif_mail->execute([$email]); 
        $email_existe = $verif_mail->fetch();
        if($email_existe)
        {
            $verif_mdp = $bdd->prepare("SELECT Motdepasse FROM joueur WHERE Motdepasse = ?");
            $verif_mdp->execute([sha1($mdp)]);
            $mdp_existe = $verif_mdp->fetch();
            if($mdp_existe)
            {
                header('Location: ../../index.php');
            }
            else
            {
                global $mdp_different;
                $mdp_different = "Le mot de passe ne correspond pas ";
            }
        }
        else
        {
            global $pasdecompte;
            $pasdecompte = "Aucun compte n'existe avec cette adresse mail";
        }
    }
}

?>