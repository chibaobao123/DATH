<?php
	include("../config/config.php");
	session_start();

	if (!isset($_SESSION['login_admin'])) {
		header("location:../trangAdmin/dangNhapAdmin.php");
	};

?>