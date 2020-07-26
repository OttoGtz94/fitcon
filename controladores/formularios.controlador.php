<?php 


Class ControladorFormularios {

	static public function ctrSeleccionarRegistros($item, $valor) {
		$tabla = "usuario";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrSeleccionarClientes($item, $valor) {
		$tabla = "cliente";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;

	}

	public function ctrIngreso() {
		if (isset($_POST["ingresaUsuario"])) {
			$tabla = "usuario";
			$item = "user_name";
			$valor = $_POST["ingresaUsuario"];
			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,
			 $item, $valor);

			


			if (is_array($respuesta) && ($respuesta["user_name"]) == $_POST["ingresaUsuario"] && 
				$respuesta["password"] == $_POST["ingresaPassword"]) {
				
				// $_SESSION["validarIngreso"] = "logueado";
				$_SESSION["validarIngreso"] = array($respuesta["nombre"], $respuesta["apellido"], $respuesta["id_usuario"], $respuesta["puesto"]); 
				echo "<script>

				
				 if(window.history.replaceState){
		                
		                window.history.replaceState( null, null, window.location.href);
		            }
					window.location = 'index.php?pagina=informes';
		           
		            

				</script>";
				// require_once "plantilla.controlador.php";
				// $contenido = new ControladorFormularios();
				// $contenido -> ctrMostrarPlantillaContenido();

			}else {
				echo "<script>
				console.log('Contraseña INCORRECTA');

				</script>";
			}
		}
	}

	static public function ctrRegistro() {

		if (!empty($_POST["registroRS"])) {
			if (!empty($_POST["registroRFC"])) {
				if (!empty($_POST["registroDireccion"])) {
					if (!empty($_POST["registroCP"])) {
						if (!empty($_POST["registroTelefono"])) {
							if (!empty($_POST["registroIDUsuario"])) {
								if (!empty($_POST["registroEmail"])) {
									if (!empty($_POST["registroEstatus"])) {
										if (isset($_POST["registroRS"])) {
											$tabla = "cliente";
											$datos = array("razon_social" => $_POST["registroRS"], 
												"rfc" => $_POST["registroRFC"],
												"direccion" => $_POST["registroDireccion"],
												"cp" => $_POST["registroCP"],
												"telefono" => $_POST["registroTelefono"],
												"id_usuario" => $_POST["registroIDUsuario"],
												"email" => $_POST["registroEmail"],
												"estatus" => $_POST["registroEstatus"]);
											$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
											echo '
												<script>
													setTimeout(function(){
														window.location = "index.php?pagina=clientes"
														}, 2000);
												</script>

											';

											return $respuesta;
										}
									} else {
										echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
									}
									
								} else {
									echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
								}
								
							} else {
								echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
							}
							
						} else {
							echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
						}
						
					}
				} else {
					echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
				}
				
			} else {
				echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
			}
			
		}else {
			echo '<div class="alert alert-warning">Todos los campos son necesarios</div>';
		}

	}

	public function ctrActualizarCliente() {

		if(isset($_POST["actualizaRS"])) {

			$tabla = "cliente";

			if ($_POST["actualizaEstatus"] == "ACTIVO" || 
				$_POST["actualizaEstatus"] == "Activo" || 
				$_POST["actualizaEstatus"] == "activo") {
				$_POST["actualizaEstatus"] = 1;
				$estatus = $_POST["actualizaEstatus"];
			} else {
				$_POST["actualizaEstatus"] = 0;
				$estatus = $_POST["actualizaEstatus"];
			}

			$datos = array("id_cliente" => $_POST["idCliente"],
			"razon_social" => $_POST["actualizaRS"],
			"direccion" => $_POST["actualizaDireccion"],
			"email" => $_POST["actualizaEmail"],
			"telefono" => $_POST["actualizaTelefono"],
			"rfc" => $_POST["actualizaRFC"],
			"cp" => $_POST["actualizaCP"],
			"estatus" => $estatus);

			$respuesta = ModeloFormularios::mdlActualizarCliente($tabla, $datos);

			if ($respuesta == "actualizado") {
				echo "<script>
			            if(window.history.replaceState){
			                
			                window.history.replaceState( null, null, window.location.href);
			            }
			            
			        </script>";
				echo '<div class="alert alert-success">El usuario ha sido actualizado</div>
					<script>
						setTimeout(function(){
							window.location = "index.php?pagina=clientes"
							}, 2000);
					</script>

				';
			}
			
		}
	}

	public function ctrEliminarCliente() {
		if (isset($_POST["eliminarCliente"])) {
			$tabla = "cliente";
			$valor = $_POST["eliminarCliente"];

			$respuesta = ModeloFormularios::mdlEliminarCliente($tabla, $valor);

			if ($respuesta == "eliminado") {
				echo '<script>
		            if(window.history.replaceState){
		                
		                window.history.replaceState( null, null, window.location.href);
		            }
		            window.location = "index.php?pagina=clientes";

		        </script>';
			} 
			
		} 
		
	}

	public function ctrActualizaUsuario() {

		if(isset($_POST["actualizaNombre"])) {

			$tabla = "usuario";
			$puesto = "";
			$estatus;

			if ($_POST["actualizaEstatus"] == "ac") {
				$_POST["actualizaEstatus"] = true;
			} else {
	
				$_POST["actualizaEstatus"] == false;
			}

			if ($_POST["actualizaPuesto"] == "ca") {
				$puesto = "Contador Auxiliar";
				$_POST["actualizaPuesto"] = $puesto;
			} else if ($_POST["actualizaPuesto"] == "c") {
				$puesto = "Contador";
				$_POST["actualizaPuesto"] = $puesto;
			} else if ($_POST["actualizaPuesto"] == "p") {
				$puesto = "Presidente";
				$_POST["actualizaPuesto"] = $puesto;
			} else {
				echo "Error";
			}
			

			if ($_POST["actualizaPassword"] == $_POST["confirmaPassword"]) {

				$datos = array("id_usuario" => $_POST["idUsuario"],
				"nombre" => $_POST["actualizaNombre"],
				"apellido" => $_POST["actualizaApellido"],
				"direccion" => $_POST["actualizaDireccion"],
				"telefono" => $_POST["actualizaTelefono"],
				"email" => $_POST["actualizaEmail"],
				"user_name" => $_POST["actualizaUserName"],
				"password" => $_POST["actualizaPassword"],
				"puesto" => $_POST["actualizaPuesto"],
				"estatus" => $_POST["actualizaEstatus"]);

				$respuesta = ModeloFormularios::mdlActualizarUsuario($tabla, $datos);

				if ($respuesta == "actualizado") {
					echo "<script>
				            if(window.history.replaceState){
				                
				                window.history.replaceState( null, null, window.location.href);
				            }
				            
				        </script>";
					echo '<div class="alert alert-success">El usuario ha sido actualizado</div>
						<script>
							setTimeout(function(){
								window.location = "index.php?pagina=usuarios"
								}, 1000);
						</script>

					';
				}
			} else {
				echo '<div class="alert alert-danger">Las contraseñas no coinciden</div>';
			}
			

			
		}
	}

	static public function ctrRegistroUsuario() {
		$puesto = "";
		

		if (isset($_POST["registroNombre"])) {
			$tabla = "usuario";
			if ($_POST["registroPuesto"] == "ca") {
				$puesto = "Contador Auxiliar";
				$_POST["registroPuesto"] = $puesto;
			} if ($_POST["registroPuesto"] == "c") {
				$puesto = "Contador";
				$_POST["registroPuesto"] = $puesto;
			} if ($_POST["registroPuesto"] == "p") {
				$puesto = "Presidente";
				$_POST["registroPuesto"] = $puesto;
			} else {
				echo "Error";
			}
			$datos = array("nombre" => $_POST["registroNombre"], 
				"apellido" => $_POST["registroApellido"],
				"direccion" => $_POST["registroDireccion"],
				"telefono" => $_POST["registroTelefono"],
				"email" => $_POST["registroEmail"],
				"user_name" => $_POST["registroUserName"],
				"password" => $_POST["registroPassword"],
				"puesto" => $_POST["registroPuesto"],
				"estatus" => $_POST["registroEstatus"]);
			$respuesta = ModeloFormularios::mdlRegistroUsuario($tabla, $datos);
			echo '
			<script>
			setTimeout(function(){
				window.location = "index.php?pagina=usuarios"
				}, 2000);
				</script>

				';

			return $respuesta;
		}

	}

	static public function ctrRegistroCuenta() {		

		if (isset($_POST["registroId_Cliente"])) {
			$tabla = "cuenta";
			
			$rCuenta = $_POST["registroCuenta"];
			if (strlen($rCuenta) == 11) {
				# code...
				if ($_POST["registroEstatus"] == "ac") {
					$_POST["registroEstatus"] = true;
				} else {

					$_POST["registroEstatus"] == false;
				}


				if (!$_POST["registroBanco"] == "0") {
					if (!$_POST["registroPlaza"] == "0") {

					$ncuenta = $_POST["registroBanco"].$_POST["registroPlaza"].$_POST["registroCuenta"]."1";
					$banco = $_POST["registroBanco"];
					$plaza = $_POST["registroPlaza"];

					if ($banco == "002") {
						$banco = "BANAMEX";
					}else if ($banco == "012") {
						$banco = "BBVA BANCOMER";
					}else if ($banco == "014") {
						$banco = "SANTANDER";
					}else if ($banco == "021") {
						$banco = "HSBC";
					}else if ($banco == "036") {
						$banco = "INBURSA";
					}else if ($banco == "044") {
						$banco = "SCOTIABANK";
					}else if ($banco == "072") {
						$banco = "BANORTE";
					}else if ($banco == "127") {
						$banco = "AZTECA";
					}else if ($banco == "137") {
						$banco = "BANCOPPEL";
					}else if ($banco == "143") {
						$banco = "CIBanco";
					}else if ($banco == "019") {
						$banco = "BANJERCITO";
					}else if ($banco == "058") {
						$banco = "BANREGIO";
					}else if ($banco == "062") {
						$banco = "AFIRME";
					}

					if ($plaza == "180") {
						$plaza = "CDMX";
					}else if ($plaza == "580") {
						$plaza = "Monterrey";
					}else if ($plaza == "320") {
						$plaza = "Guadalajara";
					}else if ($plaza == "680") {
						$plaza = "QUERETARO";
					}else if ($plaza == "420") {
						$plaza = "Toluca";
					}else if ($plaza == "027") {
						$plaza = "Tijuana";
					}else if ($plaza == "470") {
						$plaza = "Morelia";
					}else if ($plaza == "210") {
						$plaza = "Guanajuato";
					}else if ($plaza == "261") {
						$plaza = "Acapulco";
					}else if ($plaza == "691") {
						$plaza = "Cancún";
					}

					$datos = array("numero_cuenta" => $ncuenta, 
						"banco" => $banco,
						"saldo" => $_POST["registroSaldo"],
						"ingresos" => $_POST["registroIngresos"],
						"egresos" => $_POST["registroEgresos"],
						"saldo" => $_POST["registroSaldo"],
						"estatus" => $_POST["registroEstatus"],
						"id_cliente" => $_POST["registroId_Cliente"],
						"plaza" => $plaza);
					$respuesta = ModeloFormularios::mdlRegistroCuenta($tabla, $datos);
					echo '
					<script>
					setTimeout(function(){
						window.location = "index.php?pagina=clientes"
						}, 2000);
						</script>

					';

					return $respuesta;
					} else {
						echo '<div class="alert alert-warning">Error</div>';

					}
				} else {
					echo '<div class="alert alert-warning">Error</div>';
				}
			} else {
				echo '<div class="alert alert-danger">El número de cuenta debe tener 11 valores.</div>';
			}


		}

	}


	static public function ctrSeleccionarCuentas($item, $valor) {
		$tabla = "cuenta";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;

	}


	public function ctrActualizaCuenta() {

		if(isset($_POST["actualizaIngreso"])) {

			$tabla = "cuenta";
			$estatus;

			if ($_POST["actualizaEstatus"] == "ac") {
				$_POST["actualizaEstatus"] = true;
			} else {
	
				$_POST["actualizaEstatus"] == false;
			}		

			$datos = array("id_cuenta" => $_POST["idCuenta"],
				"ingresos" => $_POST["actualizaIngreso"],
				"egresos" => $_POST["actualizaEgreso"],
				"saldo" => $_POST["actualizaSaldo"],
				"banco" => $_POST["actualizaBanco"],
				"estatus" => $_POST["actualizaEstatus"],
				"plaza"=> $_POST["actualizaPlaza"]);

				$respuesta = ModeloFormularios::mdlActualizarCuenta($tabla, $datos);

				if ($respuesta == "actualizado") {
					echo "<script>
				            if(window.history.replaceState){
				                
				                window.history.replaceState( null, null, window.location.href);
				            }
				            
				        </script>";
					echo '<div class="alert alert-success">El usuario ha sido actualizado</div>
						<script>
							setTimeout(function(){
								window.location = "index.php?pagina=clientes"
								}, 1000);
						</script>

					';
				}

			
		}
	}

//TERMINA CLASE
}

 ?>