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

if (isset($_GET["id_usuario"])) {
    $item = "id_usuario";
    $valor = $_GET["id_usuario"];
    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
} 


 ?>
<head>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<section class="cliente">
    <div class="contenido">
        <h2 id="titulo-contenido"><?php echo $usuario["user_name"]; ?></h2>
        <div class="contenido-cliente">
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="idUsuario" class="input" value="<?php echo $usuario['id_usuario'] ?>" disabled>
                        <input type="hidden" name="actualizaUserName" class="input" value="<?php echo $usuario['user_name'] ?>" disabled>
                        <label>Nombre</label>
                        <input type="text" class="form-control input" value="<?php echo $usuario['nombre']; ?>" disabled name="actualizaNombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Apellido</label>
                        <input type="text" class="form-control input" value="<?php echo $usuario['apellido']; ?>" disabled name="actualizaApellido">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Direccion</label>
                        <input type="text" class="form-control input" value="<?php echo $usuario['direccion']; ?>" disabled name="actualizaDireccion">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Telefono</label>
                        <input type="text" class="form-control input" value="<?php echo $usuario['telefono']; ?>" disabled name="actualizaTelefono">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control input" value="<?php echo $usuario['email']; ?>" disabled name="actualizaEmail">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Puesto</label>
                        <select class="input form-control" name="actualizaPuesto" disabled>
                            <option value="ca" class="lang" key="contadorAuxiliar">Contador Auxiliar</option>
                            <option value="c" class="lang" key="contador">Contador</option>
                            <option value="p" class="lang" key="presidente">Presidente</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Estatus</label>
                        <select class="input form-control" name="actualizaEstatus" disabled>
                            <option value="ac" class="lang" key="contadorAuxiljiar">Activo</option>
                            <option value="in" class="lang" key="contjador">Inactivo</option>
                           
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Contraseña</label>
                        <input type="password" class="form-control input" value="<?php echo $usuario['password']; ?>" disabled name="actualizaPassword">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Contraseña</label>
                        <input type="password" class="form-control input" value="<?php echo $usuario['password']; ?>" disabled name="confirmaPassword">
                    </div>
                    

                </div>
                <?php 

                $actualizar = new ControladorFormularios();
                $actualizar -> ctrActualizaUsuario();

                 ?>
                <div class="botones">
                    <button type="submit" class="lang boton btn btn-primary botonGuardar">Guardar</button>
                    <button type="button" class="lang boton btn btn-primary botonEditar" key="botonEditarUsuario">Editar usuario</button>
                    <button type="button" class="lang boton btn btn-primary botonCancelar" >Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</section>