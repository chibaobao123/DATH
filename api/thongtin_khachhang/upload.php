<?php 
	include("../../config/config.php");
    session_start();

	if (isset($_POST['action']) && $_POST['action']=='upload_name_img') {
			
		$ten = $_POST['ten'];
		$img_name = $_POST['data'];
		$path = '../'.$_POST['path'];

		$sql = "UPDATE thong_tin_khach_hang
				SET avatar='$img_name'
				WHERE ten = '$ten'";
		$rs = mysqli_query($db, $sql);

		if($rs) {
			if(file_exists($path)){
				// Remove file
				unlink($path);
				echo 'success';
			 }
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
						$img_upload_path = "../../asset/img_user/".$new_img_name;

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