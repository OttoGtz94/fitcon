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


<section class="movimientos">
    <div class="contenido">
        <h2 id="titulo-contenido">Movimientos de <span>1574974620147682</span></h2>
        <div class="tabla">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Motivo</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Tipo de pago</th>
                            <th scope="col">Tipo de movimiento</th>
                            <th scope="col">Fecha</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pago Nomina</td>
                            <td>$25555.00</td>
                            <td>Transferencia</td>
                            <td>Egreso</td>
                            <td>2 de Julio del 2020</td>
                        </tr>
                        <tr>
                            <td>Pago Nomina</td>
                            <td>$25555.00</td>
                            <td>Transferencia</td>
                            <td>Egreso</td>
                            <td>2 de Julio del 2020</td>
                        </tr>
                        <tr>
                            <td>Pago Nomina</td>
                            <td>$25555.00</td>
                            <td>Transferencia</td>
                            <td>Egreso</td>
                            <td>2 de Julio del 2020</td>
                        </tr>
                        <tr>
                            <td>Pago Nomina</td>
                            <td>$25555.00</td>
                            <td>Transferencia</td>
                            <td>Egreso</td>
                            <td>2 de Julio del 2020</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>