<?php 

require_once "conexion.php";


class ModeloFormularios{ 

	static public function mdlSeleccionarRegistros($tabla, $item, $valor) {

		if ($item == null && $valor == null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt-> execute();
			return $stmt -> fetchAll(); //fetchAll significa devolver todos los registros

		} else {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt-> execute();
			return $stmt -> fetch();

		}
		

		
		$stmt -> close();//Cerramos la conexión  la BD
		$stmt = null; //Reforzar la seguridad, es opcional
	}


	static public function mdlRegistro($tabla, $datos) {
		$stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(razon_social, rfc, direccion, cp, telefono, email, id_usuario, estatus) 
			VALUES (:razon_social, :rfc, :direccion, :cp, :telefono, :email, :id_usuario, :estatus)");

		$stmt ->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
		$stmt ->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt ->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt ->bindParam(":cp", $datos["cp"], PDO::PARAM_INT);
		$stmt ->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt ->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt ->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "registrado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
	}

	static public function mdlActualizarCliente($tabla, $datos) {
		$stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET razon_social=:razon_social, 
			rfc=:rfc, direccion=:direccion, cp=:cp, telefono=:telefono, email=:email, estatus=:estatus 
			WHERE id_cliente =:id_cliente");

		$stmt -> bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);
		$stmt -> bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":cp", $datos["cp"], PDO::PARAM_INT);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "actualizado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
		
		
	}

	static public function mdlEliminarCliente ($tabla, $valor) {
		$stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");

		$stmt -> bindParam(":id_cliente", $valor, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "eliminado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
		
	}

	static public function mdlActualizarUsuario($tabla, $datos) {
		$stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET direccion=:direccion, puesto=:puesto, telefono=:telefono, email=:email, estatus=:estatus, password=:password 
			WHERE id_usuario =:id_usuario");

		// $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		// $stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":puesto", $datos["puesto"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "actualizado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
		
		
	}

	static public function mdlActualizarCuenta($tabla, $datos) {
		$stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET banco=:banco, saldo=:saldo, ingresos=:ingresos, egresos=:egresos, estatus=:estatus, plaza=:plaza
			WHERE id_cuenta =:id_cuenta");

		// $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		// $stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":banco", $datos["banco"], PDO::PARAM_STR);
		$stmt -> bindParam(":saldo", $datos["saldo"], PDO::PARAM_INT);
		$stmt -> bindParam(":ingresos", $datos["ingresos"], PDO::PARAM_INT);
		$stmt -> bindParam(":egresos", $datos["egresos"], PDO::PARAM_INT);
		$stmt -> bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt -> bindParam(":egresos", $datos["egresos"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_INT);
		$stmt -> bindParam(":plaza", $datos["plaza"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "actualizado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
		
		
	}

	static public function mdlRegistroUsuario($tabla, $datos) {
		$stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre, apellido, direccion, telefono, email, user_name, password, puesto, estatus) 
			VALUES (:nombre, :apellido, :direccion, :telefono, :email, :user_name, :password, :puesto, :estatus)");

		$stmt ->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt ->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt ->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt ->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt ->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt ->bindParam(":user_name", $datos["user_name"], PDO::PARAM_STR);
		$stmt ->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt ->bindParam(":puesto", $datos["puesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "registrado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
	}

	static public function mdlRegistroCuenta($tabla, $datos) {
		$stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(numero_cuenta, banco, saldo, ingresos, egresos, estatus, id_cliente, plaza) 
			VALUES (:numero_cuenta, :banco, :saldo, :ingresos, :egresos, :estatus, :id_cliente, :plaza)");

		$stmt ->bindParam(":numero_cuenta", $datos["numero_cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":banco", $datos["banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldo", $datos["saldo"], PDO::PARAM_STR);
		$stmt ->bindParam(":ingresos", $datos["ingresos"], PDO::PARAM_STR);
		$stmt ->bindParam(":egresos", $datos["egresos"], PDO::PARAM_STR);
		$stmt ->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt ->bindParam(":plaza", $datos["plaza"], PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "registrado";
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt -> close();
		$stmt = null;
	}
	//termina clase

}

 ?>