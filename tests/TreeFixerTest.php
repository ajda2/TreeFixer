<?php

namespace Tests;

require_once "./DbTestCase.php";

use PHPUnit\DbUnit\DataSet\IDataSet;
use TreeFixer;

use PHPUnit\DbUnit\TestCaseTrait;

class TreeFixerTest extends DbTestCase {

	use TestCaseTrait;

	public function test__construct() {

	}
//
//	public function testFixTree() {
//
//	}

	/**
	 * Returns the test dataset.
	 *
	 * @return IDataSet
	 */
	protected function getDataSet() {
		return $this->createXMLDataSet(__DIR__.'/dataSet/tree.xml');
	}
}
