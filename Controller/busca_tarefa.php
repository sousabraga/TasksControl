<?php 
	//Iniciando a sessão
	session_start();
	//Incluindo o Model DAOTarefa
	include("../Model/DAOTarefa.class.php");
	
	$dao = new DAOTarefa();
	
	//Consultando a tarefa pelo id que foi enviado de listar tarefas
	$result= $dao->selectById($_GET['id']);
	
	//Armazenando todos os dados num array
	$tarefa = array(
		'id' => $result->id,
		'titulo' => $result->titulo,
		'descricao' => $result->descricao,
		'prazo' => $result->prazo,
		'conclusao' => $result->conclusao,
		'lembrete' => $result->lembrete 
	);
	
	//Colocando o array na sessão
	$_SESSION['tarefa'] = $tarefa;
	
	//Redirecionando para página de editar tarefa
	header("Location: ../View/editar_tarefa.php");

?>