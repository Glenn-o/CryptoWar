profil = document.getElementById('profil');
connexion = document.getElementById('deconnexion');
fleche = document.getElementById('fleche');

fleche.addEventListener("click", function(){
    if(profil.style.display == "flex")
    {
        profil.style.display = "none";
        connexion.style.display = "none";
        fleche.style.transform= "rotate(90deg)";
    }
    else
    {
        profil.style.display = "flex";
        connexion.style.display = "flex";
        fleche.style.transform= "rotate(0deg)";
    }
    
});