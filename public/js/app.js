/*
    affichage des formulaires d'ajout d'un nouveau utilisateur, vacataire, cours et les messages d'alertes
*/
document.addEventListener("DOMContentLoaded", (event) => {
    if(sessionStorage.getItem('msg')){
        showMessage(sessionStorage.getItem('msg'));
        sessionStorage.removeItem('msg')
    }
    try {
        document.querySelector('#opt-choosen').value = sessionStorage.getItem('month') || "Janvier";
        sessionStorage.removeItem('month');
    } catch (error) {
        
    }
  });


try {
    let progressCircle = document.querySelector('.progress');
    let radius = progressCircle.r.baseVal.value;
    let circumference = radius * 2 * Math.PI;
    progressCircle.style.strokeDasharray = circumference;
    // progressCircle.style.strokeDashoffset = 300
    setProgress(95)

    function setProgress(parcent) {
        progressCircle.style.strokeDashoffset = circumference * (1 - parcent / 100);
    }
} catch (error) {
    
}


// les variables
const container = document.querySelector('#container');
const container2 = document.querySelector('#container-2');
const child = document.querySelector('#container > div');
const child2 = document.querySelector('#container-2 > div');
const btn = document.querySelector('#submit');
const closerBtn = document.querySelector('#closer');
const form = document.querySelector('#subscription');
const chContainer = document.querySelectorAll('#ch-container');
const r_form = document.querySelectorAll('#r_form');
const eyes = document.querySelectorAll('#eyes');
const eyesHidden = document.querySelectorAll('#eyes-hidden');
const password = document.querySelectorAll('#password');
const inputNumber = document.querySelectorAll('#number');
const ticketInput = document.querySelectorAll('#tickets');

try {
    inputNumber.forEach((item, index) => {
        item.addEventListener('change', (e)=> {
            ticketInput[index].value = item.value;
        });
    }) 
} catch (error) {
    
}


// Afficher le contenu principal


// fermer le formulaire
try {
    closerBtn.addEventListener('click', function(e){
        reset();
    });
} catch (error) {

}


// Afficher en detail les demandes

try {
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
                document.querySelectorAll('#ctn')[index].classList.add('border-b','border-zinc-300');
                // console.log(document.querySelectorAll('#ctn')[index])
                // superContainer[index].classList.replace('h-20', 'h-['+height+']');
            }else{
                superContainer[index].style = "";
                superContainer[index].classList.add('h-20');
                document.querySelectorAll('#ctn')[index].classList.remove('border-b','border-zinc-300');

            }
        })
    });
} catch (error) {

}

// Afficher en detail les activites DG
let plus = document.querySelectorAll('#plus');
try {
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
} catch (error) {
    console.log(error.message)
}


// gerer la soumission des formulaires
try {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        if( 
            document.querySelector('.departement_id')  
            && document.querySelector('.departement_id').disabled == false
            && document.querySelector('.departement_id').value == ""
        ){
            document.querySelector('.departement_id').nextElementSibling.innerHTML = "Veillez selectionner un département";
        }else{
            subscribe(); 
        }
    });
} catch (error) {
    console.log(error.message)
}



try {
    r_form.forEach((item, index) => {
        item.addEventListener('submit', (e)=>{
            e.preventDefault();
            const x = document.querySelectorAll('#r_form input[type=number]');
            let input = new FormData(item);
            if(isNaN(input.get('ticket')) || input.get('ticket') === ""){
                console.log(x[index].value)
                x[index].classList.remove('border-zinc-200');
                x[index].style = "border-color: #dc2626";
            }else{
                e.currentTarget.submit();
            }
        })
    });
} catch (error) {
    console.log(error.message)
}




// LES FONCTIONS

const hidePassword = (index = null) => {
    eyes[index].classList.add('hidden');
    eyesHidden[index].classList.remove('hidden');
    password[index].type = "password";
    // console.log('hide')
}

const showPassword = (index = null) => {
    eyes[index].classList.remove('hidden');
    eyesHidden[index].classList.add('hidden');
    password[index].type = "text";
    // console.log('show')
}


const displayContainer = function(url = null, edit = false, data = null){
    container.classList.replace('opacity-0', 'opacity-100');
    container.classList.replace('-z-50', 'z-50');
    container.classList.remove('invisible');
    container.classList.replace('scale-0', 'scale-100');

    child.classList.replace('opacity-0', 'opacity-100');
    child.classList.replace('scale-75', 'scale-100');
    // console.log(data)
    if(url){
        form.action = url;
    }


    if(edit && data){
        // console.log(form.action)
        delPasswordField(true);
        let field = document.querySelectorAll("#subscription label + *");
        field.forEach((item)=>{
            if(item.nodeName === "DIV"){
                item.firstElementChild.value = data[item.firstElementChild.id];
            }else{
                let x = data[item.id] || "";
                item.value = x;
            }
        })
    }
}

try {
    const delSubmit = document.querySelectorAll('#delSubmit');
    delSubmit.forEach((item, index) => {
        item.addEventListener('submit', (e)=>{
            e.preventDefault();
            document.getElementById('delete').onclick = ()=> {delSubmit[index].submit()};
            document.getElementById('cancel').onclick = ()=> {_reset()};
            displayContainer2();
        })
    })
    document.getElementById('closer2').onclick = ()=> {_reset()};
} catch (error) {
    
}


const displayContainer2 = () => {
    container2.classList.replace('opacity-0', 'opacity-100');
    container2.classList.replace('-z-50', 'z-50');
    container2.classList.remove('invisible');
    container2.classList.replace('scale-0', 'scale-100');

    child2.classList.replace('opacity-0', 'opacity-100');
    child2.classList.replace('scale-75', 'scale-100');
}

const _reset = () => {
    child2.classList.replace('scale-100', 'scale-75');
    child2.classList.replace('opacity-100', 'opacity-0');
    container2.classList.replace('opacity-100', 'opacity-0');
    container2.classList.replace('scale-100', 'scale-0');
    container2.classList.replace('-z-50', 'z-50');
    container2.classList.add('invisible');
}

const reset = ()=>{
    child.classList.replace('scale-100', 'scale-75');
    child.classList.replace('opacity-100', 'opacity-0');
    container.classList.replace('opacity-100', 'opacity-0');
    container.classList.replace('scale-100', 'scale-0');
    container.classList.replace('-z-50', 'z-50');
    container.classList.add('invisible');

    delPasswordField(false);


    let field = document.querySelectorAll("#subscription label + *");
    field.forEach((item)=>{
        if(item.nodeName === 'DIV'){
            item.children[0].value = "";
            if(item.children[1]){
                item.children[1].innerHTML = "";
            }
        }else if(item.nodeName === 'SELECT'){
            item.firstElementChild.selected = 'true';
        }else{
            item.value = "";
        }

        if(item.nextElementSibling){ 
            item.nextElementSibling.innerHTML = "";
        }
    })


    if(document.querySelector('.departement_id')){
        document.querySelector('.departement_id').disabled = true;
    }

}

const delPasswordField = (x = false)=>{

    if(x){
        if(document.getElementById('default-mdp')){
            document.getElementById('default-mdp').classList.add('hidden');
        }
    }else{
        if(document.getElementById('default-mdp')){
            document.getElementById('default-mdp').classList.remove('hidden');
        }
    }
    
}



const subscribe = async () => {
    try {
        let url = form.action;
        let data = new FormData(form);
        // console.log(url)
        let response = await fetch(url, {
            method: 'POST',
            body: data,
        });
        const result = await response.json();
         //const result = await response.text();
        //console.log(result);

        if(response.ok && result.success){
            sessionStorage.setItem('msg',result.msg);
            location.reload();
            // console.log("ok")

        }else{
            showMessage(result.errors, 'error')
            // console.log('error');
        }

    } catch (error) {
        console.log(error.message);
    }
};


const showMessage = (message, type = 'success') => {
    if(type === 'success'){
        document.getElementById('success').innerHTML = message;
        setTimeout(()=>{document.getElementById('success').innerHTML = "";},3500 );
    }

    if(type === 'error'){
        let field = document.querySelectorAll("#subscription label + *");
        // console.log(field);
        field.forEach((item)=>{
            if(item.nodeName === "DIV" && message[item.firstElementChild.id]){
                item.children[1].textContent = message[item.firstElementChild.id];
            }else if(message[item.id]){
                item.nextElementSibling.textContent = message[item.id];
            }
        })
        // console.log(message);


    }
};


const incrementer = (elem, value = 1) => {
    let inputNumber = elem.parentNode.previousElementSibling;

    if(inputNumber.nodeName == 'DIV'){
        inputNumber = inputNumber.previousElementSibling;
    }

    if(!inputNumber.value){
        inputNumber.value = '0';
    }else{
        inputNumber.value = String(parseInt(inputNumber.value) + value);
    };
    if(ticketInput.length != 0){
     ticketInput[getIndex(inputNumber)].value = inputNumber.value;
    }
}


const decrementer = (elem, value = 1) => {
    // elem.parentNode.autofocus = true;
    let inputNumber = elem.parentNode.previousElementSibling;

    if(inputNumber.nodeName == 'DIV'){
        inputNumber = inputNumber.previousElementSibling;
    }

    if(parseInt(inputNumber.value) <= 0 || !inputNumber.value){
        inputNumber.value = '0';
    }else{
        inputNumber.value = String(parseInt(inputNumber.value) - value);
    }

    if(ticketInput.length != 0){
        ticketInput[getIndex(inputNumber)].value = inputNumber.value;
    }
}



const showOptionContainer = (input) => {
    document.getElementById('options-container').classList.toggle('hidden'); 
    document.querySelector('#chevron').classList.toggle('rotate-180')
    let options = document.querySelectorAll('#options-container > *');
    options.forEach((item) => {
        item.classList.remove('bg-zinc-100');
        if(item.textContent === input.value){
            item.classList.add('bg-zinc-100')
        }
    });
}

const getOption = (key, value) => {
    window.sessionStorage.setItem('month', value);
    document.getElementById('options-container').classList.toggle('hidden');
    document.querySelector('#chevron').classList.toggle('rotate-180'); 
    document.getElementById('opt-choosen').nextElementSibling.value = key;
    document.getElementById('opt-choosen').parentElement.submit();
}

const showFiltersContainer = () => {
    document.getElementById('filters-container').classList.toggle('hidden');
    document.querySelector('#chevron-2').classList.toggle('rotate-180')


}

const addOrderBy = (elem, value) => {
    if(!isPresent(value)){
        let input = document.createElement('input');
        input.type = "hidden";
        input.name = "order[]";
        input.value = value
        document.getElementById('sub-filters').appendChild(input);
        elem.classList.add('bg-zinc-200');
    }else{
        removeField(value);
        elem.classList.remove('bg-zinc-200');
    }
} 

const addFilter = (elem, key, value) => {
    if(!isPresent(value)){
        let input = document.createElement('input');
        input.type = "hidden";
        input.name = `${key}[]`;
        input.value = value
        document.getElementById('sub-filters').appendChild(input);
        elem.classList.add('bg-zinc-200');
    }else{
        removeField(value);
        elem.classList.remove('bg-zinc-200');
    }
}

const isPresent = (value) => {
    let inputs = document.querySelectorAll('#sub-filters > input');
    let flag = false;
    inputs.forEach((item, index) => {
        if(index != 0 && item.value == value){
            flag = true;
        }
    });

    return flag;
}


const removeField = (value) => {
    let inputs = document.querySelectorAll('#sub-filters > input');
    inputs.forEach((item) => {
        if(item.value == value){
            item.remove();
        }
    });
}

const getIndex = (elem) => {
    let index = 0;
    for(i = 0; i < inputNumber.length; i++){
        if(elem == inputNumber[i]){
            index = i;
            break;
        }
    }
    return index;

}


const __select = (elem) => {
    getMatiere(elem.value);
}

const getMatiere = async (id) => {
    try {
        let url = `/departement/cours/matieres/${id}`;

        let response = await fetch(url);
        const result = await response.json();
        // const result = await response.text();
        

        if(response.ok && result.success){
            let data = JSON.parse(result.filiere).matieres;
            let options = "";
            for(let x of data){
                options += `<option value="${x.id}">${x.nom}</option> \n`;
            }
            document.getElementById('matiere_id').innerHTML = options;
        }

    } catch (error) {
        console.log(error.message);
    }
};


try {
    document.querySelectorAll('#roleSubs').forEach((item) => {
        item.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log(item.action)
            getRole(item);
            item.parentElement.classList.toggle('opt');
        } )
    });
} catch (error) {
    
}

const getRole = async (elem) => {
    try {
        let url = elem.action;
        let response = await fetch(url);
        const result = await response.json();
        // const result = await response.text();
        console.log(result)
        

        if(response.ok && result.success){
            document.querySelector('#roleForm').action = url;
            document.querySelector('#roleForm #nom').value = result.role['nom'];
            document.querySelector('#roleForm #priorite').value = result.role['priorite'];
        }

    } catch (error) {
        console.log(error.message);
    }
};

const ruleChecker = (elem, data) => {
    if(data[elem.value] == 'assistant' || data[elem.value] == 'chef_departement'){
        // console.log('click')
        document.querySelector('.departement_id').disabled = false;
        document.querySelector('.departement_id').value = "";

    }else{
        document.querySelector('.departement_id').disabled = true;
        document.querySelector('.departement_id').value = "";

    }
}


const showOptions = (elem) => {
    elem.nextElementSibling.classList.toggle('opt')
}




