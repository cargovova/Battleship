<?php

namespace src\database;

use PDO;
use PDOException;

class Connection {
	/**
	 *
	 * @var string
	 * @var string
	 * @var string
	 */
	const DB_NAME = 'battleship';
	const DB_USER_NAME = 'battleship';
	const DB_PASSWORD = 'battleship';
	const INSERT_INTO = 'INSERT INTO';
	const UPDATE = 'UPDATE';
	const SELECT_FROM = 'SELECT FROM';
	const DELETE = 'DELETE';
	/**
	 *
	 * @var object
	 */
	private static $connection;

	/**
	 * Функция подключения к базе данных с обработкой ошибок
	 */
	private function getConnection () {
		try {
			if (! isset (self::$connection)) { // !(if null that false)
				self::$connection = new PDO ('pgsql:host=127.0.0.1;port=5432;dbname=' .
						self::DB_NAME,
						self::DB_USER_NAME,
						self::DB_PASSWORD,
						array (PDO::ATTR_ERRMODE => true)); // постоянные соединения
				    // => PDO::ERRMODE_EXEPTION]
				self::$connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			// return self::$connection;
			echo 'sucsess';
		} catch (PDOException $e) {
			echo $e->getMessage ();
		}
	}

	/**
	 * Хелпер.
	 *
	 * @param string $tableName
	 * @param string $operator
	 * @param integer $row
	 * @param integer $column
	 * @param string $state
	 * @return boolean
	 */
	private function sqlExecute ($tableName, $operator, $row, $column, $state) {
		self::getConnection ();
		$state ? $state = 'true' : $state = 'false'; // PostgreSQL not working with booleans in down register
		if (isset ($state)) {
			$sqlQuery = "$operator $tableName VALUES ($row, $column, $state);";
			self::$connection->query($sqlQuery);
		} else {
			$sqlQuery = "$operator $tableName VALUES ($row, $column);";
			self::$connection->query($sqlQuery);
		}
	}

	public function insertInto ($tableName, $row, $column, $state) {
		self::sqlExecute ($tableName, self::INSERT_INTO, $row, $column, $state);
	}

	public function update ($tableName, $row, $column, $state) {
		self::sqlExecute ($tableName, self::UPDATE, $row, $column, $state);
	}

	public function selectFrom ($tableName, $row, $column, $state) {
		self::sqlExecute ($tableName, self::SELECT_FROM, $row, $column, $state);
	}

	public function delete ($tableName, $row, $column, $state) {
		self::sqlExecute ($tableName, self::DELETE, $row, $column, $state);
	}

	private function __construct () {
	}
	private function __clone () {
	}
	private function __wakeup () {
	}
}