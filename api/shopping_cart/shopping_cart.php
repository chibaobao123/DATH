<?php

    session_start();
    include("../../config/config.php");

    // $db_handle = new DBController();

    if(!empty($_POST["action"])) {
        switch($_POST["action"]) {
            case "add":
                if(!empty($_POST["so_luong"])) {

                    $so_luong = (int)($_POST["so_luong"]);

                    $sql = mysqli_query($db, "SELECT * FROM mon_an WHERE ma_monan='".$_POST["ma_monan"]."'");

                    $productByCode = mysqli_fetch_assoc($sql);

                    $ma_monan = $productByCode["ma_monan"];

                    $itemArray = array( $ma_monan => array(
                                                        'ten'           =>  $productByCode["ten"], 
                                                        'ma_monan'      =>  $productByCode["ma_monan"], 
                                                        'ma_nhahang'    =>  $productByCode["ma_nhahang"],
                                                        'dia_chi'       =>  $productByCode["dia_chi"],
                                                        'so_luong'      =>  $so_luong, 
                                                        'gia_tien'      =>  $productByCode["gia_tien"],
                                                        'img_monan'     =>  $productByCode["img_monan"],
                                                    )
                                                );
                    
                    $haha=0;
                    
                    if(!empty($_SESSION["cart_item"])) {

                        if(in_array($ma_monan,array_keys($_SESSION["cart_item"]))) {

                            // $_SESSION["cart_item"][$productByCode["ma_monan"]]['so_luong'] = $_SESSION["cart_item"][$productByCode["ma_monan"]]['so_luong'] + $_POST["so_luong"];
                            
                            foreach($_SESSION["cart_item"] as $keys => $values)
                            {
                                
                                if ($ma_monan == $keys){
                                    $_SESSION["cart_item"][$keys]['so_luong'] = $_SESSION["cart_item"][$keys]['so_luong'] + $_POST["so_luong"];
                                }                        
                            }

                        } else {
                                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                                
                                }
                        
                    } else {
                        
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            break;

            case "remove":
                if(!empty($_SESSION["cart_item"])) {

                    foreach($_SESSION["cart_item"] as $key => $value) {

                            if($_POST["ma_monan"] == $key){
                                unset($_SESSION["cart_item"][$key]);
                            }

                            if(empty($_SESSION["cart_item"])){
                                unset($_SESSION["cart_item"]);
                            }
                    }
                }
            break;
            
            case "empty":
                unset($_SESSION["cart_item"]);
            break;		
        }
    }

    if(isset($_SESSION["cart_item"])){
        echo json_encode($_SESSION["cart_item"]);
    }

    if(!isset($_SESSION["cart_item"])){
        


        echo 'Hiện chưa có sản phẩm nào được chọn';


    }

    die;
?>