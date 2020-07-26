<div class="w-idioma">
    <div class="contenedor-cerrar">
        <span id="close-idiomas"><i class="fas fa-times-circle"></i></span>
    </div>
    <div class="row contenedor-logo-idioma">
        <img src="img/logo_white.png">
    </div>
    <div class="row contenedor-idiomas">
        <h3>Selecciona un idioma</h3>
        <div class="idioma">
            <img src="img/bandera-usa.svg">
            <button class="translate" id="en">English</button>
        </div>
        <div class="idioma">
            <img src="img/bandera-mexico.svg">
            <button class="translate" id="es">Español</button>
        </div>
        <div class="idioma">
            <img src="img/bandera-francia.svg">
            <button class="translate" id="fr">Français</button>
        </div>
        <div class="idioma">
            <img src="img/bandera-brasil.svg">
            <button class="translate" id="pr">Português</button>
        </div>
    </div>
</div>

<section class="container login">

    <div class="col-6 izquierdo" id="izquierdo">
        <h2 class="titulo lang" key="titulo">Bienvenido</h2>
        <h3 class="leyenda lang" key="leyenda">Fitcon es la opción segura y confiable para las finanzas de tu empresa</h3>
        <div class="row contenedor-imagen">
            <img src="img/img-login.svg" id="imagen">
        </div>
    </div>
    <div class="col-6 contenedor-formulario">
        <div class="contenedor-logo">
            <img src="img/logo_white.png" id="logo">
            <div class="contenedor-idioma">

                <label id="cambiar-idioma"><i class="fas fa-language"></i></label>
            </div>
        </div>
        <form id="formulario" method="post">
            <h2 class="lang" id="texto" key="iniciarSesion">Iniciar Sesion</h2>
            <label class="lang" id="texto" key="nombreUsuario">Nombre usuario</label>
            <input type="text" name="ingresaUsuario">
            <label class="lang" id="texto" key="password">Password</label>
            <input type="password" name="ingresaPassword">
            <?php 

            $ingreso = new ControladorFormularios();
            $ingreso ->ctrIngreso();

            

             ?>
            <input class="lang" type="submit" name="" value="Iniciar Sesion" key="botonIniciarSesion">
            <a class="lang" href="vistas/paginas/recuperarPass.php" title="Comunicate a sistemas" id="texto olvidePass" key="olvidePassword" target="_blank">¿Qué pasa si olvide mi contraseña?</a>
        </form>
    </div>
</section>