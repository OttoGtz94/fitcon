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

if (isset($_GET["id_cliente"])) {
    $item = "id_cliente";
    $valor = $_GET["id_cliente"];
    $cliente = ControladorFormularios::ctrSeleccionarClientes($item, $valor);
} 


 ?>

<head>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<section class="cliente">
    <div class="contenido">
        <h2 class="display-4" id="titulo-contenido"><?php echo $cliente["razon_social"]; ?></h2>
        <div class="contenido-cliente">
            <form method="post">
                <div class="form-group">
                    <input type="hidden" name="idCliente" class="input" value="<?php echo $cliente['id_cliente'] ?>" disabled>
                    <label class="lang" key="tablaRS" for="inputAddress">Razon Social</label>
                    <input type="text" class="form-control input" value="<?php echo $cliente["razon_social"]; ?>" name="actualizaRS" disabled>
                </div>
                <div class="form-group">
                    <label class="lang" key="direccion" for="inputAddress">Dirección</label>
                    <input type="text" class="form-control input" value="<?php echo $cliente["direccion"]; ?>" name="actualizaDireccion" disabled>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control input" value="<?php echo $cliente["email"]; ?>" name="actualizaEmail" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaTelefono" for="inputPassword4">Telefono</label>
                        <input type="text" class="form-control input" value="<?php echo $cliente["telefono"]; ?>" name="actualizaTelefono" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">RFC</label>
                        <input type="text" class="form-control input" value="<?php echo $cliente["rfc"]; ?>" name="actualizaRFC" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputZip">C.P.</label>
                        <input type="text" class="input form-control" value="<?php echo $cliente["cp"]; ?>" name="actualizaCP" disabled>
                    </div>

                    <div class="form-group col-md-2">
                        <label class="lang" key="tablaEstatus" for="inputZip">Estatus</label>
                        <input type="text" class="input form-control" value="<?php if($cliente["estatus"] == true){ echo "Activo"; }else{ echo "Inactivo"; } ?>" name="actualizaEstatus" disabled onkeyup="mayusActivado(this);">
                    </div>
                </div>
                <?php 

                $actualizar = new ControladorFormularios();
                $actualizar -> ctrActualizarCliente();

                 ?>
                <div class="botones">
                    <button type="submit" class="lang botonGuardar boton btn btn-primary" key="botonGuardar">Guardar</button>
                    
                    <a class="lang botonAgregarCuenta boton btn btn-primary" key="botonAgregarCuenta" href="index.php?pagina=nueva_cuenta&id_cliente=<?php echo $cliente['id_cliente'];?>" id="ocultarCA">Agregar cuenta</a>
                     <a class="lang botonAgregarCuenta boton btn btn-primary" key="verCuentas" href="index.php?pagina=cuentas_cliente&id_cliente=<?php echo $cliente['id_cliente'];?>">Ver cuentas</a>
                    <button type="button" class="lang botonEditar boton btn btn-primary" key="botonEditarCliente" id="ocultarCA">Editar cliente</button>
                    <button type="button" class="lang botonCancelar boton btn btn-primary" key="botonCancelar">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</section>