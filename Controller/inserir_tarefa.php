<?php  
	//Iniciando a sessão
	session_start();
	//Incluindo os Models VOTarefa e DAOTarefa
	include_once("../Model/VOTarefa.class.php");
	include_once("../Model/DAOTarefa.class.php");
	//Incluindo os helpers
	include_once("helpers/helpers.php");
	
	//Instanciando uma nova tarefa e atribuindo os seus dados
	$tarefa = new VOTarefa();
	$tarefa->setTitulo($_POST['titulo']);
	$tarefa->setDescricao($_POST['descricao']);
	$tarefa->setPrazo(dataParaBanco($_POST['prazo']));
	
	//Verificando se o checkbox lembrete é marcado
	if(isset($_POST['lembrete'])): 
		$tarefa->setLembrete(true);
	else: 
		$tarefa->setLembrete(false);
	endif;	
	
	//Pegando os dados do usuário logado
	$usuario = $_SESSION['usuario'];
	//Atribuindo a nova tarefa ao id do usuário que está logado
	$tarefa->setIdUsuario($usuario['id']);
	
	$dao = new DAOTarefa();
	//Inserindo a nova tarefa
	$dao->insert($tarefa);
	
	//Colocando messagem de confirmação na sessão
	$_SESSION['msg'] = "Nova tarefa adicionada com sucesso.";
	//Redirecionando para a página que lista as tarefas
	header("Location: ../View/listar_tarefas.php");
?>