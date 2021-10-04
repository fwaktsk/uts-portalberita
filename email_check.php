<?php
	require_once('db_connect.php');

	$email = $_REQUEST['email'];

	if(!empty($email)) {
		if($stmt = $db->prepare('SELECT `id` FROM `accounts` WHERE `email` = :email')) {
			$stmt->bindParam(':email', $email);

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