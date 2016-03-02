<?php 
	//Iniciando a sessão
	session_start();
	
	//Verificando se existe usuário logado
	if(isset($_SESSION['usuario'])) {
		header("Location: listar_tarefas.php");
	}
	
	//Incluindo o header
 	include_once("header.php"); 
 ?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Tasks Control - Cadastro</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheet/estilos.css"/>
	</head>
	<body>
		<form id="form" action="../Controller/cadastro_usuario.php" method="POST">
			<!-- Verificando se existe mensagem de erro -->
			<?php if(isset($_SESSION['msg'])): ?> 
				<div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
			<?php 
				unset($_SESSION['msg']); //Removendo a mensagem da sessão
				endif;
			?>	
			<legend><strong>Cadastre-se</strong></legend>
			<!-- Campos para preenchimendo de novo usuário -->
			<input type="email" id="id_email" name="email" placeholder="Digite seu email" class="form-control input-lg" required />
			<br/>
			<input type="text" id="id_usuario" name="usuario" placeholder="Digite seu usuário" class="form-control input-lg" required />
			<br/>
			<input type="password" id="id_senha" name="senha" placeholder="Digite sua senha" class="form-control input-lg" required />
			<br/>
			<button class="btn btn-default btn-lg btn-block">
				<b>Cadastrar</b>
			</button>
		</form>
	</body>
</html>

<?php
	//Incluindo o rodapé 
	include_once("footer.php"); 
?>