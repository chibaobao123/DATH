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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPhamOfMaSanpham_hot') {

		$ma_nhahang = $_GET['ma_nhahang'];

        $sql = "SELECT * FROM mon_an WHERE ma_nhahang = '$ma_nhahang' AND danh_gia > '3'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPhamOfMaSanpham_bestseller') {

		$ma_nhahang = $_GET['ma_nhahang'];

        $sql = "SELECT * FROM mon_an WHERE ma_nhahang = '$ma_nhahang' AND da_ban > '50'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_monan') {
        $sql = "SELECT * FROM mon_an WHERE the_loai LIKE '%mon an%'";
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

	if (isset($_GET['action']) && $_GET['action'] == 'getDataSanPham_monnuoc') {
        $sql = "SELECT * FROM mon_an WHERE the_loai LIKE '%mon nuoc%'";
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
        $sql = "SELECT * FROM mon_an WHERE the_loai LIKE '%chay%'";
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
        $sql = "SELECT * FROM mon_an WHERE the_loai LIKE '%banh kem%'";
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
        $sql = "SELECT * FROM mon_an WHERE the_loai LIKE '%tranng mieng%'";
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

	if (isset($_POST['action']) && $_POST['action'] == 'capNhatTenSanPham') {

        $arr = array($_POST['arr']);
		// $x = 0;
        $msg = "";

		// echo is_array($arr) ? 'Array' : 'not an Array';
		// echo json_encode(($arr)); 

		// $arrO = $arr[$x];
		// echo json_encode(array_keys($arr)); 
		// echo is_array($arrO['ten']) ? 'Array' : 'not an Array';


		if($arr != ''){
			for ($x = 0; $x < count($arr); $x++) {
				$ten = $arr[$x]['ten'];
				$gia = $arr[$x]['gia'];
				$the_loai = $arr[$x]['the_loai'];
				$ma_monan = $arr[$x]['ma_monan'];

				$sql = mysqli_query($db,"UPDATE mon_an 
										SET ten = '$ten', 
											gia_tien = '$gia', 
											the_loai = '$the_loai' 
										WHERE ma_monan = '$ma_monan'");
				if($sql){
					echo $msg = "success";
				} else {
					echo $msg = "error";
				}
			}
		}
    } 

	if(isset($_POST['action']) && $_POST['action'] == 'themSanPham'){
		$arr = $_POST['arr'];
        $ma_monan = uniqid();
        

		// echo is_array($arr) ? 'Array' : 'not an Array';
		// echo json_encode(($arr)); 

		// $arrO = $arr[$x];
		// echo json_encode(array_keys($arr)); 
		// echo is_array($arrO['ten']) ? 'Array' : 'not an Array';


		if($arr != ''){
			
				$ten = $arr[0];
				$gia = $arr[1];
				$the_loai = $arr[2];
				$ma_nhahang = $arr[3];
				$ma_monan = $ma_nhahang."_".$ma_monan;

				$sql = mysqli_query($db,"INSERT INTO mon_an (ma_monan,ten,gia_tien,img_monan,ma_nhahang,dia_chi,danh_gia,the_loai,da_ban,tinh_trang)
										VALUES ('$ma_monan','$ten','$gia','','$ma_nhahang','',0,'$the_loai',0,1) ");
					if($sql){
						echo $ma_monan;
					} else {
						echo "error";
					}
			
		}		
	}

	if (isset($_POST['action']) && $_POST['action']=='upload_sanPham_img_admin') {
			
		$ma_monan = $_POST['ma_monan'];
		$img_name = $_POST['data'];
		$path = $_POST['path'];

		$sql = "UPDATE mon_an
				SET img_monan='$img_name'
				WHERE ma_monan = '$ma_monan'";
		$rs = mysqli_query($db, $sql);

		if($rs) {
			if(file_exists($path)){
				// Remove file
				unlink($path);
				echo 'success';
			 }


		}

	}

	if (isset($_POST['action']) && $_POST['action']=='upload_nhieu_sanpham') {
			
		$ma_nhahang = $_POST['ma_nhahang'];
		$img_id = $_POST['img_id'];
		$ten = $_POST['ten'];
		$gia = $_POST['gia'];
		$the_loai = $_POST['the_loai'];
		$img_name = $_POST['data'];
        $ma_monan = $ma_nhahang.uniqid();


		$sql = "INSERT INTO mon_an (ma_monan, ten, gia_tien, img_monan, ma_nhahang, dia_chi, danh_gia, the_loai, da_ban, tinh_trang)
				VALUES ('$ma_monan', '$ten', '$gia', '$img_name', '$ma_nhahang', '', 0, '$the_loai', 0, 1)";
		$rs = mysqli_query($db, $sql);

		if($rs) {
			echo 'success';
		} else {
			echo 'error';
		}

	}

	if (isset($_POST['action']) && $_POST['action']=='upImgSanPhamMoi') {
			
		$ma_monan = $_POST['ma_monan'];
		$img_name = $_POST['data'];

		$sql = "UPDATE mon_an
				SET img_monan='$img_name'
				WHERE ma_monan = '$ma_monan'";
		$rs = mysqli_query($db, $sql);

		if($rs) {
				echo 'success';
		}

	}

	# check if image sent
	if (isset($_FILES['my_image'])) {
			# getting image data and store them in var
			$img_name = $_FILES['my_image']['name'];
			$img_size = $_FILES['my_image']['size'];
			$tmp_name = $_FILES['my_image']['tmp_name'];
			$error    = $_FILES['my_image']['error'];

			# if there is not error occurred while uploading
			if ($error === 0) {
				if ($img_size > 6000000) {
					# error message
					$em = "Sorry, your file is too large.";

					/** printing out php array and converting it into JSON format **/

					echo json_encode($em);
					exit();
				} else {
					# get image extension store it in var
					$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

					/** convert the image extension into lower and store it in var **/
					$img_ex_lc = strtolower($img_ex);

					/** crating array that stores allowed to upload image extensions.**/
					$allowed_exs = array("jpg", "jpeg", "png");

					/** check if the the image extension is present in $allowed_exs array**/
					if (in_array($img_ex_lc, $allowed_exs)) {
						/** renaming the image name with with random string **/
						$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

						# crating upload path on root directory
						$img_upload_path = "../../asset/img_products/".$new_img_name;

						# move uploaded image to 'uploads' folder
						move_uploaded_file($tmp_name, $img_upload_path);

				
						
						# response array
						$res = array('error' => 0, 'src'=> $new_img_name);

						$_SESSION['avatar_icon'] = $new_img_name;

						echo json_encode($new_img_name);
						exit();
			

					} else {
						# error message
						$em = "You can't upload files of this type";

						/** printing out php array and converting it into JSON format**/

						echo json_encode($em);
						exit();
			
					}
				}
			} else {
				# error message
				$em = "unknown error occurred!";

				/** printing out php array and converting it into JSON format **/
				echo json_encode($em);
				exit();
			}
		
	}

	
	die;

?>