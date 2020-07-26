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

<section class="cliente">
    <div class="contenido">
        <h2 class="lang" key="tituloNuevoUsuario"  id="titulo-contenido">Nuevo usuario</h2>
        <div class="contenido-cliente">
            <form method="post">
                <div class="form-row">
                    <input type="hidden" class="form-control estatus" name="registroEstatus" value="1">
                    <div class="form-group col-md-4">
                        <label class="lang" key="nombre">Nombre</label>
                        <input type="text" class="form-control cajaNombre" name="registroNombre">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="apellido">Apellido</label>
                        <input type="text" class="form-control cajaApellido" name="registroApellido">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="nombreUsuario">Nombre de usuario</label>
                        <input type="text" class="form-control nick_name" name="registroUserName" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="lang" key="direccion">Direccion</label>
                        <input type="text" class="form-control" name="registroDireccion">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaTelefono">Telefono</label>
                        <input type="text" class="form-control" name="registroTelefono" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control cajaCorreo" name="registroEmail" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="puesto">Puesto</label>
                        <select class="form-control" name="registroPuesto">
                            <option value="ca" class="lang" key="contadorAuxiliar">Contador Auxiliar</option>
                            <option value="c" class="lang" key="contador">Contador</option>
                            <option value="p" class="lang" key="presidente">Presidente</option>
                        </select>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label class="lang" key="password">Contraseña</label>
                        <input type="password" class="form-control" name="registroPassword">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="lang" key="confirmarPassword">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="confirmaPassword">
                    </div>

                </div>
                <?php 
                $registro = ControladorFormularios::ctrRegistroUsuario();

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
                    <button type="submit" class="lang btnAgregarUsuario boton btn btn-primary" key="agregarUsuario">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</section>