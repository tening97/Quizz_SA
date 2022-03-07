
const forme = document.querySelector('#forme');
const login = document.querySelector('#login');
const pwd = document.querySelector('#pwd');
const button = document.querySelector(".btn");
const item = document.getElementById('item');
const item1 = document.getElementById('item1');



function validateEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!re.test(input.value.trim().toLowerCase())) {
        return true;
    } else {
        return false;
    }
}

function valid_password(input) {
    if (!input.value.match(/[a-zA-Z]/) || !input.value.match(/[0-9]/) || input.value < 6) {
        return true;
    }
    else {
        return false;
    }
}

function checkRequired(inputArray) {
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            return false;


        } else {

            return true;
        }
    });
}



item.addEventListener('input', function () {
    if (validateEmail(login)) {
        item.style.border = '2px solid red';
    }
    else if (login.value == '' || login.value == null) {
        item.style.border = '2px solid red';
    }
    else {
        item.style.border = '2px solid green';
    }
})

item1.addEventListener('input', function () {
    if (valid_password(pwd)) {
        item1.style.border = '2px solid red';
    }
    else if (pwd.value == '' || pwd.value == null) {
        item1.style.border = '2px solid red';
    }
    else {
        item1.style.border = '2px solid green';
    }
})

forme.addEventListener('submit', function (e) {
    if (validateEmail(login) || valid_password(pwd) || checkRequired([login, pwd])) {
        e.preventDefault();
        forme.style.border = '4px solid red';
    }


})