<?php
		session_start();
		$_SESSION = array();
		//Elimina os dados da sess�o		
		session_destroy();
		//Encerra a sess�o	
	header("Location:index.php");
?>
