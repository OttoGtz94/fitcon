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
    $cuenta = ControladorFormularios::ctrSeleccionarCuentas($item, $valor);
    $cliente = ControladorFormularios::ctrSeleccionarClientes($item, $valor);
} 

 $cuentas = ControladorFormularios::ctrSeleccionarCuentas(null, null);

 ?>
 <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<section class="cuentas">
    <div class="contenido">
        <h2 id="titulo-contenido"><?php echo" ".$cliente['razon_social'] ?></h2>
        <input type="hidden" name="registroId_Cliente" class="input" value="<?php echo $cuenta['id_cliente'] ?>" >
        
        <div class="tabla">
            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th class="lang" key="tablaNCuenta" scope="col">N° Cuenta</th>
                            <th class="lang" key="tablaIngresos" scope="col">Ingresos</th>
                            <th class="lang" key="tablaEgresos" scope="col">Egresos</th>
                            <th class="lang" key="tablaGanancias" scope="col">Ganancias</th>
                            <th class="lang" key="tablaSaldo" scope="col">Saldo</th>
                            <th class="lang" key="tablaBanco" scope="col">Banco</th>
                            <th class="lang" key="tablaEstatus" scope="col">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cuentas as $key => $value): ?>
                            <?php if ($value["id_cliente"] == $cuenta["id_cliente"]): ?>

                                <tr>
                                    <td><a href="index.php?pagina=cuenta&id_cuenta=<?php echo $value['id_cuenta']; ?>&id_cliente=<?php echo $cliente['razon_social']?>"><?php echo $value["numero_cuenta"]; ?></a></td>
                                    <td>$<?php echo $value["ingresos"]; ?></td>
                                    <td>$<?php echo $value["egresos"]; ?></td>
                                    <td>$<?php $ganancias = $value["ingresos"] - $value["egresos"]; echo "$ganancias"; ?></td>
                                    <td>$<?php echo $value["saldo"]; ?></td>
                                    <td><?php echo $value["banco"]; ?></td>
                                    <td><?php if ($value["estatus"] == true) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                    ?></td> 
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
        
    </section>