<?php 

    include("../config/config.php");

	
        

        $sql = "SELECT don_hang.ten_monan, don_hang.so_luong, don_hang.gia_tien, nha_hang.ten
                FROM don_hang 
                INNER JOIN nha_hang ON don_hang.ma_nhahang = nha_hang.ma_nhahang AND don_hang.username = 'baobaochi'";
        $rs = mysqli_query($db, $sql);
        $json_response = array();
		
		while($row = mysqli_fetch_assoc($rs)) {
			array_push($json_response, $row);
		}
		
		echo json_encode($json_response);

    die;
?>