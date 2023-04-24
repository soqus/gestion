body = document.body;
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY > 0);
});

function toggleMenu() {
    const menuToggle = document.querySelector('.menuToggle');
    const navigation = document.querySelector('.navigation');

    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}

$(document).ready(function () {
    socialPanel();
    //Formulario de contacto
    const $form = $('#form');
    const $username = $('#username');
    const $email = $('#email');
    const $comentario = $('#comentario');

    $form.on('submit', function (e) {
        e.preventDefault();

        checkContactoInputs($username.get(0), $email.get(0), $comentario.get(0));
    })

    $username.on('input', function (e) {
        e.preventDefault();
        checkEmptyInput($username.get(0), 'Debe ingresar un nombre de usuario');
    })

    $email.on('input', function (e) {
        e.preventDefault();
        checkEmail($email.get(0));
    })

    $comentario.on('input', function (e) {
        e.preventDefault();
        checkEmptyInput($comentario.get(0), 'Debe ingresar un comentario');
    })
});

function checkEmptyInput(input, errormsg) {
    const inputValue = input.value.trim();
    if (inputValue === '') {
        setErrorFor(input, errormsg);
        return true
    } else {
        setSuccessFor(input);
        return false
    }

}

function checkEmail(email) {
    const emailValue = email.value.trim();
    if (emailValue === '') {
        setErrorFor(email, 'Debe ingresar un Email');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'No ingreso un email válido');
    } else {
        setSuccessFor(email);
    }
}


function checkContactoInputs(usuario, email, comentario) {
    checkEmptyInput(usuario, 'Debe ingresar un nombre de usuario');
    checkEmail(email);
    checkEmptyInput(comentario, 'Debe ingresar un comentario');
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}