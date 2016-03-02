<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Tasks Control - Nova Tarefa</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheet/estilos.css"/>
		<link rel="stylesheet" type="text/css" href="helpers/masks.js"/>
		<!-- Script simples para limitar a quantidade de números na data -->
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
		<!-- Formulário para preenchimendo dos dados da nova tarefa -->
		<form id="form" action="../Controller/inserir_tarefa.php" method="POST">
			<legend><strong>Nova Tarefa</strong></legend>
				
			<input type="text" name="titulo" placeholder="Título da tarefa" class="form-control input-lg" required/>
			<br/>
			<textarea name="descricao" placeholder="Descrição da tarefa" class="form-control input-lg" required></textarea>
			<br/>
			<input type="text" id="data" maxlength="10" name="prazo" placeholder="Informe o prazo DD/MM/YYYY" 
				pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])\/(0[1-9]|1[012])\/[0-9]{4}" class="form-control input-lg" onkeyup="maskDate(this.id);" required/>
			<br/>
			<input type="checkbox" name="lembrete" checked/>
			<strong>Lembrete por e-mail</strong>
			<br/><br/>
			<button class="btn btn-default btn-lg btn-block">
				<b>Inserir Tarefa</b>
			</button>
		</form>
	</body>
</html>



