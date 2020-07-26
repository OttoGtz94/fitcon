<?php 

Class ControladorPlantilla {

	public function ctrTraerPlantilla() {

		$inicio = "vistas/plantilla.php";

		$contenido = "vistas/plantilla.contenido.php";

		// if (session_status()) {
			
		// 	if (session_start()) {
				
		// 		include $contenido;

		// 	} else {
		// 		include "vistas/plantilla.php";
		// 	}
		// }else {
		// 	include "vistas/plantilla.php";
		// }


		// if (!session_start()) {
				
		// 	include $inicio;

		// } else {
			
		// 	include $contenido;
		// }
		
		include "vistas/plantilla.php";

		// echo "<script>

		// let contenido = document.querySelector('.contenido-general');
		// contenido.style.display = 'none';

		// </script>";

	}

	public function ctrMostrarPlantillaContenido() {
		include "vistas/plantilla.contenido.php";
	}


}

 ?>