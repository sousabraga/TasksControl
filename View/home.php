<?php 
	//Iniciando a sessão
	session_start();
	//Incluindo o header
	include_once("header.php"); 
?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Tasks Control - Home</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheet/home.css"/>
	</head>
	<body>
		<h1>Seja bem Vindo ao <em>Tasks Control</em> ;)</h1>
		<div class="conteudo">	
			<section>
				<p>No <em>Tasks Control</em> você se organiza definindo seus afazeres, controlando seus prazos<br/> e consultando as atividades que ainda estão pendentes.</p>
				<p>Caso você queira obter 100% de êxito em seus objetivos, <a href="cadastro_usuario.php">registre-se</a> já e mão na massa.</p>
				<p>Lembrando que, nós lhe ajudamos dando uma visão geral de suas pendências, como tudo<br/> que já foi concluido, 
					o que falta, e ainda alertamos sobre as atividades que estão com o<br/> prazo para terminar. O resto é com você.</p>
				<p>E o melhor, sempre será gratuito!</p>	
				<p>E então? Vamos nessa?</p>
	
			</section>
		</div>
	</body>
</html>

<?php 
	//Incluindo o rodapé
	include("footer.php"); 
?>