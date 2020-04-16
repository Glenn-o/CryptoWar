<?php 
session_start();
  
if(isset($_SESSION['email']))//si l'utilisateur est connecté alors on supprime sa session
{
    $_SESSION = array();
    session_destroy();
    setcookie('login', '');
    setcookie('pass_hache', '');
    header('Location: ../../index.php');

}
else//sinon on le redirige vers l'accueil
{ 
    header('Location: ../../index.php');

}
?>