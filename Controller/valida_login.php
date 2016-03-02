<?php  
	//Iniciando a sessão
	session_start();
	//Incluindo os Models DAOUsuario e VOUsuario
	include_once("../Model/DAOUsuario.class.php");
	include_once("../Model/VOUsuario.class.php");

	$dao = new DAOUsuario();

	//Testa se existe usuario com os dados informados
	$result = $dao->validateLogin($_POST['usuario'], $_POST['senha']);
	//Se os dados de login forem inválidos
	if($result == false) {
		$_SESSION['msg'] = "Usuário e/ou senha incorretos! Tente novamente."; //Inserindo mensagem na sessão
		header("Location: ../View/login.php"); //Redirecionando e mostrando a devida mensagem de erro
	} else { //Se os dados de login forem válidos
		//Iniciando a sessão
		session_start();
		
		//Armazenando informações do usuário num array
		$usuario = array(
			'id' => $result->id,
			'usuario' => $result->usuario,
			'email' => $result->email
		);

		$_SESSION['usuario'] = $usuario; //Salvando dados do usuário na sessão
		
		//Redirecionando para a página do usuário
		header("Location: ../View/listar_tarefas.php");
	}	

?>