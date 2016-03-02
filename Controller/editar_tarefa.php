<?php 
	//Iniciando a sessão
	session_start();
	//Incluindo os helpers
	include_once("helpers/helpers.php");
	//Incluindo os Models DAOTarefa e VOTarefa
	include_once("../Model/DAOTarefa.class.php");
	include_once("../Model/VOTarefa.class.php");
	
	$dao = new DAOTarefa();
	
	//Atualizando os dados da tarefa
	$tarefaEditada = new VOTarefa();
	
	$tarefaEditada->setId($_GET['id']);
	$tarefaEditada->setTitulo($_POST['titulo']);
	$tarefaEditada->setDescricao($_POST['descricao']);
	$tarefaEditada->setPrazo(dataParaBanco($_POST['prazo']));
	
	//Verificando se foi informado a data de conclusão
	if(isset($_POST['conclusao']) && $_POST['conclusao'] != ""):
		$tarefaEditada->setConclusao(dataParaBanco($_POST['conclusao']));
	else:
		$tarefaEditada->setConclusao(null);	
	endif;
		
	//Verificando se o checkbox lembrete está marcado
	if(isset($_POST['lembrete'])): 
		$tarefaEditada->setLembrete(true);
	else: 
		$tarefaEditada->setLembrete(false);
	endif;

	//Editando a tarefa
	$dao->update($tarefaEditada);	
	
	//Colocando mensagem de confirmação na sessão
	$_SESSION['msg'] = "Tarefa alterada com sucesso.";
	
	//Redirecionando para a listagem de tarefas
	header("Location: ../View/listar_tarefas.php");
?>