<?php 

    include("../../config/config.php");
    include '../PHPMailer/class.smtp.php';
    include '../PHPMailer/class.phpmailer.php';  
    session_start();

    if (isset($_POST['action']) && $_POST['action'] == 'dangnhap') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM tai_khoan WHERE password ='$password' AND username='$username' OR email = '$username' AND password ='$password' ";
        $rs = mysqli_query($db, $sql);
        $count = mysqli_num_rows($rs);
        
        if ($count == 1) {
            $rss = mysqli_fetch_assoc($rs);

            $ten = $rss['ten'];
             
            $sql_thongtin = "SELECT * FROM thong_tin_khach_hang WHERE ten='$ten'";
            $rs_thongtin = mysqli_query($db, $sql_thongtin);
            $rss_thongtin = mysqli_fetch_assoc($rs_thongtin);
            
            if ($rss['rank'] == 1){
                $_SESSION['rank'] = $rss['rank'];
                $_SESSION['login_user'] = $rss['ten'];
                $_SESSION['sdt'] = $rss['sdt'];
                $_SESSION['dia_chi'] = $rss_thongtin['dia_chi'];
                $_SESSION['username'] = $rss['username'];
                $_SESSION['avatar_icon'] = $rss_thongtin['avatar'];
                echo $_SESSION['rank'];
            }
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'dangnhapAdmin') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM tai_khoan WHERE password ='$password' AND username='$username' OR email = '$username' AND password ='$password' ";
        $rs = mysqli_query($db, $sql);
        $count = mysqli_num_rows($rs);
        
        if ($count == 1) {
            $rss = mysqli_fetch_assoc($rs);

            $ten = $rss['ten'];
             
            $sql_thongtin = "SELECT * FROM nha_hang WHERE ten='$ten'";
            $rs_thongtin = mysqli_query($db, $sql_thongtin);
            $rss_thongtin = mysqli_fetch_assoc($rs_thongtin);

            $_SESSION['rank_admin'] = $rss['rank'];
            $_SESSION['login_admin'] = $rss['ten'];
            $_SESSION['sdt_admin'] = $rss['sdt'];
            $_SESSION['dia_chi_admin'] = $rss_thongtin['dia_chi'];
            $_SESSION['username_admin'] = $rss['username'];
            $_SESSION['avatar_icon_admin'] = $rss_thongtin['img_nhahang'];
            echo 'success';
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == 'layLaiMatKhau') {
        $email = $_POST['inp'];
        $passMoi = uniqid();
        $addPass = md5($passMoi);

        $sql = "SELECT * FROM tai_khoan WHERE email = '$email'";
		$rs = mysqli_query($db, $sql);
        $rss = mysqli_fetch_assoc($rs);

        $sql_pass = "UPDATE tai_khoan
                    SET password = '$addPass' 
                    WHERE email = '$email'";
        $rs = mysqli_query($db, $sql_pass);

        $nFrom = "BARISTA";    //mail duoc gui tu dau, thuong de ten cong ty ban
				$mFrom = 'baoc74444@gmail.com';  //dia chi email cua ban 
				$mPass = 'baobaochi123';       //mat khau email cua ban
				$nTo = 'Khách hàng đặt sân'; //Ten nguoi nhan
				$mTo =  "$email";   //dia chi nhan mail
				$mail             = new PHPMailer();
	
				$body             = "
                    <p>Mật khẩu là : $passMoi</p>
                "; // Noi dung email
	
				$title = 'Hệ thống xác nhận của Sân bóng mini';   //Tieu de gui mail
				$mail->IsSMTP();             
				$mail->CharSet  = "utf-8";
				$mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
				$mail->SMTPAuth   = true;    // enable SMTP authentication
				$mail->SMTPSecure = "ssl";   // sets the prefix to the servier
				$mail->Host       = "smtp.gmail.com";    // sever gui mail.
				$mail->Port       = 465;         // cong gui mail de nguyen
				
				// xong phan cau hinh bat dau phan gui mail
				$mail->Username   = $mFrom;  // khai bao dia chi email
				$mail->Password   = $mPass;              // khai bao mat khau
				$mail->SetFrom($mFrom, $nFrom);
				$mail->AddReplyTo('baobao631999@gmail.com', 'Admin'); //khi nguoi dung phan hoi se duoc gui den email nay
				$mail->Subject    = $title;// tieu de email 
				$mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
				$mail->AddAddress($mTo, $nTo);
	
				// thuc thi lenh gui mail 
				if($mail->Send()) {
					echo "1";
				} else {
					echo "2";
				}
    }

?>