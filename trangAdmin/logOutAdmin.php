<?php
	session_start();
	if (session_destroy()) {
		header("location: ../trangAdmin/dangNhapAdmin.php");
	}
?>