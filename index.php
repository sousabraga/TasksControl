<?php  

	session_start();
	
	/* Verifica se existe usuário logado, se existir manda para a página de listar tarefas,
	 * se não envia para a página inicial.
	 */
	 
	if(isset($_SESSION['user'])):
		header("Location: View/listar_tarefas.php");
	else:
		header("Location: View/home.php");
	endif;
?>