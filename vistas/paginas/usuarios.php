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

 ?>

<head>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<section class="cuentas">
    <div class="contenido">
        <h2 id="titulo-contenido">Usuarios</h2>
        <div class="tabla">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nickname</th>
                            <th class="lang" key="nombre" scope="col">Nombre</th>
                            <th class="lang" key="apellido" scope="col">Apellido</th>
                            <th class="lang" key="tablaTelefono" scope="col">Telefono</th>
                            <th>Email</th>
                            <th class="lang" key="puesto" scope="col">Puesto</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $key => $value): ?>
                            
                            <tr>
                                <td><a href="index.php?pagina=usuario&id_usuario=<?php echo $value['id_usuario'];?>"><?php echo $value["user_name"]; ?></a></td>
                                <td><?php echo $value["nombre"] ?></td>
                                <td><?php echo $value["apellido"]; ?></td>
                                <td><?php echo $value["telefono"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                                <td><?php echo $value["puesto"]; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contenedor-boton">
            <!-- <button type="button">Nuevo usuario</button> -->
            <!-- <input type="submit" name="" value="Registrar"> -->
            <a class="boton btn btn-primary lang" href="index.php?pagina=nuevo_usuario" key="tituloNuevoUsuario">Nuevo usuario</a>
        </div>
    </div>
</section>