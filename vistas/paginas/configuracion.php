<?php 

if (!isset($_SESSION["validarIngreso"])) {
    
    echo '<script> window.location = "index.php?pagina=ingreso"; </script>';

    return;
    
} else {

    if($_SESSION["validarIngreso"] != true){

        echo '<script> window.location = "index.php?pagina=ingreso"; </script>';

        return;

    }

   
}


 ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<section class="cliente configuracion">
    <div class="contenido">
        <h2 class="lang" key="tituloConfiguracion" id="titulo-contenido">Configuración</h2>
        <div class="contenido-cliente row">
            <form class="col-md-6">

                <div class="form-row">
                    <div class="form-group col-md-6" id="idioma-botonera">
                        <label><i class="fas fa-language"></i><span class="lang" key="cambiarIdioma">Idioma</span></label>
                        <div class="botonera-idioma">
                            
                            <button class="translate" id="en">English</button>
                            <button class="translate" id="es">Español</button>
                            <button class="translate" id="fr">Français</button>
                            <button class="translate" id="pr">Português</button>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" id="tema-botonera">
                        <label><i class="fas fa-adjust"></i><span class="lang" key="cambiarTema" >Tema</span></label>
                        <div class="botonera-tema">
                            <button type="button" id="light">Light</button>
                            <button type="button" id="dark">Dark</button>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <a class="lang boton btn btn-primary" key="editarUsuarios" href="index.php?pagina=usuarios" id="ocultarCA">Editar usuarios</a>    
                </div>
            </form>
            <div class="contenido-imagen col-md-6">
                <img src="img/configuracion.svg">
            </div>
        </div>
    </div>
</section>