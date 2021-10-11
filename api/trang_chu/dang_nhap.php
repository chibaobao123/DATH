<?php 

    include("../../config/config.php");
    session_start();

    if (isset($_POST['action']) && $_POST['action'] == 'dangnhap') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM tai_khoan WHERE password ='$password' AND username='$username' OR email = '$username' AND password ='$password' ";
        $rs = mysqli_query($db, $sql);
        $count = mysqli_num_rows($rs);
        
        if ($count == 1) {
            $rss = mysqli_fetch_assoc($rs);
            if ($rss['rank'] == 1){
                $_SESSION['rank'] = $rss['rank'];
                $_SESSION['login_user'] = $rss['ten'];
                echo $_SESSION['rank'];
            }
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }

?>