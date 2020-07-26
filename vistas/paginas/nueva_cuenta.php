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
    $cliente = ControladorFormularios::ctrSeleccionarClientes($item, $valor);
} 
 ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<section class="cuenta">
    <div class="contenido">
        <h2 id="titulo-contenido" class="lang" key="tituloNuevaCuenta">Nueva cuenta</h2>
        <div class="contenido-cliente">
            <form method="post">
                <input type="hidden" name="registroId_Cliente" class="input" value="<?php echo $cliente['id_cliente'] ?>" >
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="lang" key="clabe">Clabe</label>
                        <input type="text" class="form-control clabe" name="registroCuenta" onkeypress='return event.charCode >= 48 && event.charCode <= 57' disabled>
                    </div>
                    <div class="form-group col-md-10">
                        <label class="lang" key="tablaNCuenta">Numero de cuenta</label>
                        <input type="text" class="form-control inputCuenta" name="registroCuenta" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="hidden" class="form-control" name="registroIngresos" value="0">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="hidden" class="form-control" name="registroEgresos" value="0">
                    </div>
                    <div class="form-group col-md-4">
                        <!-- <label class="lang" key="tablaGanancias">Ganancias</label> -->
                        <!-- <input type="text" class="form-control" name="registroGanancias"> -->
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaSaldo" >Saldo</label>
                        <input type="text" class="form-control" name="registroSaldo">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="tablaBanco" >Banco</label>
                        <!-- <input type="text" class="form-control" name="registroBanco"> -->
                        <select class="input form-control" name="registroBanco" id="codigoBanco" >
                            <option value="0" class="lang" key="seleccionaBanco">Selecciona Banco</option>
                            <option value="002">BANAMEX</option>
                            <option value="012">BBVA BANCOMER</option>
                            <option value="014">SANTANDER</option>
                            <option value="021">HSBC</option>
                            <option value="036">INBURSA</option>
                            <option value="044">SCOTIABANK</option>
                            <option value="072">BANORTE</option>
                            <option value="127">AZTECA</option>
                            <option value="137">BANCOPPEL</option>
                            <option value="143">CIBanco</option>
                            <option value="019">BANJERCITO</option>
                            <option value="058">BANREGIO</option>
                            <option value="062">AFIRME</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="lang" key="plaza">Plaza</label>
                        <select class="input form-control" name="registroPlaza" id="codigoPlaza">
                            <option value="0" class="lang" key="seleccionaCiudad">Selecciona Ciudad</option>
                            <option value="180">CDMX</option>
                            <option value="580">Monterrey</option>
                            <option value="320">Guadalajara</option>
                            <option value="680">Querétaro</option>
                            <option value="420">Toluca</option>
                            <option value="027">Tijuana</option>
                            <option value="470">Morelia</option>
                            <option value="210">Guanajuato</option>
                            <option value="261">Acapulco</option>
                            <option value="691">Cancún</option>
                           
                        </select>
                        <input type="hidden" class="form-control" name="registroEstatus" value="ac">
                    </div>
                </div>
                
                <?php 
                 $registro = ControladorFormularios::ctrRegistroCuenta();

                if ($registro == "registrado") {
                    echo "<script>
                        if(window.history.replaceState){
                            
                            window.history.replaceState( null, null, window.location.href);
                        }
                        
                    </script>";
                    echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                }



                 ?>
                <div class="botones">
                    <button type="submit" class="lang boton btn btn-primary" key="botonGuardar">Guardar</button>
               
                    
                </div>
            </form>
        </div>
    </div>
</section>