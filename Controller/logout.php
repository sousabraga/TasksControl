<?php  

	//Inicia Sessão
	session_start();

	//Destrói Sessão
	session_destroy();
	
	//Redireciona para home page
	header("Location: ../View/logout.php");
?>