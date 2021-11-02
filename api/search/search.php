<?php

    include("../../config/config.php");

	if (isset($_GET['action']) && $_GET['action'] == 'search') {

		$val = $_GET['val'];
		
        $sql = "SELECT * FROM mon_an WHERE ten  LIKE '%$val%' OR the_loai LIKE '%$val%' OR dia_chi LIKE '%$val%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_monan'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['gia_tien'] = $row['3'];
			$r['img_monan'] = $row['4'];
			$r['ma_nhahang'] = $row['5'];
			$r['dia_chi'] = $row['6'];
			$r['danh_gia'] = $row['7'];
			$r['the_loai'] = $row['8'];
			$r['da_ban'] = $row['9'];
			$r['tinh_trang'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

    die;

?>