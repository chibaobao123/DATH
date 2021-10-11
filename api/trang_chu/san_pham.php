<?php 

    include("../../config/config.php");

    if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham') {
        $sql = "SELECT * FROM san_pham";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ten'] = $row['1'];
			$r['sdt'] = $row['2'];
			$r['dia_chi'] = $row['3'];
			$r['img_nhahang'] = $row['4'];
			$r['the_loai'] = $row['5'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_chay') {
        $sql = "SELECT * FROM san_pham WHERE the_loai = '%chay'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ten'] = $row['1'];
			$r['sdt'] = $row['2'];
			$r['dia_chi'] = $row['3'];
			$r['img_nhahang'] = $row['4'];
			$r['the_loai'] = $row['5'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_banhkem') {
        $sql = "SELECT * FROM san_pham WHERE the_loai = '%banhkem'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ten'] = $row['1'];
			$r['sdt'] = $row['2'];
			$r['dia_chi'] = $row['3'];
			$r['img_nhahang'] = $row['4'];
			$r['the_loai'] = $row['5'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_tranngmieng') {
        $sql = "SELECT * FROM san_pham WHERE the_loai = '%tranngmieng'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ten'] = $row['1'];
			$r['sdt'] = $row['2'];
			$r['dia_chi'] = $row['3'];
			$r['img_nhahang'] = $row['4'];
			$r['the_loai'] = $row['5'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	die;

?>