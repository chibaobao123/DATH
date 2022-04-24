<?php 

    include("../../config/config.php");

	if (isset($_GET['action']) && $_GET['action'] == 'getDataOfProductsSelect') {
        $username = $_GET['username'];

        $sql = "SELECT *
                FROM don_hang 
                INNER JOIN nha_hang ON don_hang.ma_nhahang = nha_hang.ma_nhahang AND don_hang.username = '$username'";
                
        $rs = mysqli_query($db, $sql);
        $json_response = array();
		
		while($row = mysqli_fetch_assoc($rs)) {
			
			array_push($json_response, $row);
		}
		
		echo json_encode($json_response);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'chiTietSanPham') {
        $ma_monan = $_GET['ma_monan'];
        $ten = $_GET['ten'];
        $ma_nhahang = $_GET['ma_nhahang'];

        $sql = "SELECT *
                FROM don_hang 
                INNER JOIN thong_tin_khach_hang ON don_hang.ma_monan = '$ma_monan' AND don_hang.ma_nhahang = '$ma_nhahang' AND  thong_tin_khach_hang.ten = '$ten'";
                
        $rs = mysqli_query($db, $sql);
        $json_response = array();

        while($row = mysqli_fetch_assoc($rs)) {
			
			array_push($json_response, $row);
		}
		
		echo json_encode($json_response);
    }

    if (isset($_POST['action']) && $_POST['action'] == 'daNhanHang') {
        $ma_monan = $_POST['ma_monan'];
        $ma_nhahang = $_POST['ma_nhahang'];
        $ma_tinhtrang = $_POST['ma_tinhtrang'];
        $ten = $_POST['ten'];

        $sql = "UPDATE don_hang SET tinh_trang = '$ma_tinhtrang' WHERE ma_monan = '$ma_monan' AND ma_nhahang = '$ma_nhahang' AND username = '$ten'";    

        $rs = mysqli_query($db, $sql);

        if($rs) {
            echo "success";
        } else {
            echo "error";
        }
    }
    die;
?>


