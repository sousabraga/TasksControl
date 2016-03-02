<?php  
	//Classo Value Object Tarefa
	class VOTarefa {
		private $id;
		private $titulo;
		private $descricao;
		private $prazo;
		private $conclusao;
		private $lembrete;
		private $id_usuario;
		
		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		} 
		
		public function getTitulo() {
			return $this->titulo;
		}
		
		public function setTitulo($titulo) {
			$this->titulo = $titulo;
		} 
		
		public function getDescricao() {
			return $this->descricao;
		}
		
		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		} 
		
		public function getPrazo() {
			return $this->prazo;
		}
		
		public function setPrazo($prazo) {
			$this->prazo = $prazo;
		} 
		
		public function getConclusao() {
			return $this->conclusao;
		}
		
		public function setConclusao($conclusao) {
			$this->conclusao = $conclusao;
		}
		
		public function getLembrete() {
			return $this->lembrete;
		}
		
		public function setLembrete($lembrete) {
			$this->lembrete = $lembrete;
		} 
		
		public function getIdUsuario() {
			return $this->id_usuario;
		}
		
		public function setIdUsuario($id_usuario) {
			$this->id_usuario = $id_usuario;
		} 
	}
	
?>