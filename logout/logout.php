<?php
	session_start();
	if (session_destroy()) {
		header("location: ../trang_chu/index.php");
	}
?>