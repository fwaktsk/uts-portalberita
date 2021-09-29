<?php
//session_start();
session_unset();
session_destroy();

header('location:userPage.php?alert=2');
?>