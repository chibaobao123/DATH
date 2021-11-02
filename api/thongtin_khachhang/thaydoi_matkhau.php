<?php 

    include("../../config/config.php");

    if (isset($_POST['action']) && $_POST['action'] == 'kiemTraMatKhau') {
        $mk_cu = md5($_POST['mk_cu']);
        $mk_moi = md5($_POST['mk_moi']);
        $username = $_POST['username'];

        $sql = "SELECT * FROM tai_khoan WHERE username = '$username'";
		$rs = mysqli_query($db, $sql);
        $rss = mysqli_fetch_assoc($rs);

        if ($rss['password'] == $mk_cu && $rss['password'] != $mk_moi) {
            echo "success";
        } else if ($rss['password'] != $mk_cu) {
            echo "sai mật khẩu !!!";
        } else if ($rss['password'] == $mk_moi) {
            echo "Mật khẩu mới trùng với mật khẩu củ !!!";
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'luuMatKhauMoi') {
        $mk_moi = md5($_POST['mk_moi']);
        $username = $_POST['username'];

        $sql = "UPDATE tai_khoan SET password = '$mk_moi' WHERE username = '$username'";
		$rs = mysqli_query($db, $sql);

        if($rs){
            session_start();
            if (session_destroy()) {
                echo "Thay đổi mật khẩu thành công";
            }
        }
    }

    die;

?>    