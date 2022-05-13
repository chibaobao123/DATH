<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
    <?php
      //include("../sessions/sessionAdmin.php");
    ?>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

	<link rel="stylesheet" href="../css/layouts.css">
    <!-- css layout trang_chu.css -->
    <link rel="stylesheet" href="../css/trang_dangnhap_admin.css">
		<link rel="stylesheet" href="../library/toast/jquery.toast.min.css">


</head>
<body>
	
	
<div class="">
		<div class="container">
			<div class="modal-dialog pt-3 mt-3">
    		<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title" id="dang_nhap_title">Đăng nhập Admin</h5>
					</div>
					<div class="modal-body">
						<form id='form_dang_nhap'>
							<div class="form-group">
								<label class="border-bottom border-dark"  for="tai_khoan_dang_nhap">Tài khoản:</label>
								<input type="text" class="form-control" id="tai_khoan_dang_nhap">
							</div>
							<div class="form-group">
								<label class="border-bottom border-dark"  for="mat_khau_dang_nhap">Password</label>
								<input type="password" class="form-control" id="mat_khau_dang_nhap">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="btn-dang-nhap-form">Đăng nhập</button>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

			<script src="../library/toast/jquery.toast.min.js"></script>
			<script src="../library/pagination_js/pagination.js"></script>
			<script src="../library/validate/validation.js"></script>
	<script src="../library/thong_bao/thong_bao.js"></script>
	<script>
  $(document).ready(function() {
	
	$("#btn-dang-nhap-form").click(function() {
		
		let u = $("#tai_khoan_dang_nhap").val().trim();
		let p =  $("#mat_khau_dang_nhap").val().trim();

		let text = $('#tai_khoan_dang_nhap').val();
		let	regex = /^[a-zA-Z]+$/;

		if (u == "" || p == "") {

			thongbaoloi("Tên đăng nhập/Mật khẩu không được bỏ trống!!!");
			return;
			
		}
			if (regex.test(text)) { // true nếu text chỉ chứa ký tự alphabet thường hoặc hoa, false trong trường hợp còn lại. 
			
			} 
			else {	
				thongbaoloi("Tên đăng nhập không sử được sử dụng ký tự đặc biệt!!")
				return;
			}
		
		
		
		$.ajax({
			url: "../api/trang_chu/dang_nhap.php",
			type: "POST",
			cache: false,
			data: {
				action: "dangnhapAdmin",
				username: u,
				password: p
			},
			success: function(msg) {
				console.log(msg)
				if (msg == 'success') {
					 location.href = './index.php';
					
				} 
				if(msg = "Tên đăng nhập hoặc mật khẩu không đúng!"){
					thongbaoloi(msg);
					return;
				}
// Chỉ chấp nhận ký tự alphabet thường hoặc ký tự hoa
			
        // let arr = {       
        //   username: username,
        //   password: password,
        // }s
        // localStorage.setItem("dang_nhap", arr)  // lưu session trên cache.
				
			}
		});
	});

  })
	
</script>
</body>
</html>