const button = document.getElementById('btn');
const typeReponse = document.getElementById('typeReponse');
const generate = document.getElementById('generate');

let cpt = 1;
button.addEventListener('click', function () {

    if (typeReponse.value == 'opt1') {
        genererElement('checkbox');

    }
    if (typeReponse.value == 'opt2') {

        genererElement('radio');
    }



})

typeReponse.addEventListener('change', function () {
    generate.innerHTML = '';
    cpt = 1;
    if (typeReponse.value == 'opt3') {

        const label = document.createElement('label');
        label.innerText = `Reponse`;
        const input = document.createElement('input');
        /*  input.setAttribute('name', 'nameInput[]'); */
        const div = document.createElement('div');
        div.appendChild(label);
        div.appendChild(input);
        generate.appendChild(div);

    }

})

//FONCTION GÉNÉRER UN CHAMP DE RÉPONSE
function genererElement(element) {

    const label = document.createElement('label');
    label.innerText = `Reponse${cpt}`;
    const input = document.createElement('input');
    input.setAttribute('name', 'nameInput[]');
    const checkbox = document.createElement('input');
    checkbox.setAttribute('type', `${element}`);
    checkbox.setAttribute('name', 'choice[]')
    checkbox.setAttribute('value', `${cpt}`)
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

    })

}

