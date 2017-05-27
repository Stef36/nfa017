
/***************************Image**************************************/

function affichimage(select){
    var valueToImage;
if (document.commande.produit.value == 300){
    valueToImage = "img/tablette.jpg";
}
else {
    valueToImage = "img/pc.jpg";
}
    document.getElementById("image").src = valueToImage;//affiche l'image
    document.commande.formimage.value = valueToImage;//affiche le chemin de l'image
}
