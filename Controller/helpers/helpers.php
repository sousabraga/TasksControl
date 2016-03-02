<?php  
	//Função que ajusta o formato da data para inserir no banco 
	function dataParaBanco($data) {
		if($data == "") {
			return "";
		}
		
		$dados = explode("/", $data);
		
		if(count($dados) != 3) {
			return $data;
		}
		
		$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";	
		return $data_mysql;
	}
	
	//Função que ajusta o formato da data para exibir
	function dataParaExibir($data) {
		if($data == "" || $data == "0000-00-00") {
			return "";
		}
		
		$dados = explode("-", $data);
		
		if(count($dados) != 3) {
			return $data;
		}
		
		$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
		return $data_exibir;
	}
	
	//Função que auxilia na hora de mostrar se a tarefa possui envio de lembrete ou não
	function mostraLembrete($lembrete) {
		if($lembrete == 1):
			return "SIM";
		else:
			return "NÃO";
		endif;		
	}
	
	//Função que mostra a data da conclusão se a tarefa tiver sido concluida, se não mostra NÃO CONCLUIDA
	function mostraConclusao($conclusao) {
		if($conclusao == null):
			return "NÃO CONCLUÍDA";
		else:
			return dataParaExibir($conclusao);
		endif;		
	}

?>