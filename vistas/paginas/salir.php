<?php 

session_destroy();
echo '<script> 
	if(window.history.replaceState){
		                
        window.history.replaceState( null, null, window.location.href);
    }
	window.location = "index.php?pagina=ingreso"; 

	</script>';

 ?>