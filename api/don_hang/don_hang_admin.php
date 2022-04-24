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


    die;
?>


