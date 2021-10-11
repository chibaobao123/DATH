<?php 

    include("../../config/config.php");

    if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang') {
        $sql = "SELECT * FROM nha_hang";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_chay') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%chay'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quan1') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%quan1'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quan3') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%quan3'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quanbinhthanh') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%quanbinhthanh'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quanphunhuan') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%quanphunhuan'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quangovap') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%quangovap'";
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