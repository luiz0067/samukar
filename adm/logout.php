<?php
		session_start();
		$_SESSION = array();
		//Elimina os dados da sessão		
		session_destroy();
		//Encerra a sessão	
	header("Location:index.php");
?>
