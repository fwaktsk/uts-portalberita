<?php
	$DB_HOST = 'localhost';
	$DB_NAME = 'news_portal';
	$DB_USER = 'root';
	$DB_PASS = '';

	try {
		$db = new PDO("mysql: host=$DB_HOST; dbname=$DB_NAME", $DB_USER, $DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		die("ERROR: Could not connect. " . $e->getMessage());
	}
?>