<?php 
	
	//Incluindo o array de tarefas e helpers adicionais
	include_once("../Controller/listar_tarefas.php");
	include_once("../Controller/helpers/helpers.php");

	//Verificando se existe usuário logado na sessão
	if(!isset($_SESSION['usuario'])) {
		header("Location: login.php");
	}

	//Incluindo o header
	include_once("header.php"); 
?>

<html>
	<head>
		<title>Lista de Tarefas</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheet/listar_tarefas.css"/>
	</head>
	<body>
		<div class="conteudo">
			<!-- Verificando se existe mensagem de erro -->
			<?php if(isset($_SESSION['msg'])): ?> 
				<!-- Mostrando mensagem -->
				<div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
			<?php 
				unset($_SESSION['msg']); //Removendo a mensagem da sessão
				endif;
			?>	
			<fieldset>
				<legend><strong>Atividades Pendentes</strong></legend>
				<table class="table table-striped table-hover">
					<thead>
						<th>Título</th>
						<th>Descrição</th>
						<th>Prazo</th>
						<th>Lembrete</th>
						<th>Conclusão</th>
						<th>Ações</th>
					</thead>
					<!-- Listando as tarefas -->
					<?php foreach($tarefas as $tarefa): ?>
						<tbody>	
							<td><?php echo $tarefa->titulo; ?></td>
							<td><?php echo $tarefa->descricao; ?></td>
							<td><?php echo dataParaExibir($tarefa->prazo); ?></td>
							<td><?php echo mostraLembrete($tarefa->lembrete); ?></td>
							<td><?php echo mostraConclusao($tarefa->conclusao); ?></td>
							<td>
								<a href="../Controller/busca_tarefa.php?id=<?php echo $tarefa->id; ?>">
									<button class="btn btn-warning">
										<div class="glyphicon glyphicon-pencil"></div>
									</button>
								</a>
								<a href="../Controller/remover_tarefa.php?id=<?php echo $tarefa->id; ?>">
									<button class="btn btn-danger">
										<div class="glyphicon glyphicon-trash"></div>
									</button>
								</a>
							</td>
						</tbody>
					<?php endforeach; ?>
				</table>
			</fieldset>
			
			<a href="inserir_tarefa.php">
				<button class="btn btn-success">
					<div class="glyphicon glyphicon-plus"></div>
					Nova Tarefa
				</button>
			</a>
		
		</div>
	</body>
</html>
