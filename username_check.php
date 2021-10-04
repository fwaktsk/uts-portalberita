<?php
	require_once('db_connect.php');

	$username = $_REQUEST['username'];

	if(!empty($username)) {
		if($stmt = $db->prepare('SELECT `id` FROM `accounts` WHERE `username` = :username')) {
			$stmt->bindParam(':username', $username);

			if($stmt->execute()) {
				if($stmt->rowCount())
					echo 'false';
				else
					echo 'true';
			}

			unset($stmt);
		}
	}

	unset($db);
?>