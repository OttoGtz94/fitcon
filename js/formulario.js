var formulario = document.querySelector('.formulario');
var razon_social = document.querySelector('.rs');
var direccion = document.querySelector('.direccion');
var correo = document.querySelector('.email');
var tel = document.querySelector('.tel');
var rfc = document.querySelector('.rfc');
var cp = document.querySelector('.cp');
var estatus = document.querySelector('.estatus');
var error = document.querySelector('.error');
var btn_add_cliente = document.querySelector('#btn-add-cliente');

function validarFormulario() {

}

// function validarRS(e) {
// 	if (razon_social.value == '' || 
// 		razon_social.value == null) {
// 		console.log("Razon social vacio");
// 		error.style.display = 'block';
// 		error.innerHTML += '<li>Completa razon social</li>'
// 	}else {
// 		error.style.display = 'none';
// 	}
// }

// function validarDireccion(e) {
// 	if (direccion.value == '' || 
// 		direccion.value == null) {
// 		console.log("Direccion vacio");
// 		error.style.display = 'block';
// 		error.innerHTML += '<li>Completa Dirección</li>'
// 	}else {
// 		error.style.display = 'none';
// 	}
// }

// function validarCorreo(e) {
// 	if (correo.value == '' || 
// 		correo.value == null) {
// 		console.log("Direccion vacio");
// 		error.style.display = 'block';
// 		error.innerHTML += '<li>Completa Correo</li>'
// 	}else {
// 		error.style.display = 'none';
// 	}
// }

// function validarFormulario(e) {
// 	console.log("Formulario");
// 	error.innerHTML = '';
// 	validarRS(e);
// }

//formulario.addEventListener('submit', validarFormulario);