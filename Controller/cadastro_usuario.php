<?php  
	//Iniciando a sessão
	session_start();
	//Incluindo os Models VOUsuario e DAOUsuario
	include_once("../Model/VOUsuario.class.php");
	include_once("../Model/DAOUsuario.class.php");
	
	//Criando um objeto para o novo usuário
	$usuario = new VOUsuario();
	//Setando as informações de acordo com os dados recebidos via POST
	$usuario->setEmail($_POST['email']);
	$usuario->setUsuario($_POST['usuario']);
	$usuario->setSenha($_POST['senha']);
	
	$dao = new DAOUsuario();
	$dao->insert($usuario); //Inserindo o novo usuário no banco
	
	//Colocando mensagem de confirmação na sessão
	$_SESSION['msg'] = "Cadastro efetuado com sucesso. Você receberá uma confirmação por e-mail em instantes.";
	//Redirecionando para tela de cadastro
	header("Location: ../View/cadastro_usuario.php");
	
?>