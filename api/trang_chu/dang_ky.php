<?php
	include("../../config/config.php");
    session_start();
	
	if (isset($_POST['action'])) {
		if ($_POST['action'] == 'dang_ky_user') {
			$p = md5($_POST['password']);
			$ten = $_POST['ten'];
			$email = $_POST['email'];
			$sdt = $_POST['sdt'];
			$u = $_POST['u'];

            $sql_taikhoan = "INSERT INTO tai_khoan (ten,username,email,sdt,password,rank) VALUES ('$ten','$u','$email','$sdt','$p','1')";
            $sql_tai_khoan = mysqli_query($db, $sql_taikhoan);

            if($sql_tai_khoan){
                    $sql = "SELECT * FROM tai_khoan WHERE username='$u'";
			        $rs = mysqli_query($db, $sql);
                    $rss = mysqli_fetch_assoc($rs);
                    
                    $_SESSION['login_user'] = $rss['username'];
                    $_SESSION['rank'] = $rss['rank'];

                    echo "1";
                
            } else {
                echo "Đăng ký thất bại";
            }
            
		}
		if ($_POST['action'] == 'kiemtraemail') {
			$email = $_POST['email'];
			$u = $_POST['username'];
            $sdt = $_POST['sdt'];

            $rs = mysqli_query($db, "SELECT * FROM tai_khoan WHERE sdt='$sdt'");
            $rss = mysqli_query($db, "SELECT * FROM tai_khoan WHERE username ='$u'");
            $rsss = mysqli_query($db, "SELECT * FROM tai_khoan WHERE email='$email'");

                if (mysqli_num_rows($rss) == 1) {
                    echo "Tên tài khoản này đã tồn tại !!!";
                } else if (mysqli_num_rows($rsss) == 1) {
                    echo "Email này đã tồn tại!!!";
                }else if (mysqli_num_rows($rs) == 1) {
                    echo "Số điện thoại này đã tồn tại!!!";
                } else {
                    echo "hợp lệ";
                }
		}
	}
	die;
?>