<?php 

    include("../../config/config.php");

	if (isset($_GET['action']) && $_GET['action'] == 'getDataOfProductsSelect') {
        $username = $_GET['username'];

        $sql = "SELECT * FROM don_hang WHERE username = '$username'";
        $rs = mysqli_query($db, $sql);
        $json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_monan'] = $row['1'];
			$r['ten_monan'] = $row['2'];
			$r['ma_nhahang'] = $row['3'];
			$r['ten_nhahang'] = $row['4'];
			$r['dia_chi'] = $row['5'];
			$r['so_luong'] = $row['6'];
			$r['img_monan'] = $row['7'];
			$r['username'] = $row['8'];
			$r['ngay_dat'] = $row['9'];
			$r['gia_tien'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

    die;
?>