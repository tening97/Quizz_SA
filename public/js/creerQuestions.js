const button = document.getElementById('btn');
const typeReponse = document.getElementById('typeReponse');
const generate = document.getElementById('generate');
const libQuestion = document.getElementById('text');
const plus = document.getElementById('plus');
const moins = document.getElementById('moins');
const valeur = document.getElementById('nbrePoints');
const forme = document.getElementById('forme');


plus.addEventListener('click', function () {
    incrementer(valeur);


})
moins.addEventListener('click', function () {
    decrementer(valeur);
})



button.addEventListener
let cpt = 1;
button.addEventListener('click', function () {

    if (typeReponse.value == 'multiple') {
        genererElement('checkbox');

    }
    if (typeReponse.value == 'unique') {

        genererElement('radio');

    }



})
forme.addEventListener('submit', function (e) {


})

typeReponse.addEventListener('change', function () {
    generate.innerHTML = '';
    cpt = 1;
    if (typeReponse.value == 'text') {

        const label = document.createElement('label');
        label.innerText = `Reponse`;
        const input = document.createElement('input');
        input.setAttribute('name', 'nameInput[]');
        const div = document.createElement('div');
        div.appendChild(label);
        div.appendChild(input);
        generate.appendChild(div);

    }

})
//Fonction champ requis

function checkRequired(inputArray) {
    const small = document.createElement('small');
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            return false;


        } else {

            return true;
        }
    });
}
//FONCTION GÉNÉRER UN CHAMP DE RÉPONSE
function genererElement(element) {

    const label = document.createElement('label');
    label.setAttribute('class', 'lab')
    label.innerText = `Reponse${cpt}`;
    const input = document.createElement('input');
    input.setAttribute('name', 'nameInput[]');
    const checkbox = document.createElement('input');
    checkbox.setAttribute('type', `${element}`);
    checkbox.setAttribute('name', 'choice[]')
    input.addEventListener('input', function () {
        checkbox.value = input.value;
    })
    const img = document.createElement('img');
    img.src = "./img/ic-supprimer.png";
    const div = document.createElement('div');
    div.appendChild(label);
    div.appendChild(input);
    div.appendChild(checkbox);
    div.appendChild(img);
    generate.appendChild(div);
    cpt++;
    img.addEventListener('click', function () {
        div.remove();
        rebuild();

    })


}
//fonction Rebuilt
function rebuild() {
    const labels = document.querySelectorAll('.lab');
    labels.forEach((label, cpt) => {
        label.innerHTML = `Reponse${cpt}`
    });
}
//Function d'incrementation

function incrementer(input) {
    input.value++;
}
//Function de decrementation
function decrementer(input) {
    if (input.value > 1) {
        input.value--;
    }

}


