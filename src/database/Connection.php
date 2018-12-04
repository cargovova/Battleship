<?php

namespace src\database;

use PDO;
use PDOException;

class Connection {
	/**
	 * @var string
	 * @var string
	 * @var string
	 */
	const DB_NAME = 'battleship';
	const DB_USER_NAME = 'battleship';
	const DB_PASSWORD = 'battleship';
	
	/**
	 * @var string
	 */
	private $pdo;
	
	public function __construct() {
	}
	
	/**
	 * Функция подключения к базе данных с обработкой ошибок
	 */
	
	public function getConnection() {
		try {
			$this->pdo = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=' . 
					self::DB_NAME,
					self::DB_USER_NAME,
					self::DB_PASSWORD
					//[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXEPTION]
					);
			echo 'sucsess';
		} catch (PDOException $e) {
			echo 'Error';
		}
	}
}

