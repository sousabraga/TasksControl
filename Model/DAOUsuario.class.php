<?php  
	//Inclui a fabrica de conexões
	include("ConnectionFactory.class.php");

	class DAOUsuario {
		
		//Função para inserir um novo usuário
		public function insert(VOUsuario $usuario) {
			$sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $usuario->getUsuario());
			$pstm->bindParam(2, $usuario->getSenha());
			$pstm->bindParam(3, $usuario->getEmail());
			
			return $pstm->execute();
			
			$pstm->close();
			$connection->close();
		}
		
		//Função para alterar um usuário
		public function update(VOUsuario $usuario) {
			$sql = "UPDATE FROM usuarios SET usuario = ?, senha = ?, email = ? WHERE id = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $usuario->getUsuario());
			$pstm->bindParam(2, $usuario->getSenha());
			$pstm->bindParam(3, $usuario->getEmail());
			$pstm->bindParam(4, $usuario->getId());
			
			return $pstm->execute();
				
			$pstm->close();
			$connection->close();
		}
		
		//Função para deletar um usuário
		public function delete($id) {
			$sql = "SELECT * FROM usuarios WHERE id = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $id);
			
			return $pstm->execute();
			
			$pstm->close();
			$connection->close();
		}
		
		//Função para buscar usuário por ID
		public function selectById($id) {
			$sql = "SELECT * FROM usuarios WHERE id = ".$id;
			
			$connection = ConnectionFactory::getConnection();
			
			$usuario = new VOUsuario();
			
			foreach($connection->query($sql) as $resultado) {	
				$usuario->setId($resultado['id']);
				$usuario->setUsuario($resultado['usuario']);
				$usuario->setSenha($resultado['senha']);
				$usuario->setEmail($resultado['email']);
			}
			
			return $usuario;
						
			$connection->close();
		}
		
		//Função para buscar todos os usuários
		public function selectAll() {
			$sql = "SELECT * FROM usuarios";
			
			$connection = ConnectionFactory::getConnection();
			
			$usuarios = array();
			
			foreach($connection->query($sql) as $resultado) {
				$usuario = new VOUsuario();
				$usuario->setId($resultado['id']);
				$usuario->setUsuario($resultado['usuario']);
				$usuario->setSenha($resultado['senha']);
				$usuario->setEmail($resultado['email']);
				
				$usuarios = $usuario;
			}
			
			return $usuarios;
			
			$connection->close();
		}
		
		//Função para validar o login do usuário
		public function validateLogin($usuario, $senha) {
			$sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
			
			$connection = ConnectionFactory::getConnection();
			
			$pstm = $connection->prepare($sql);
			$pstm->bindParam(1, $usuario);
			$pstm->bindParam(2, $senha);
			
			if($pstm->execute()) {
				$row = $pstm->fetch(PDO::FETCH_OBJ);
				return $row;
			} else {
				return false;
			}
			
			$connection->close();
		}
	}

?>