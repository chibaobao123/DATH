<?php 

    include("../../config/config.php");

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHangOfId') {

		$id = $_GET['id'];
		$ma_nhahang = $_GET['ma_nhahang'];

        $sql = "SELECT * FROM nha_hang WHERE id = '$id' AND ma_nhahang = '$ma_nhahang'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }


    if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang') {
        $sql = "SELECT * FROM nha_hang";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_chay') {
        $sql = "SELECT * FROM nha_hang WHERE the_loai LIKE '%chay%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quan1') {
        $sql = "SELECT * FROM nha_hang WHERE dia_chi LIKE '%quan 1%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quan3') {
        $sql = "SELECT * FROM nha_hang WHERE dia_chi LIKE '%quan 3%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quanbinhthanh') {
        $sql = "SELECT * FROM nha_hang WHERE dia_chi LIKE '%quan binh thanh%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quanphunhuan') {
        $sql = "SELECT * FROM nha_hang WHERE dia_chi LIKE '%quan phu nhuan%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	if (isset($_GET['action']) && $_GET['action'] == 'getDataNhaHang_quangovap') {
        $sql = "SELECT * FROM nha_hang WHERE dia_chi LIKE '%quan go vap%'";
		$rs = mysqli_query($db, $sql);
		$json_response = array();
		
		while($row = mysqli_fetch_row($rs)) {
			$r['id'] = $row['0'];
			$r['ma_nhahang'] = $row['1'];
			$r['ten'] = $row['2'];
			$r['sdt'] = $row['3'];
			$r['dia_chi'] = $row['4'];
			$r['img_nhahang'] = $row['5'];
			$r['the_loai'] = $row['6'];
			$r['gio_mo_cua'] = $row['7'];
			$r['gio_dong_cua'] = $row['8'];
			$r['gia_tien_thap'] = $row['9'];
			$r['gia_tien_cao'] = $row['10'];
			array_push($json_response, $r);
		}
		
		echo json_encode($json_response);
    }

	die;

?>    