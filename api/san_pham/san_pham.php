<?php 

    include("../../config/config.php");

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPhamOfMaSanpham') {

		$ma_nhahang = $_GET['ma_nhahang'];

        $sql = "SELECT * FROM mon_an WHERE ma_nhahang = '$ma_nhahang'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPhamOfId') {

		$id = $_GET['id'];
		$ma_monan = $_GET['ma_monan'];

        $sql = "SELECT * FROM mon_an WHERE id = '$id' AND ma_monan = '$ma_monan'";
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

    if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham') {
        $sql = "SELECT * FROM mon_an";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_chay') {
        $sql = "SELECT * FROM mon_an WHERE the_loai = '%chay%'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_banhkem') {
        $sql = "SELECT * FROM mon_an WHERE the_loai = '%banhkem%'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_tranngmieng') {
        $sql = "SELECT * FROM mon_an WHERE the_loai = '%tranngmieng%'";
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