/*
    affichage des formulaires d'ajout d'un nouveau utilisateur, vacataire, cours et les messages d'alertes 
*/ 

// contenu principale et tous les formulaires et les messages alertes 
const container = document.querySelector('#container');
const childreen = document.querySelectorAll('#container > div');



// Afficher le contenu principal
const displayContainer = function(index){
    container.classList.replace('opacity-0', 'opacity-100');
    container.classList.remove('invisible');

    childreen[index].classList.replace('opacity-0', 'opacity-100');
    childreen[index].classList.replace('scale-75', 'scale-100');

    childreen.forEach((item, i) =>{ 
        if(i != index){
            item.classList.add('hidden')
        }  
    })
}


const closerBtn = document.querySelectorAll('#closer');
closerBtn.forEach((item) => {
    item.addEventListener('click', function(e){
        // childreen.forEach((item) =>{item.classList.remove('hidden')});
        container.classList.replace('opacity-100', 'opacity-0');
        container.classList.add('invisible');
        e.currentTarget.parentNode.parentNode.classList.replace('scale-100', 'scale-75');
        e.currentTarget.parentNode.parentNode.classList.replace('opacity-100', 'opacity-0');
    });
    
});


