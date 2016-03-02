<?php 
	//Classe que cria a conexão com o banco de dados
	abstract class ConnectionFactory {
			
		//Atributo que recebe a conexão com o banco
		private static $connection;
		
		//Método que retorna a conexão
		public static function getConnection() {
			if(!isset(self::$connection)) {
				//Criando o PDO para conexão
				self::$connection = new PDO("mysql:host=127.0.0.1:3306;dbname=taskscontrol", "root", "123456", 
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				
				//Configurações complementares
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}
			//Retornando a conexão
			return self::$connection;
		}
	}
	
?>