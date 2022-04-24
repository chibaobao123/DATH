<div class="modal fade" id="form-dang-nhap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog pt-5 mt-5">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dang_nhap_title">Đăng nhập</h5>
        <h5 class="modal-title cap_lai_mat_khau_title d-none" id="cap_lai_mat_khau_title"><button class="btn quay_lai_dang_nhap"><i class="fas fa-arrow-left"></i></button>Cấp lại mật khẩu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form_dang_nhap'>
          <div class="form-group">
            <label class="border-bottom border-dark"  for="tai_khoan_dang_nhap">Tài khoản hoặc Email:</label>
            <input type="text" class="form-control" id="tai_khoan_dang_nhap">
          </div>
          <div class="form-group">
            <label class="border-bottom border-dark"  for="mat_khau_dang_nhap">Password</label>
            <input type="password" class="form-control" id="mat_khau_dang_nhap">
          </div>
        </form>

        <form id='form_quen_mat_khau' class='form_quen_mat_khau d-none'>
          <div class="form-group" id="cap_lai_mat_khau">
            <label class="border-bottom border-dark"  for="tai_khoan_quen_mat_khau">Email:</label>
            <input type="text" class="form-control" id="tai_khoan_quen_mat_khau" placeholder="abc@gmail.com">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-quen-mat-khau">Quên mật khẩu</button>
        <button type="button" class="btn btn-primary" id="btn-dang-nhap-form">Đăng nhập</button>
        <button type="button" class="btn btn-primary w-100 btn-cap-lai-mat-khau-form d-none" id="btn-cap-lai-mat-khau-form">Cấp lại mật khẩu</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
	
	$("#btn-dang-nhap-form").click(function() {
		
		let u = $("#tai_khoan_dang_nhap").val().trim();
		let p =  $("#mat_khau_dang_nhap").val().trim();
		
		if (u == "" || p == "") {
			thongbaoloi("Tên đăng nhập/Mật khẩu không được bỏ trống!!!");
			return;
		}
		
		$.ajax({
			url: "../api/trang_chu/dang_nhap.php",
			type: "POST",
			cache: false,
			data: {
				action: "dangnhap",
				username: u,
				password: p
			},
			success: function(msg) {
				console.log(msg)
				if (msg == "1") {
					location.href = '../user/index.php';
				} else {
					// thongbaoloi("Tên đăng nhập hoặc mật khẩu không đúng!!!!");
          thongbaoloi(msg)
				}
			}
		});
	});


  $('#btn-quen-mat-khau').on('click', function(){
    $('#btn-quen-mat-khau').addClass('d-none');
    $('#btn-dang-nhap-form').addClass('d-none');
    $('#form_dang_nhap').addClass('d-none');
    $('#dang_nhap_title').addClass('d-none');

    $('.btn-cap-lai-mat-khau-form').removeClass('d-none');
    $('.form_quen_mat_khau').removeClass('d-none');
    $('.cap_lai_mat_khau_title').removeClass('d-none');

  })

  $('.quay_lai_dang_nhap').on('click', function(){
    $('#btn-quen-mat-khau').removeClass('d-none');
    $('#btn-dang-nhap-form').removeClass('d-none');
    $('#form_dang_nhap').removeClass('d-none');
    $('#dang_nhap_title').removeClass('d-none');

    $('.btn-cap-lai-mat-khau-form').addClass('d-none');
    $('.form_quen_mat_khau').addClass('d-none');
    $('.cap_lai_mat_khau_title').addClass('d-none');

  })

  $('#btn-cap-lai-mat-khau-form').on('click', function(){
    
    let inp = $("#tai_khoan_quen_mat_khau").val();
    // console.log(inp)
    if(kiemtraemail(inp)){
      $.ajax({
        url: "../api/trang_chu/dang_nhap.php",
        type: "POST",
        cache: false,
        data: {
          action: "layLaiMatKhau",
          inp : inp,
			},
			success: function(msg) {
				// console.log(msg)
        document.getElementById("btn-cap-lai-mat-khau-form").disabled = true;
        if(msg == '1'){
          $('#cap_lai_mat_khau').html('<p class="text-center text-success" style="font-size:22px">Mật khẩu mới đã được gửi cho email của bạn</p>');
          
        }else {
          $('#cap_lai_mat_khau').html('<p class="text-center text-danger" style="font-size:22px">Lỗi hệ thống</p>')
        }
				
			}
      })
    }
    
    })

  })
	
</script>