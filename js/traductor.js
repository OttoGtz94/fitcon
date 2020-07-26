$(document).ready(function() {
	// alert("jQueryCargado");
	//console.log("jQuery Cargado");
	abrirIdiomas();
	traductor();
});

function abrirIdiomas() {
	let cambiar_idioma = $('#cambiar-idioma');
	let vista_idioma = $('.w-idioma');
	let close_idioma = $('#close-idiomas');

	cambiar_idioma.click(function() {
		vista_idioma.css('display', 'block');
		console.log("cambiar idioma pulsado");
	});

	close_idioma.click(function(){
		vista_idioma.css('display', 'none');
	});

}

function traductor(){
    //console.log("Traductor cargado");
    let cambiar_idioma = $('#cambiar-idioma');
	let vista_idioma = $('.w-idioma');
	let close_idioma = $('#close-idiomas');

	$.getJSON("js/languages.json", function(json) {
	    if (!localStorage.getItem("lang")) {
	        localStorage.setItem("lang", "es");
	    }
	    var lang = localStorage.getItem("lang");
	    var doc = json;
	    $('.lang').each(function(index, element) {
	        $(this).text(doc[lang][$(this).attr('key')]);
	    }); 

	    $('.translate').click(function() {
	        localStorage.setItem("lang", $(this).attr('id'));
	        var lang = $(this).attr('id');
	        var doc = json;
	        //$('.idioma').css('display', 'none');
	        vista_idioma.css('display', 'none');
	        $('.lang').each(function(index, element) {
	            $(this).text(doc[lang][$(this).attr('key')]);
	            //$(this).attr('placeholder', doc[lang][$(this).attr('key')]);
	            $(this).val(doc[lang][$(this).attr('key')]);
	        });

	    }); 
	});
}