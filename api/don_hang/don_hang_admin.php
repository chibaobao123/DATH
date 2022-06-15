<?php 

    include("../../config/config.php");

	if (isset($_GET['action']) && $_GET['action'] == 'getDataOfProductsSelect') {
        $ma_nhahang = $_GET['ma_nhahang'];

        $sql = "SELECT *
                FROM don_hang 
                WHERE ma_nhahang = '$ma_nhahang'";
                
        $rs = mysqli_query($db, $sql);
        $json_response = array();
		
		while($row = mysqli_fetch_assoc($rs)) {
			
			array_push($json_response, $row);
		}
		
		echo json_encode($json_response);
    }

    // if (isset($_GET['action']) && $_GET['action'] == 'timKiemHoaDon') {
    //     $ma_nhahang = $_GET['ma_nhahang'];
    //     $val = $_GET['inp'];

    //     $sql = "SELECT *
    //             FROM don_hang 
    //             WHERE ma_nhahang = '$ma_nhahang' AND ngay_dat like '%$val%' 
    //                     OR  ma_nhahang = '$ma_nhahang' AND username like '%$val%'
    //                     OR  ma_nhahang = '$ma_nhahang' AND username like '%$val%'";
                
    //     $rs = mysqli_query($db, $sql);
    //     $json_response = array();
		
	// 	while($row = mysqli_fetch_assoc($rs)) {
			
	// 		array_push($json_response, $row);
	// 	}
		
	// 	echo json_encode($json_response);
    // }

    if (isset($_GET['action']) && $_GET['action'] == 'getDataOfProductsSelectTrangThai') {
        $ma_nhahang = $_GET['ma_nhahang'];
        $trang_thai = $_GET['trangThai'];

        if($trang_thai == ''){
            $sql = "SELECT *
            FROM don_hang 
            WHERE ma_nhahang = '$ma_nhahang'";
        } else {
            $sql = "SELECT *
                FROM don_hang 
                WHERE ma_nhahang = '$ma_nhahang' AND tinh_trang = '$trang_thai'";
        }
                  
        $rs = mysqli_query($db, $sql);
        $json_response = array();
		
		while($row = mysqli_fetch_assoc($rs)) {
			
			array_push($json_response, $row);
		}
		
		echo json_encode($json_response);
    }

    if (isset($_POST['action']) && $_POST['action'] == 'xacNhanDonHang') {
        $username = $_POST['ten'];
        $ngayDat = $_POST['ngayDat'];
        $trangThai = $_POST['trangThai'];

        $sql = "UPDATE don_hang 
                SET tinh_trang = 2
                WHERE username = '$username' AND ngay_dat = '$ngayDat' && tinh_trang = '$trangThai'";
                
        $rs = mysqli_query($db, $sql);

        if($rs){
            echo 'Xác nhận đơn hàng thành công';
        } else {
            echo 'error' ;
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'xuatDonHang') {
        $username = $_POST['ten'];
        $ngayDat = $_POST['ngayDat'];
        $trangThai = $_POST['trangThai'];

        $sql = "UPDATE don_hang 
                SET tinh_trang = 3
                WHERE username = '$username' AND ngay_dat = '$ngayDat' && tinh_trang = '$trangThai'";
                
        $rs = mysqli_query($db, $sql);

        if($rs){
            echo 'Xuất đơn thành công';
        } else {
            echo 'error' ;
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'huyDon') {
        $username = $_POST['ten'];
        $ngayDat = $_POST['ngayDat'];
        $trangThai = $_POST['trangThai'];

        $sql = "UPDATE don_hang 
                SET tinh_trang = 5
                WHERE username = '$username' AND ngay_dat = '$ngayDat' && tinh_trang = '$trangThai'";
                
        $rs = mysqli_query($db, $sql);

        if($rs){
            echo 'Đơn đã được hủy';
        } else {
            echo 'error' ;
        }
    }

    die;
?>


