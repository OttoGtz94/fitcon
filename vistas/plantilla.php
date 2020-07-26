<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitcon | Login</title>


    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/traductor.js"></script>
    <script type="text/javascript" src="js/efectos.js"></script>
</head>

<body id="body" >

    <!-- Contenido -->
    <?php 
    session_start();
    if (isset($_SESSION["validarIngreso"]) == true) {
        include "plantilla.contenido.php";
    }else {
        include "paginas/ingreso.php";
    }
  

     ?>


</body>

</html>