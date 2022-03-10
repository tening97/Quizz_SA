const container = document.getElementById('container');

const form = document.getElementById('form');
const prenom = document.getElementById('prenom');
const nom = document.getElementById('nom');
const login = document.getElementById('login');
const password = document.getElementById('password');
const password1 = document.getElementById('password1');
const bouton = document.getElementById('bouton');
const div = document.getElementsByClassName('div');
const param = document.getElementById('param');
const param1 = document.getElementById('param1');
const param2 = document.getElementById('param2');
const param3 = document.getElementById('param3');
const param4 = document.getElementById('param4');
const image = document.getElementById('img');
const divImage = document.getElementsByClassName('droite')

/* function validateEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!re.test(input.value.trim().toLowerCase())) {
        return true;
    } else {
        return false;
    }
} */

function validateEmail(input) {
    const re = /^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;

    if (!re.test(input.value.trim().toLowerCase())) {
        return true;
    } else {
        return false;
    }
}

function valid_password(input) {

    if (!input.value.match(/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%^&*]{6,}$/)) {
        return true;
    }
    else {
        return false;
    }
}
/* function valid_password(input) {
    if (!input.value.match(/[a-zA-Z]/) || !input.value.match(/[0-9]/) || input.value < 6) {
        return true;
    }
    else {
        return false;
    }
} */

function checkRequired(inputArray) {
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            return false;


        } else {

            return true;
        }
    });
}


function samePwd(input1, input2) {
    if (input1.value === input2.value) {

        return true;
    }
    else {

        return false;
    }


}

function load(photo) {

    const img = document.getElementById('img')
    img.src = window.URL.createObjectURL(photo.files[0]);
}


login.addEventListener('input', function () {
    if (validateEmail(login)) {
        login.style.border = '2px solid red';
    }
    else if (login.value == '' || login.value == null) {
        login.style.border = '2px solid red';
    }
    else {
        login.style.border = '2px solid green';
    }
})

password.addEventListener('input', function () {
    if (valid_password(password)) {
        password.style.border = '2px solid red';
    }
    else if (password.value == '' || password.value == null) {
        password.style.border = '2px solid red';
    }
    else {
        password.style.border = '2px solid green';
    }
})

prenom.addEventListener('input', function () {
    if (prenom.value == '' || prenom.value == null) {
        prenom.style.border = '2px solid red';
    }
    else {
        prenom.style.border = '2px solid green';
    }
})

nom.addEventListener('input', function () {
    if (nom.value == '' || nom.value == null) {
        nom.style.border = '2px solid red';
    }
    else {
        nom.style.border = '2px solid green';
    }
})

password1.addEventListener('input', function () {
    if (password1.value == '' || password1.value == null || password1.value != password.value) {
        password1.style.border = '2px solid red';
    }
    else {
        password1.style.border = '2px solid green';
    }
})


form.addEventListener('submit', function (e) {
    if (validateEmail(login) || valid_password(password) || checkRequired([prenom, nom, login, password, image]) || !samePwd(password, password1)) {
        e.preventDefault();
        form.style.border = '4px solid red';
    }


})