<?php 
// session_destroy();
// session_start();
// if (isset($_GET["ingresaUsuario"])) {
//     $item = "ingresaUsuario";
//     $valor = $_GET["ingresaUsuario"];
//    // $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
// } 


require_once "plantilla.php";
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
$user = $_SESSION["validarIngreso"];

 ?>


<div class="contenido-general">
        
        <!-- <nav id="barra">
            <div class="contenedor-logo">
                <img src="img/logo_white.png" id="logo-barra">
            </div>
            <div class="contenedor-nav">
                
                <a class="lang" href="index.php?pagina=informes" key="navInformes"><i class="fas fa-chart-line"></i>Informes</a>
                <a class="lang" href="index.php?pagina=clientes" key="navClientes"><i class="fas fa-building"></i>Clientes</a>
                <a class="lang" href="index.php?pagina=cuentas" key="navCuentas"><i class="fas fa-book"></i>Cuentas</a>
                <a class="lang" href="index.php?pagina=configuracion" key="navConfiguracion"><i class="fas fa-cog"></i>Configuracion</a>
                <a href="index.php?pagina=salir" class="salir lang" key="navSalir"><i class="fas fa-sign-out-alt"></i>Salir</a>
            </div>
        </nav> -->
        <nav id="barra">
            <div class="contenedor-logo">
                <img src="img/logo_white.png" id="logo-barra">
            </div>
            <div class="contenedor-nav">
                
                <a href="index.php?pagina=informes" ><i class="fas fa-chart-line"></i><span class="lang" key="navInformes">Informes</span></a>
                <a href="index.php?pagina=clientes"><i class="fas fa-building"></i><span class="lang" key="navClientes">Clientes</span></a>
                <a href="index.php?pagina=cuentas"><i class="fas fa-book"></i><span class="lang" key="navCuentas">Cuentas</span></a>
                <a href="index.php?pagina=configuracion"><i class="fas fa-cog"></i><span class="lang" key="navConfiguracion">Configuracion</span></a>
                <a href="index.php?pagina=salir" class="salir" ><i class="fas fa-sign-out-alt"></i><span class="lang" key="navSalir">Salir</span></a>
            </div>
        </nav>
        <section class="informes">
            <?php foreach ($usuarios as $key => $value): ?>
                
            <?php endforeach ?>
            <div class="contenedor-perfil">
                <h4><?php echo $user[0]." ".$user[1]; ?></h4>
                <h5 id="valorPuesto"><?php echo $user[3]; ?></h5>
            </div>


            <div class="contenido">
               
               <?php 
                if (isset($_GET["pagina"])) {
                    if ($_GET["pagina"] == "informes" ||
                        $_GET["pagina"] == "clientes" ||
                        $_GET["pagina"] == "cuentas" ||
                        $_GET["pagina"] == "configuracion" ||
                        $_GET["pagina"] == "salir" ||
                        $_GET["pagina"] == "nuevo_cliente" ||
                        $_GET["pagina"] == "nuevo_usuario" ||
                        $_GET["pagina"] == "nueva_cuenta" ||
                        $_GET["pagina"] == "cliente" ||
                        $_GET["pagina"] == "cuenta" ||
                        $_GET["pagina"] == "movimientos" ||
                        $_GET["pagina"] == "usuario" ||
                        $_GET["pagina"] == "usuarios" ||
                        $_GET["pagina"] == "cuentas_cliente"){

                            include "paginas/".$_GET["pagina"].".php";
                    }else {
                        include "paginas/error404.php";
                    }
                }else {

                    include "paginas/informes.php";
                }
               


                ?>
                
            </div>
        </section>
    </div>