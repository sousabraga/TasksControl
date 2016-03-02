<?php
	//Iniciando a sessão
	session_start(); 
	//Incluindo os helpers
 	include_once("../Controller/helpers/helpers.php");
	//Recebendo o array de tarefas da sessão
	$tarefa = $_SESSION['tarefa']; 
?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Tasks Control - Editar Tarefa</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheet/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="helpers/masks.js"/>
		<!-- Script para limitar a quantidade de números na data -->
		<script>
			function maskDate(data) {
				if(document.getElementById(data).value.length == 2) {
					document.getElementById(data).value = document.getElementById(data).value + "/";
				}
				
				if(document.getElementById(data).value.length == 5) {
					document.getElementById(data).value = document.getElementById(data).value + "/";
				}
			}
		</script>
	</head>
	<body>
		<form id="form" action="../Controller/editar_tarefa.php?id=<?php echo $tarefa['id']; ?>" method="POST">
			<legend><strong>Editar Tarefa</strong></legend>
			
			<input type="text" name="titulo" class="form-control input-lg" value="<?php echo $tarefa['titulo']; ?>" required />
			<br/>
			<textarea name="descricao" class="form-control input-lg" required><?php echo $tarefa['descricao']; ?></textarea>
			<br/>
			<input type="text" id="prazo" maxlength="10" name="prazo" class="form-control input-lg" value="<?php echo dataParaExibir($tarefa['prazo']); ?>" onkeyup="maskDate(this.id)" disabled />
			<br/>
			<!-- Verificando se a data de conclusão já foi informada -->
			<?php if(!isset($tarefa['conclusao'])): ?>
			<!-- Se não tiver sido mostra o campo normalmente para preenchimento -->	
				<input type="text" id="conclusao" maxlength="10" name="conclusao" class="form-control input-lg" onkeyup="maskDate(this.id);" placeholder="Informe a conclusão DD/MM/YYYY" />
			<?php else: ?>
			<!--Se já tiver sido preenchida, mostra a data e deixa o campo desabilitado -->	
				<input type="text" id="conclusao" maxlength="10" name="conclusao" class="form-control input-lg" value="<?php echo dataParaExibir($tarefa['conclusao']); ?>" onkeyup="maskDate(this.id);" onkeyup="maskDate(this.id)" disabled />
			<?php endif; ?>
			<br/>
			<!-- Tratamento do checkbox Lembrete -->
			<?php if($tarefa['lembrete'] == 1): ?>
				<input type="checkbox" name="lembrete" checked />
			<?php else: ?>	
				<input type="checkbox" name="lembrete"/>
			<?php endif; ?>	
			<strong>Lembrete por e-mail</strong>
			<br/><br/>
			<button class="btn btn-default btn-lg btn-block">
				<b>Alterar Tarefa</b>
			</button>
		</form>
	</body>
</html>
