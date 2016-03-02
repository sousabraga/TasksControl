<?php  
	//Iniciando a sessão
	session_start();
	//Inserindo o Model DAOTarefa
	include_once("../Model/DAOTarefa.class.php");
	
	$dao = new DAOTarefa();
	//Deletando tarefa pelo id
	$dao->delete($_GET['id']);
	
	//Colocando menssagem de confirmação na sessão
	$_SESSION['msg'] = "Tarefa excluida com sucesso.";
	//Redirecionando para a página de listar tarefas
	header("Location: ../View/listar_tarefas.php");
?>