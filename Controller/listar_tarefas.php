<?php  
	//Iniciando a sessão
	session_start();
	//Incluindo o Model DAOTarefa
	include_once("../Model/DAOTarefa.class.php");
			
	$dao = new DAOTarefa();
	
	//Recuperando dados do usuário na sessão
	$usuario = $_SESSION['usuario'];
	
	//Consulta as tarefas pelo id do usuário logado
	$tarefas = $dao->selectAll($usuario['id']); 

?>