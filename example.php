<?php
require_once('FQVergleiche.php');





/**
 * First example: Basic request
 */

$config = array(
	/*
	 * Insert the path to your xml file here!
	 */
	'xml' => 'http://sf2fqrechner.local/app_dev.php/xml/de/girokonto/1873836242aa269dd90bd24ccc4e4db9/',
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
	'xml' => 'http://sf2fqrechner.local/app_dev.php/xml/de/girokonto/1873836242aa269dd90bd24ccc4e4db9/?account_fee=on',
	'user' => 'your username',
	'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();
