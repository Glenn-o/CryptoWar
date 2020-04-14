<?php
class Joueur
{
    private $pseudo;
    private $niveau;

    function get_pseudo()
    {
        return $this->pseudo;
    }

    function connexion($email, $mdp)
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
                header('Location: http://www.google.com/');
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