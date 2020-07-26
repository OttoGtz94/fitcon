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

$clientes = ControladorFormularios::ctrSeleccionarClientes(null, null);

 ?>
<head>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<section class="clientes">
    <div class="contenido">
        <h2 class="lang" key="tituloClientes" id="titulo-contenido">Clientes</h2>
        <div class="tabla">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="lang" key="tablaRS"  scope="col">Razon Social</th>
                            <th scope="col">RFC</th>
                            <th scope="col">C.P.</th>
                            <th class="lang" key="tablaTelefono" scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th class="lang" key="tablaEstatus" scope="col">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $key => $value): ?>
                            
                            <tr>
                                <td><a href="index.php?pagina=cliente&id_cliente=<?php echo $value['id_cliente'];?>"><?php echo $value["razon_social"]; ?></a></td>
                                <td><?php echo $value["rfc"]; ?></td>
                                <td><?php echo $value["cp"]; ?></td>
                                <td><?php echo $value["telefono"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                                <td><?php 
                                    if ($value["estatus"] == true) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                 ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contenedor-boton">
            <a class="lang boton btn btn-primary" id="ocultarCA" key="botonNuevoCliente" href="index.php?pagina=nuevo_cliente">Nuevo cliente</a>
            
        </div>
    </div>
</section>