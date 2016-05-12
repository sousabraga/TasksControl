<?php  
	//Incluindo a fábrica de conexões
	include_once("ConnectionFactory.class.php");

	class DAOTarefa {
		
		//Função para inserir uma nova tarefa
		public function insert(VOTarefa $tarefa) {
			$sql = "INSERT INTO tarefas (titulo, descricao, prazo, lembrete, id_usuario) VALUES (?, ?, ?, ?, ?)";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $tarefa->getTitulo());
			$pstm->bindParam(2, $tarefa->getDescricao());
			$pstm->bindParam(3, $tarefa->getPrazo());
			$pstm->bindParam(4, $tarefa->getLembrete());
			$pstm->bindParam(5, $tarefa->getIdUsuario());
			
			return $pstm->execute();
							
			$pstm->close();
			$connection->close();
		}
		
		//Função para alterar uma tarefa
		public function update(VOTarefa $tarefa) {
			$sql = "UPDATE tarefas SET titulo = ?, descricao = ?, conclusao = ?, lembrete = ? WHERE id = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $tarefa->getTitulo());
			$pstm->bindParam(2, $tarefa->getDescricao());
			$pstm->bindParam(3, $tarefa->getConclusao());
			$pstm->bindParam(4, $tarefa->getLembrete());
			$pstm->bindParam(5, $tarefa->getId());
			
			return $pstm->execute();
						
			$pstm->close();
			$connection->close();	
		}
		
		//Função para deletar uma tarefa por ID
		public function delete($id) {
			$sql = "DELETE FROM tarefas WHERE id = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $id);
			
			return $pstm->execute(); 
			
			$pstm->close();
			$connection->close();
		}
		
		//Função para consultar todas as tarefas pelo ID do usuário
		public function selectAll($id_usuario) {
			$sql = "SELECT * FROM tarefas WHERE id_usuario = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $id_usuario);
			$pstm->execute();
			
			$rows = $pstm->fetchAll(PDO::FETCH_OBJ);
			
			return $rows;
		
			$connection->close();	
		}
		
		//Função para consultar uma tarefa por seu ID
		public function selectById($id) {
			$sql = "SELECT * FROM tarefas WHERE id = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $id);
			$pstm->execute();
	
			$row = $pstm->fetch(PDO::FETCH_OBJ);
			
			return $row;
		
			$connection->close();	
		}
	
	}

?>