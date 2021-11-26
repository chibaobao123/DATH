<?php 

    include("../../config/config.php");

    if (isset($_POST['action']) && $_POST['action'] == 'taoDonHang') {

        $array = $_POST['array'];
        $msg = "";

        for ($x = 0; $x < count($array); $x++) {
            $sql = mysqli_query($db,"INSERT INTO don_hang 
                                        (ma_monan, 
                                        ten_monan, 
                                        ma_nhahang,
                                        so_luong,
                                        img_monan,
                                        username,
                                        ngay_dat,
                                        gia_tien,
                                        tinh_trang)

                    VALUES ('".$array[$x]['ma_monan']."',
                            '".$array[$x]['ten']."',
                            '".$array[$x]['ma_nhahang']."',
                            '".$array[$x]['so_luong']."',
                            '".$array[$x]['img_monan']."',
                            '".$array[$x]['username']."',
                            '".$array[$x]['ngay_dat']."',
                            '".$array[$x]['gia_tien']."',
                            '".$array[$x]['tinh_trang']."')");

            // echo var_dump($array[$x]['ma_monan']);


        
            if($sql){
                $msg = "success";
            } else {
                $msg = "error";
            }

            echo json_encode($msg);

        }
        
        echo json_encode($msg);
    }

    die;

?>   