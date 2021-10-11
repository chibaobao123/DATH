<?php 

    include("../../config/config.php");
    session_start();

    if (isset($_GET['action']) && $_GET['action'] == 'thongtin_khachhang') {
		$ten = trim($_GET['ten']);

        $sql = "SELECT * FROM thong_tin_khach_hang WHERE ten = '$ten'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ten'] = $row['1'];
			$r['email'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['sex'] = $row['4'];
			$r['dia_chi'] = $row['5'];
			$r['avatar'] = $row['6'];
			$r['diem_tich_luy'] = $row['8'];
			$r['so_don'] = $row['9'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }
	
	if (isset($_POST['action']) && $_POST['action'] == 'chinhsua_thongtin') {
		$ten = trim($_POST['ten']);
		$sdt = trim($_POST['sdt']);
		$email = trim($_POST['email']);
		$dia_chi = trim($_POST['dia_chi']);
		$sex = $_POST['sex'];
		$id = $_POST['id'];

		$rs = mysqli_query($db, "SELECT * FROM thong_tin_khach_hang WHERE LOWER(email)=LOWER('$email') AND id != $id");
		
		
		$trungemail = false;

		if (mysqli_num_rows($rs) == 1) {
			$email = true;
			echo "Email <b>'".$email."'</b> đã tồn tại!!!";
		}

		if (!$trungemail) {
			
			$rss = mysqli_query($db, "UPDATE thong_tin_khach_hang SET ten='$ten',email='$email',sdt='$sdt',sex='$sex',dia_chi='$dia_chi'  WHERE id = '$id'");
			if($rss){
				echo "Khách hàng <b>'".$ten."'</b> đã được cập nhật thành công!!!";
			}
		}
		
    }

	die;

?>