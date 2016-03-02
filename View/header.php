<!DOCTYPE html>
<html lang="pt-br">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		 	<div class="container-fluid">
		    	<div class="navbar-header">
		      	<div class="navbar-brand"><em>Tasks Control</em></div>
		    </div>
		    <ul class="nav navbar-nav">
		    	<li class="active"><a href="home.php">Home</a></li>
		      	<li><a href="#">Newsletters</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		    	<!-- Se não estiver usuário logado, mostra sa opções Login e de Cadastro -->
		    	<?php if(!isset($_SESSION['usuario'])): ?>
		    		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    		<li><a href="cadastro_usuario.php"><span class="glyphicon glyphicon-user"></span> Novo por aqui?! Cadastre-se!</a></li>
		    	<!-- Se tiver usuário logado, mostra as opções Listar Tarefas e Logout -->	
		    	<?php else: ?>
		    		<li><a href="../View/listar_tarefas.php"><span class="glyphicon glyphicon-th-list"></span> Listar Tarefas</a></li>	
		    		<li><a href="../Controller/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		    	<?php endif; ?>	
		    </ul>
		  </div>
		</nav>
	</body>
</html>