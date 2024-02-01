const nombre = document.getElementById('nombre');
const result_nombre = document.getElementById('result_nombre');

nombre.addEventListener('input', (event) => {
    const textValue = event.currentTarget.value;

    if (!isValidText(textValue)){
        return result_nombre.innerHTML = `El nombre no puede contener números`;
    };
    result_nombre.innerHTML = '';
});

function isValidText(text){
    return /^[A-z\s]+$/.test(text);
}

const usuario = document.getElementById('usuario');
const result_usuario = document.getElementById('result_usuario');

usuario.addEventListener('input', (event) => {
    const textValue = event.currentTarget.value;

    if (!isValidTextUsuario(textValue)){
        result_usuario.innerHTML = `Máximo 20 caracteres alfanuméricos`;
    } else {
        result_usuario.innerHTML = '';
    }
});

usuario.addEventListener('keydown', (event) => {
    if (event.key === ' ') {
        event.preventDefault();  // Evitar que se escriba el espacio
    }
});

function isValidTextUsuario(text){
    const maxLength = 20;

    // Permitir letras y números
    return /^[A-Za-z0-9\s]*$/.test(text) && text.length <= maxLength;
}

const contraseña = document.getElementById('contraseña');
const result_contraseña = document.getElementById('result_contraseña');
const caracter_minimo = 6;
const caracter_maximo = 20;

contraseña.addEventListener('input', (event) => {
    const textValue = event.currentTarget.value;

    if (textValue.length < caracter_minimo || textValue.length > caracter_maximo){
        result_contraseña.innerHTML = `Entre 6 y 20 caracteres`;
    } else {
        result_contraseña.innerHTML = '';
    }
});

contraseña.addEventListener('keydown', (event) => {
    if (event.key === ' ') {
        event.preventDefault();  // Evitar que se escriba el espacio
    }
});

const correo = document.getElementById('correo');

correo.addEventListener('keydown', (event) => {
    if (event.key === ' ') {
        event.preventDefault();  // Evitar que se escriba el espacio
    }
});