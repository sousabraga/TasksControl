<?php 
	session_start();

	if(isset($_SESSION['usuario'])) {
		header("Location: listar_tarefas.php");
	}
?>

<?php include("header.php"); ?>

<html lang="pt-br">
	
	<head>
		<meta charset="UTF-8"/>
		<title>Tasks Control - Login</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheet/estilos.css"/>
	</head>
	<body>
		<form id="form" action="../Controller/valida_login.php" method="POST">
			<!-- Verificando se existe mensagem de erro -->
			<?php if(isset($_SESSION['msg'])): ?> 
				<div class="alert alert-danger" role="alert"><?php echo $_SESSION['msg']; ?></div>
			<?php 
				unset($_SESSION['msg']); //Removendo a mensagem da sessão
				endif;
			?>	
			<legend><strong>Login</strong></legend>
			
			<input type="text" id="id_usuario" name="usuario" placeholder="Digite o usuário" class="form-control input-lg" required />
			<br/>
			<input type="password" id="id_senha" name="senha" placeholder="Digite a senha" class="form-control input-lg" required />
			<br/>
			<button class="btn btn-default btn-lg btn-block">
				<b>Entrar</b>
			</button>
		</form>
	</body>
</html>

<?php include("footer.php"); ?>