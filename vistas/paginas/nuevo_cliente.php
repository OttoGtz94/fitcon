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


$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
$user = $_SESSION["validarIngreso"];
 ?>



<head>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

     
</head>

<section class="cliente">
    <div class="contenido">
        <h2 class="lang" key="tituloAgregarCliente" id="titulo-contenido">Agregar cliente</h2>
        <div class="contenido-cliente">
            <form method="post" class="formulario">

                <input class="oculto" type="text" name="registroIDUsuario"  value="<?php echo $user[2]; ?>">
                <div class="form-group">
                    <label class="lang" key="taablaRS">Razon Social</label>
                    <input type="text" class="form-control rs" name="registroRS">
                </div>
                <div class="form-group">
                    <label class="lang" key="direccion">Dirección</label>
                    <input type="text" class="form-control direccion" name="registroDireccion">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control email" name="registroEmail">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaTelefono">Telefono</label>
                        <input type="text" class="form-control tel" name="registroTelefono" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="form-group col-md-4">
                        <label>RFC</label>
                        <input type="text" class="form-control rfc" name="registroRFC" onkeyup="mayusActivado(this);">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputZip">C.P.</label>
                        <input type="text" class="form-control cp" name="registroCP" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>

                    <div class="form-group col-md-2">
                        <input type="hidden" class="form-control estatus" name="registroEstatus" value="1">
                    </div>
                </div>

                <?php 
                $registro = ControladorFormularios::ctrRegistro();

                if ($registro== "registrado") {
                    echo "<script>
                        if(window.history.replaceState){
                            
                            window.history.replaceState( null, null, window.location.href);
                        }
                        
                    </script>";
                    echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                }

                 ?>
                <div class="botones">
                    <button type="submit" class="lang boton btn btn-primary" id="btn-add-cliente" key="botonAgregarCliente">Agregar cliente</button>
                </div>
            </form>
        </div>
    </div>
</section>