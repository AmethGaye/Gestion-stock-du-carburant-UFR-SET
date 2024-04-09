/*
    affichage des formulaires d'ajout d'un nouveau utilisateur, vacataire, cours et les messages d'alertes 
*/ 

// contenu principale et tous les formulaires et les messages alertes 
const container = document.querySelector('#container');
const child = document.querySelector('#container > div');



// Afficher le contenu principal
const displayContainer = function(edit = false){

    container.classList.replace('opacity-0', 'opacity-100');
    container.classList.replace('-z-50', 'z-50');
    container.classList.remove('invisible');
    container.classList.replace('scale-0', 'scale-100');

    child.classList.replace('opacity-0', 'opacity-100');
    child.classList.replace('scale-75', 'scale-100');
}


const closerBtn = document.querySelectorAll('#closer');
closerBtn.forEach((item) => {
    item.addEventListener('click', function(e){

        child.classList.replace('scale-100', 'scale-75');
        child.classList.replace('opacity-100', 'opacity-0'); 

        container.classList.replace('opacity-100', 'opacity-0');
        container.classList.replace('scale-100', 'scale-0');
        container.classList.replace('-z-50', 'z-50');
        container.classList.add('invisible');

    });
    
});


// Afficher en detail les demandes

const chContainer = document.querySelectorAll('#ch-container');

chContainer.forEach((item, index)=>{
    item.addEventListener('click', (e)=>{
        const superContainer = document.querySelectorAll('#super-contain');
        let detail = document.querySelectorAll('.mx-4 > .max-h-44');
        let height = String(224 + detail[index].getBoundingClientRect().height);
        
        if(e.currentTarget.firstElementChild.classList.contains('rotate-0')){
            e.currentTarget.firstElementChild.style = "transform: rotate(-180deg)";
            e.currentTarget.firstElementChild.classList.remove('rotate-0');

        }else{
            e.currentTarget.firstElementChild.style = "";
            e.currentTarget.firstElementChild.classList.add('rotate-0');

        }
        // console.log(e.currentTarget.firstElementChild.classList)


        if(superContainer[index].classList.contains('h-20')){
            superContainer[index].style = "height :"+height+"px";
            superContainer[index].classList.remove('h-20');
            // superContainer[index].classList.replace('h-20', 'h-['+height+']');
        }else{
            superContainer[index].style = "";
            superContainer[index].classList.add('h-20');
        }
    })
});

// Afficher en detail les activites DG
let plus = document.querySelectorAll('#plus');

plus.forEach((item, index)=>{
    item.addEventListener('click', (e)=>{
        const actContainer = document.querySelectorAll('#act-container');
        const desc = document.querySelectorAll('#desc');
        let height = String(desc[index].getBoundingClientRect().height + 80);

        if(actContainer[index].classList.contains('h-20')){
            actContainer[index].style = `height : ${height}px`;
            actContainer[index].classList.remove('h-20');
        }else{
            actContainer[index].style = "";
            actContainer[index].classList.add('h-20');
        }
        e.currentTarget.children[0].classList.toggle('hidden');
        e.currentTarget.children[1].classList.toggle('hidden');
        
    })
})




