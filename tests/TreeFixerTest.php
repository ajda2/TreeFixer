<?php

namespace Tests;

require_once "./DbTestCase.php";
require_once __DIR__ . "/../src/TreeFixer.php";

use PHPUnit\DbUnit\DataSet\IDataSet;
use TreeFixer;

class TreeFixerTest extends DbTestCase {

	/** @var TreeFixer */
	private $treeFixer;

	public function setUp(): void {
		parent::setUp();

		$this->treeFixer = new TreeFixer($this->getConnection()->getConnection());
	}

	public function test_fixTree() {
		$rootCategoryId = 1;
		$step = 0;
		$this->treeFixer->fixTree($rootCategoryId, $step);

		$queryTable = $this->getConnection()->createQueryTable(
			'tree',
			'SELECT * FROM `tree` ORDER BY `id` ASC'
		);
		$expectedTable = $this->createFlatXmlDataSet(__DIR__ . '/dataSet/treeFixed.xml')
			->getTable("tree");
		$this->assertTablesEqual($expectedTable, $queryTable);
	}

	/**
	 * Returns the test dataset.
	 *
	 * @return IDataSet
	 */
	protected function getDataSet() {
		return $this->createFlatXMLDataSet(__DIR__ . '/dataSet/tree.xml');
	}
}
