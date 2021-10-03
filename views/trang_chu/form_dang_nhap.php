<div class="modal fade" id="form-dang-nhap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog pt-5 mt-5">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="tai_khoan_dang_nhap">Tài khoản:</label>
            <input type="text" class="form-control" id="tai_khoan_dang_nhap">
          </div>
          <div class="form-group">
            <label for="mat_khau_dang_nhap">Password</label>
            <input type="password" class="form-control" id="mat_khau_dang_nhap">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-dang-nhap-form">Đăng nhập</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
	
	$("#btn-dang-nhap-form").click(function() {
		
		var u = $("#tai_khoan_dang_nhap").val().trim();
		var p =  $("#mat_khau_dang_nhap").val().trim();
		
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
					thongbaoloi("Đăng nhập thất bại!!!");
				}
				
			}
		});
	});
})	
</script>