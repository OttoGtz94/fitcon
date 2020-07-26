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

$cuentas = ControladorFormularios::ctrSeleccionarCuentas(null, null);

 ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<section class="cuentas">
    <div class="contenido">
        <h2 class="lang" key="tituloCuentas" id="titulo-contenido">Cuentas</h2>
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
                            <th class="lang" key="tablaCliente" scope="col">Cliente</th>
                            <th class="lang" key="tablaEstatus" scope="col">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cuentas as $key => $value): ?>
                            
                            <tr>
                                <td><a href="index.php?pagina=cuenta&id_cuenta=<?php echo $value['id_cuenta']; ?>"><?php echo $value["numero_cuenta"]; ?></a></td>
                                <td>$<?php echo $value["ingresos"]; ?></td>
                                <td>$<?php echo $value["egresos"]; ?></td>
                                <td>$<?php $ganancias = $value["ingresos"] - $value["egresos"]; echo "$ganancias"; ?></td>
                                <td>$<?php echo $value["saldo"]; ?></td>
                                <td><?php echo $value["banco"]; ?></td>
                                <td><?php echo $value["id_cliente"]; ?></td>
                                <td><?php echo $value["estatus"]; ?></td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>