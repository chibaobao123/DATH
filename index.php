<?php
	include("../config/config.php");
	session_start();

	if (!isset($_SESSION['login_user'])) {
		header("location:./trang_chu/index.php");
		die();
	};
?>