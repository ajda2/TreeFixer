<?php

// Example of usage

require_once './src/TreeFixer.php';

$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$database = new PDO( $dsn, $username, $password, $options );


$rootCategoryId = 1;
$step = 0;

$treeFixer = new TreeFixer( $database );
$treeFixer->fixTree($rootCategoryId, $step);
