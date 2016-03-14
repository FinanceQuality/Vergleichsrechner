<?php
require_once('FQVergleiche.php');





/**
 * First example: Basic request
 */

$config = array(
	/*
	 * Insert the path to your xml file here!
	 */
	'xml' => 'https://vergleiche.financequality.net/xml/LOCALE/CALCULATOR_TYPE/YOUR_HASH/',
	'user' => 'your username',
	'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();





/**
 * Second example: filtered request
 */

$config = array(
	/*
	 * You may add your preferred filters as parameters to your url string.
	 * Check out the filter documentation in your calculator backend for more information!
	 */
	'xml' => 'https://vergleiche.financequality.net/xml/LOCALE/CALCULATOR_TYPE/YOUR_HASH/?account_fee=on',
	'user' => 'your username',
	'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();
