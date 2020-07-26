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
$clientes = ControladorFormularios::ctrSeleccionarClientes(null, null);
?>
<head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>



<h2 class="lang" id="titulo-contenido" key="tituloInformes">Informes</h2>
<div class="graficas">
    <div class="grafica grafica-saldos">
        <h3 class="lead lang" key="graficaSaldos">Saldos</h3>
        <canvas id="myChart"></canvas>
        <script>
            var miCanvas = document.querySelector('#myChart').getContext('2d');
            var myChart = new Chart(miCanvas,{
                type:"bar",
                data:{
                    labels:[<?php foreach ($cuentas as $key => $value): ?>

                            '<?php echo $value["id_cliente"]; ?>',


                        <?php endforeach ?>],
                    datasets:[{
                        label:'',
                        data:[<?php foreach ($cuentas as $key => $value): ?>
                            '<?php echo $value["saldo"]; ?>',
                        <?php endforeach ?>],
                        backgroundColor: [
                            'rgb(17,17,154)', 
                            'rgb(67,154,17)', 
                            'rgb(139,17,154)', 
                            'rgb(154,17,67)',
                            'rgb(192,209,32)',
                            'rgb(85,181,189)',
                            'rgb(64,229,24)',
                            'rgb(145,108,167)',
                            'rgb(238,217,10)',
                            'rgb(140,245,106)',
                            'rgb(175,225,227)'

                        ]
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
    <div class="grafica grafica-ingresos">
        <h3 class="lead lang" key="graficaIngresos">Ingresos</h3>
         <canvas id="graficaIngresos"></canvas>

        <script>
            var randomColor = function(){ return Math.round(Math.random()*10)};
            var miCanvas = document.querySelector('#graficaIngresos').getContext('2d');
            var myChart = new Chart(miCanvas,{
                type:"bar",
                data:{
                    labels:[<?php foreach ($cuentas as $key => $value): ?>

                            '<?php echo $value["id_cliente"]; ?>',


                        <?php endforeach ?>],
                    datasets:[{
                        label:'datos',
                        data:[<?php foreach ($cuentas as $key => $value): ?>
                            '<?php echo $value["ingresos"]; ?>',
                        <?php endforeach ?>],
                        backgroundColor: [
                             'rgb(17,17,154)', 
                            'rgb(67,154,17)', 
                            'rgb(139,17,154)', 
                            'rgb(154,17,67)',
                            'rgb(192,209,32)',
                            'rgb(85,181,189)',
                            'rgb(64,229,24)',
                            'rgb(145,108,167)',
                            'rgb(238,217,10)',
                            'rgb(140,245,106)',
                            'rgb(175,225,227)'
                        ]
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
    <div class="grafica grafica-egresos">
        <h3 class="lead lang" key="graficaEgresos">Egresos</h3>
        <canvas id="graficaEgresos"></canvas>

        <script>
            var randomColor = function(){ return Math.round(Math.random()*10)};
            var miCanvas = document.querySelector('#graficaEgresos').getContext('2d');
            var myChart = new Chart(miCanvas,{
                type:"bar",
                data:{
                    labels:[<?php foreach ($cuentas as $key => $value): ?>

                            '<?php echo $value["id_cliente"]; ?>',


                        <?php endforeach ?>],
                    datasets:[{
                        label:'datos',
                        data:[<?php foreach ($cuentas as $key => $value): ?>
                            '<?php echo $value["egresos"]; ?>',
                        <?php endforeach ?>],
                        backgroundColor: [
                             'rgb(17,17,154)', 
                            'rgb(67,154,17)', 
                            'rgb(139,17,154)', 
                            'rgb(154,17,67)',
                            'rgb(192,209,32)',
                            'rgb(85,181,189)',
                            'rgb(64,229,24)',
                            'rgb(145,108,167)',
                            'rgb(238,217,10)',
                            'rgb(140,245,106)',
                            'rgb(175,225,227)'
                        ]
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </div>
    <div class="tabla">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="lang" key="tituloClientes">Cliente</th>
                            <th class="lafng" key="tablaRS"  scope="col">ID</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $key => $value): ?>
                            
                            <tr>
                                <td><a href="index.php?pagina=cliente&id_cliente=<?php echo $value['id_cliente'];?>"><?php echo $value["razon_social"]; ?></a></td>
                                <td><?php echo $value["id_cliente"]; ?></td>
                                
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="botoneraInformes">
        <button type="button" class="boton btn btn-primary lang" id="botonMostrarGraficaSaldos" key="graficaSaldos">Grafica Saldos</button>
        <button type="button" class="boton btn btn-primary lang" id="botonMostrarGraficaIngresos" key="graficaIngresos">Grafica Ingresos</button>
        <button type="button" class="boton btn btn-primary lang" id="botonMostrarGraficaEgresos" key="graficaEgresos">Grafica Egresos</button>
    </div>
</div>