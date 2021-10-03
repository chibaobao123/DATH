<?php
	include("../config/config.php");
	session_start();

	if (isset($_SESSION['login_user'])) {
		if($_SESSION['rank'] == 1) {
			header("location:../user/index.php");
		} 
        // else {
		// 	header("location:../trang_chu/index.php.php");
		// }
	};

?>