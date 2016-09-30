<?php
require_once('lib/FQVergleiche.php');


/**
 * First example: Basic request
 */

$config = array(
	/*
	 * Insert the path to your xml file here!
	 */
	'xml' => 'https://vergleiche.financequality.net/xml/LOCALE/CALCULATOR_ID/',
	'user' => 'your username',
	'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();

// receive your product list for the web view
$productList = $fq->getProductList();


/**
 * Second example: filtered request
 */

$config = array(
	/*
	 * You may add your preferred filters as parameters to your url string.
	 * Check out the filter documentation in your calculator backend for more information!
	 */
	'xml' => 'https://vergleiche.financequality.net/xml/LOCALE/CALCULATOR_ID/?account_fee=on',
	'user' => 'your username',
	'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();

// receive your product list for the web view
$productList = $fq->getProductList();

?>

<ul>
	<li><a href="web/templates/girokonto.php">Template Girokonto</a></li>
	<li><a href="web/templates/tagesgeld.php">Template Tagesgeld</a></li>
	<li><a href="web/templates/festgeld.php">Template Festgeld</a></li>
</ul>
