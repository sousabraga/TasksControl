<?php  
	//Classe Value Object Usuário
	class VOUsuario {
		private $id;
		private $usuario;
		private $senha;
		private $email;
		
		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getUsuario() {
			return $this->usuario;
		}
		
		public function setUsuario($usuario) {
			$this->usuario = $usuario;
		}
		
		public function getSenha() {
			return $this->senha;
		}
		
		public function setSenha($senha) {
			$this->senha = $senha;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function setEmail($email) {
			$this->email = $email;
		}
	}
	
?>