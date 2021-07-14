<?php

namespace App\Manager;

use PDO;
use PDOException;
use LogicException;

final class Database {

	private $pdo;
	private static $instance = null;

	private function __construct() {
		try {
			$this->pdo = new PDO('mysql:host='.$_ENV['HOST'].'; dbname='.$_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		} catch(PDOException $error) {
			echo $error->getMessage();
		}
	}

	final public static function getInstance() {
		if(!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __clone() {
		throw new LogicException('Interdit de cloner ! ');
	}

	public function __wakeup() {
		throw new LogicException('Interdit de faire des instances en désérialisant ! ');
	}


	public function pdo() {
		return $this->pdo;
	}
}