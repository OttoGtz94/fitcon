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

if (isset($_GET["id_cuenta"])) {
    $item = "id_cuenta";
    $valor = $_GET["id_cuenta"];
    $cuenta = ControladorFormularios::ctrSeleccionarCuentas($item, $valor);
} 

if (isset($_GET["id_cliente"])) {
    $itemm = "id_cliente";
    $valorr = $_GET["id_cliente"];
    $cliente = ControladorFormularios::ctrSeleccionarClientes($item, $valor);
} 
 $cuentas = ControladorFormularios::ctrSeleccionarCuentas(null, null);

 ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<section class="cuenta">
    <div class="contenido">
        <h2 id="titulo-contenido"><?php echo $cuenta["numero_cuenta"] ?></h2>
        <div class="contenido-cliente">
            <form method="post">
                <div class="form-row">
                    <input type="hidden" name="idCuenta" class="input" value="<?php echo $cuenta['id_cuenta'] ?>" disabled>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaIngresos">Ingresos</label>
                        <input type="text" class="form-control input" id="cajaIngreso" value="<?php echo $cuenta['ingresos']?>" name="actualizaIngreso" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaEgresos">Egresos</label>
                        <input type="text" class="form-control input" id="cajaEgreso" value="<?php echo $cuenta['egresos']?>"  name="actualizaEgreso" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaGanancias">Ganancias</label>
                        <input type="text" class="form-control cajaGanancias" value="<?php $ingreso = $cuenta['ingresos']; 
                        $egreso = $cuenta['egresos']; echo $ingreso - $egreso; 
                        ?>" name="actualizaGanancias" disabled>
                        
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lang" key="tablaSaldo">Saldo</label>
                        <input type="text" class="form-control cajaSaldo" id="cajaSaldo" value="<?php 

                        echo $cuenta['saldo'];?>" name="actualizaSaldo" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lang" key="tablaBanco">Banco</label>
                        <input type="text" class="form-control cajaBanco" value="<?php echo $cuenta['banco']?>" name="actualizaBanco" disabled onkeypress='return event.charCode >= 48 && event.charCode <= 48'>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lang" key="tablaPlaza">Zona</label>
                        <input type="text" class="form-control cajaZona" value="<?php echo $cuenta['plaza']?>" name="actualizaPlaza" disabled onkeypress='return event.charCode >= 48 && event.charCode <= 48'>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lang" key="tablaEstatus">Estatus</label>
                        <select class="input form-control" name="actualizaEstatus" disabled>
                            <option value="ac" class="lang" key="contadorAuxiljiar">Activo</option>
                            <option value="in" class="lang" key="contjador">Inactivo</option>
                           
                        </select>
                    </div>
                </div>
                <?php 

                $actualizar = new ControladorFormularios();
                $actualizar -> ctrActualizaCuenta();

                 ?>

                <div class="botones">
                    <!-- <button type="button" class="lang botonMov boton btn btn-primary" key="botonMovimientos">Movimientos</button> -->
                   <button type="submit" class="lang botonGuardar boton btn btn-primary">Guardar</button>
                    <button type="button" class="lang botonEditar boton btn btn-primary" key="botonEditarUsuario" id="ocultarCA">Editar usuario</button>
                    <button type="button" class="lang botonCancelar boton btn btn-primary" >Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</section>