<?php
	include("../../config/config.php");
    session_start();
	
	if (isset($_POST['action'])) {
		if ($_POST['action'] == 'dang_ky_user') {
			$p = md5($_POST['password']);
			$ten = trim($_POST['ten']);
			$email = trim($_POST['email']);
			$sdt = trim($_POST['sdt']);
			$u = trim($_POST['u']);
			$dia_chi = trim($_POST['dia_chi']);

            $sql_taikhoan = "INSERT INTO tai_khoan (ten,username,email,sdt,password,rank) VALUES ('$ten','$u','$email','$sdt','$p','1')";
            $sql_tai_khoan = mysqli_query($db, $sql_taikhoan);

            if($sql_tai_khoan){

                $sql_thongtin = "INSERT INTO thong_tin_khach_hang (ten,email,sdt,sex,dia_chi,avatar,rank,diem_tich_luy,so_don) VALUES ('$ten','$email','$sdt','','$dia_chi','','1','0','0')";
                $sql_thong_tin = mysqli_query($db, $sql_thongtin);

                if($sql_thong_tin){
                    $sql = "SELECT * FROM tai_khoan WHERE username='$u'";
			        $rs = mysqli_query($db, $sql);
                    $rss = mysqli_fetch_assoc($rs);
                    
                    $_SESSION['login_user'] = $rss['ten'];
                    $_SESSION['rank'] = $rss['rank'];

                    echo "1";
                }
                
            } else {
                echo "Đăng ký thất bại";
            }
            
		}
		if ($_POST['action'] == 'kiemtraemail') {
			$email = trim($_POST['email']);
			$sdt = trim($_POST['sdt']);
			$u = trim($_POST['u']);
            
            $rs = mysqli_query($db, "SELECT * FROM tai_khoan WHERE sdt='$sdt'");
            $rss = mysqli_query($db, "SELECT * FROM tai_khoan WHERE username ='$u'");
            $rsss = mysqli_query($db, "SELECT * FROM tai_khoan WHERE email='$email'");

                if (mysqli_num_rows($rss) > 0) {
                    echo "Tên tài khoản này đã tồn tại !!!";
                } else if (mysqli_num_rows($rsss) > 0) {
                    echo "Email này đã tồn tại!!!";
                }else if (mysqli_num_rows($rs) > 0) {
                    echo "Số điện thoại này đã tồn tại!!!";
                } else {
                    echo "hợp lệ";
                }
		}
	}
	die;
?>