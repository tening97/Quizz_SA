const suivant = document.getElementById('suivant');
const precedent = document.getElementById('precedent');
const table = document.querySelector('table');
const trElement = document.querySelectorAll('.tr_valeur');
const trEntete = document.getElementById('entete');



let nbrJoueursParPag = 5;
let first = 0;
afficherListe();


suivant.addEventListener('click', function pageSuivant() {
    if (first + nbrJoueursParPag <= trElement.length) {
        first += nbrJoueursParPag;
        afficherListe();
    }
  


}
);
precedent.addEventListener('click', function pageSuivant() {
    first -= nbrJoueursParPag;
    afficherListe();

})



function afficherListe() {
    let tableList = ` <tr> ${trEntete.innerHTML}<tr/>`;
    for (let i = first; i < first + nbrJoueursParPag; i++) {
        if (i < trElement.length) {
            tableList += `
             <tr> ${trElement[i].innerHTML}<tr/>
             `
        }

    }
    table.innerHTML = tableList;
}
