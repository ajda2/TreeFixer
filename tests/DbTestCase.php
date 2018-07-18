<?php

namespace Tests;

use PDO;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

abstract class DbTestCase extends TestCase {

	use TestCaseTrait {
		setUp as protected traitSetUp;
	}

	// only instantiate pdo once for test clean-up/fixture load
	static private $pdo = NULL;

	// only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
	private $conn = NULL;

	protected function setUp(): void {
		parent::setUp();
		$this->traitSetUp();
	}

	final public function getConnection() {
		if ($this->conn === NULL) {
			if (self::$pdo == NULL) {
				self::$pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
			}
			$this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
		}

		return $this->conn;
	}
}