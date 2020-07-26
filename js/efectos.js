window.addEventListener('load', function(){
	console.log("Pagina cargada");
	animacionLogin();
	animacionGeneral();
	mostrarBotonera();
	habilitarInputs();
	valorSelect();
	crearNombreUsuario();
	habilitarCuentas();
	sumarSaldo();
	rangos();
	cambiarGrafica();
	cambiarTema();
});


function animacionLogin() {
	// alert("Funcion de animacion cargada");
	let izquierdo = document.querySelector('#izquierdo');
	let leyenda = document.querySelector('.leyenda');
	let imagen = document.querySelector('#imagen');
	let logo = document.querySelector('#logo');
	let formulario = document.querySelector('#formulario');
	if (!izquierdo || !leyenda || !imagen 
		|| !logo || !formulario) {
		console.log();
	} else {

		izquierdo.style.animation = 'arrastrarAIzquierda 1s ease-out';
		imagen.style.animation = 'zoom 1s ease-out';
		leyenda.style.animation = 'arrastrarADerecha 1s ease-out';
		logo.style.animation = 'zoom 1s ease-out';
		formulario.style.animation = 'desvanecer 1.5s ease-out';
	}

}

function animacionGeneral() {
	let barra = document.querySelector('#barra');
	let logo = document.querySelector('#logo-barra');
	let titulo = document.querySelector('#titulo-contenido');
	let contenido = document.querySelector('.contenido');
	let perfil = document.querySelector('.contenedor-perfil');

	if (!barra) {
		console.log();
	}else {
		// logo.style.animation = 'desvanecer 0.5s ease-out';
		// barra.style.animation = 'arrastrarADerecha 1s ease-out';
		titulo.style.animation = 'zoom 1s ease-out';
		contenido.style.animation = 'arrastrarAIzquierda 1s ease-out';
		// perfil.style.animation = 'arrastrarADerecha 1s ease-out';
	}

}

function mostrarBotonera() {
	
	let idioma = document.querySelector('#idioma-botonera');
	let botonera_idioma = document.querySelector('.botonera-idioma');
	let tema = document.querySelector('#tema-botonera');
	let botonera_tema = document.querySelector('.botonera-tema');

	if (!idioma || !botonera_idioma || !tema || !botonera_tema) {
		console.log();
	} else {

		idioma.addEventListener('mouseover', function(){
		
			botonera_idioma.style.display = 'block';

		});

		idioma.addEventListener('mouseout', function(){
			botonera_idioma.style.display = 'none';
		});

		tema.addEventListener('mouseover', function(){
		
			botonera_tema.style.display = 'block';

		});

		tema.addEventListener('mouseout', function(){
			botonera_tema.style.display = 'none';
		});
	}

}

function habilitarInputs() {
	let input = document.querySelectorAll('.input');
	let boton = document.querySelector('.botonEditar');
	let botonCancelar = document.querySelector('.botonCancelar');
	let botonAgregar = document.querySelector('.botonAgregarCuenta');
	let botonGuardar = document.querySelector('.botonGuardar');
	if (!input || !boton || !botonCancelar || !botonGuardar) {
		console.log();
	} else {
		
		boton.addEventListener('click', function(){
			console.log("Boton editar presionado");
			for (var i = 0; i < input.length; i++) {
				input[i].disabled = false;
			}
			boton.style.display = 'none';
			botonCancelar.style.display = 'block';
			if (!botonAgregar) {
				console.log("botonAgregar false");
			}else {
				botonAgregar.style.display = 'none';

			}
			botonGuardar.style.display = 'block';

		});
		botonCancelar.addEventListener('click', function(){
			console.log("Boton editar presionado");
			for (var i = 0; i < input.length; i++) {
				input[i].disabled = true;
			}
			boton.style.display = 'block';
			botonCancelar.style.display = 'none';
			if (!botonAgregar) {
				console.log();
			} else {

				botonAgregar.style.display = 'block';
			}
			botonGuardar.style.display = 'none';


		});
	}

}

function mayusActivado(e) {
	e.value = e.value.toUpperCase();
}

function valorSelect() {
	let botonPrueba = document.querySelector('#pruebaselect');
	let codigoBanco = document.querySelector('#codigoBanco');
	let codigoPlaza = document.querySelector('#codigoPlaza');
	let cajaClabe = document.querySelector('.clabe');
	
	
	if (!codigoBanco) {
		console.log();
	}else {
		
		codigoBanco.addEventListener('change', function(){
			let valorBanco = codigoBanco.value;
			codigoPlaza.addEventListener('change', function(){
				let valorPlaza = codigoPlaza.value;
				cajaClabe.value = valorBanco+valorPlaza;
				console.log(valorBanco+valorPlaza);
			});
			//cajaCuenta.value = valorBanco;
			//console.log(valorBanco);
		});
		
	}

	
}

function crearNombreUsuario() {
	let nombreUsuario = document.querySelector('.nick_name');
	let nombre = document.querySelector('.cajaNombre');
	let apellido = document.querySelector('.cajaApellido');
	let correo = document.querySelector('.cajaCorreo');
	let boton = document.querySelector('.btnAgregarUsuario');

	if (!nombreUsuario) {
		console.log();
	} else {
		
		nombre.addEventListener('keyup', function(){
			let valorNombre = nombre.value;
			apellido.addEventListener('keyup', function(){
				let valorApellido = apellido.value;
				let aleatorio = Math.random() * 100 + 10;
				nombreUsuario.value = valorNombre.substr(0,1).toLowerCase() + valorApellido.toLowerCase() 
									+ "_" + Math.floor(aleatorio);
				correo.value = nombreUsuario.value + "@" + "fitcon.com";
			});
		});
		boton.addEventListener('click', function(){
			nombreUsuario.disabled = false;
			correo.disabled = false;
		});
	}

}

function habilitarCuentas() {
	let cajaGanancias = document.querySelector('.cajaGanancias');
	let cajaBanco = document.querySelector('.cajaBanco');
	let cajaZona = document.querySelector('.cajaZona');
	let cajaSaldo = document.querySelector('.cajaSaldo');
	let botonGuardar= document.querySelector('.botonGuardar');
	let botonCancelar = document.querySelector('.botonCancelar');
	if (!cajaGanancias) {
		console.log();
	} else {
		botonGuardar.addEventListener('click', function(){
			cajaGanancias.disabled = false;
			cajaZona.disabled = false;
			cajaGanancias.disabled = false;
			cajaBanco.disabled = false;
			cajaSaldo.disabled = false;
		});
	}
}

function sumarSaldo(){
	let cajaSaldo = document.querySelector('#cajaSaldo');
	let cajaIngreso = document.querySelector('#cajaIngreso');
	let cajaEgreso = document.querySelector('#cajaEgreso');
	let btnGuardar = document.querySelector('.botonGuardar');
	console.log();

	if (!cajaSaldo) {
		console.log();
	} else {
		btnGuardar.addEventListener('click', function() {

			let valorIngreso = cajaIngreso.value;
			let valorEgreso = cajaEgreso.value;
			let valorSaldo = cajaSaldo.value;

			let ganancia = Number(valorIngreso) - Number(valorEgreso);
			let nuevoSaldo = Number(valorSaldo) + ganancia;
			cajaSaldo.value = nuevoSaldo.toString();
		});
	}
}

function rangos(){
	var ocultaCA = document.querySelectorAll('#ocultarCA');
	var puesto = document.querySelector('#valorPuesto').innerHTML;
	
	if (!ocultaCA) {
		console.log();
	} else {
		if (puesto == "Contador Auxiliar") {
			for (var i = 0; i < ocultaCA.length; i++) {
				ocultaCA[i].style.display = 'none';
			}
		}
	}
}

function cambiarGrafica(){
	let graficaSaldo = document.querySelector('.grafica-saldos');
	let graficaIngresos = document.querySelector('.grafica-ingresos');
	let graficaEgresos = document.querySelector('.grafica-egresos');
	let btnSaldos = document.querySelector('#botonMostrarGraficaSaldos');
	let btnIngresos = document.querySelector('#botonMostrarGraficaIngresos');
	let btnEgresos = document.querySelector('#botonMostrarGraficaEgresos');
	if (!graficaSaldo) {
		console.log();
	} else {

		btnIngresos.addEventListener('click', function(){
			graficaEgresos.style.display = 'none';
			graficaSaldo.style.display = 'none';
			graficaIngresos.style.display = 'block';
			btnIngresos.style.display = 'none';
			btnSaldos.style.display = 'inline-block';
			btnEgresos.style.display = 'inline-block';
		});

		btnEgresos.addEventListener('click', function(){
			graficaEgresos.style.display = 'block';
			graficaSaldo.style.display = 'none';
			graficaIngresos.style.display = 'none';
			btnIngresos.style.display = 'inline-block';
			btnSaldos.style.display = 'inline-block';
			btnEgresos.style.display = 'none';
		});

		btnSaldos.addEventListener('click', function(){
			graficaEgresos.style.display = 'none';
			graficaSaldo.style.display = 'block';
			graficaIngresos.style.display = 'none';
			btnIngresos.style.display = 'inline-block';
			btnSaldos.style.display = 'none';
			btnEgresos.style.display = 'inline-block';
		});
	}

}
function cambiarTema() {
	body = document.querySelector('#body');
	dark = document.querySelector('#dark');
	light = document.querySelector('#light');
	//Obtener el local storage
	if (localStorage.getItem('tema-oscuro') == 'true') {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
	dark.addEventListener('click', function() {
		console.log("Dark Activado");
		document.body.classList.toggle('dark');

		//guardar Local Storage
		if (document.body.classList.contains('dark')) {
			localStorage.setItem('tema-oscuro', 'true');
		}else {
			localStorage.setItem('tema-oscuro', 'false');
		}
	});

	light.addEventListener('click', function() {
		console.log("Light activado");
		document.body.classList.remove('dark');

		//guardar Local Storage
		if (document.body.classList.contains('dark')) {
			localStorage.setItem('tema-oscuro', 'true');
		}else {
			localStorage.setItem('tema-oscuro', 'false');
		}
	});

}
