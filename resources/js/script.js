var actionsImages = document.getElementsByClassName('actionsImage');
for(var i=0;i<actionsImages.length;i++){
    actionsImages[i].addEventListener("click", (e) => {
        var elementName = e.target.id;
        var elementId = elementName.split('_');
        var actionsMenu = document.getElementById('elementNumber'+elementId[1]);
        var actionsMenus = document.getElementsByClassName('actionsMenu');
        
        //On s'assure qu'aucun formulaire de suppression n'est ouvert
        var deleteForms = document.getElementsByClassName('deleteForm');
        for(var y=0;y<deleteForms.length;y++){
            if(!deleteForms[y].classList.contains('hidden')){
                deleteForms[y].classList.add('hidden');
            }
        }

        //Si le menu d'actions cliqué est masqué...
        if(actionsMenu.classList.contains('hidden')){
            //On s'assure que tous les autres menus soit masqués
            for(var i=0;i<actionsMenus.length;i++){
                actionsMenus[i].classList.add('hidden');
            }
            //Puis on affiche le menu cliqué
            actionsMenu.classList.remove('hidden');
        }else{//Sinon...
            //On masque simplement le menu cliqué
            actionsMenu.classList.add('hidden');
        }
    });
}

//On ajoute un évènement de clique sur tous les liens "Supprimer"
var deleteLinks = document.getElementsByClassName('deleteLink');
for(var i=0;i<deleteLinks.length;i++){
    deleteLinks[i].addEventListener("click", (e) => {
        var elementName = e.target.id;
        var elementId = elementName.split('_');
        var deleteForm = document.getElementById('deleteForm'+elementId[1]);

        //Si le formulaire de suppression est masqué...
        if(deleteForm.classList.contains('hidden')){
            //On l'affiche
            deleteForm.classList.remove('hidden');
        }
    });
}

//On ajoute un évènement clique sur tous les bouton "Annuler" des formulaire de suppression permettant de fermer ceux-ci
var cancelButton = document.getElementsByClassName('cancelButton');
for(var i=0;i<cancelButton.length;i++){
    //Lorsqu'on clique sur un bouton "Annuler"
    cancelButton[i].addEventListener("click", () => {
        console.log('Le bouton fonctionne!')
        //On récupère tous les formulaires de suppression
        var deleteForms = document.getElementsByClassName('deleteForm');
        for(var y=0;y<deleteForms.length;y++){
            //On les masque tous
            deleteForms[y].classList.add('hidden');
        }
    });
}