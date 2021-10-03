<div class="modal fade" id="form-dang-ky" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="ten_dang_ky">Họ và tên:</label>
            <input type="text" class="form-control" id="ten_dang_ky">
          </div>
          <div class="form-group">
            <label for="tai_khoan_dang_ky">Tài khoản:</label>
            <input type="text" class="form-control" id="tai_khoan_dang_ky">
          </div>
          <div class="form-group">
            <label for="email_dang_ky">Email:</label>
            <input type="text" class="form-control" id="email_dang_ky">
          </div>
          <div class="form-group">
            <label for="sdt_dang_ky">Số điện thoại:</label>
            <input type="text" class="form-control" id="sdt_dang_ky">
          </div>
          <div class="form-group">
            <label for="mat_khau_dang_ky">Mật khẩu</label>
            <input type="password" class="form-control" id="mat_khau_dang_ky">
          </div>
          <div class="form-group">
            <label for="mat_khau_dang_ky_1">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="mat_khau_dang_ky_1">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-dang-ky-form">Đăng ký</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
            $('#btn-dang-ky-form').click(function() {
                var mk1 = $("#mat_khau_dang_ky").val().trim();
                var mk2 = $("#mat_khau_dang_ky_1").val().trim();
                var sdt = $("#sdt_dang_ky").val();
                var email = $("#email_dang_ky").val();
                var ten = $("#ten_dang_ky").val();
                var u = $("#tai_khoan_dang_ky").val();

		            if (mk1 != mk2) {
                    thongbaoloi("Hai mật khẩu bạn nhập không giống nhau!!!");
                    return;
                } 

                if(kiemtraten(ten) && kiemtraemail(email) && kiemtramatkhau(mk1) && kiemtrasdt(sdt) && kiemtrausername(u)){
                    $.ajax({
                        url: "../api/trang_chu/dang_ky.php",
                        type: "POST",
                        cache: false,
                        data: {
                            action : "kiemtraemail",
                            ten : ten,
                            email : email,
                            password: mk1,
                            sdt : sdt,
                            username : u,
                        },
                        success: function(msg) {
                            console.log(msg);
                            if(msg == "Tên tài khoản này đã tồn tại !!!"){
                                thongbaoloi(msg);   

                            }else if(msg == 'Email này đã tồn tại!!!'){
                                thongbaoloi(msg);

                            } else if(msg == 'Số điện thoại này đã tồn tại!!!'){
                                thongbaoloi(msg);

                            } else if(msg == 'hợp lệ'){
                              $.ajax({
                                url: "../api/trang_chu/dang_ky.php",
                                type: "POST",
                                cache: false,
                                data: {
                                    action : "dang_ky_user",
                                    ten : ten,
                                    email : email,
                                    password: mk1,
                                    sdt : sdt,
                                    u : u,
                                },
                                success: function(msg) {
                                    thongbaotot(msg);
                                    if (msg == 'Đăng ký thất bại!!!'){
                                        thongbaoloi(msg);
                                    }
                                    if(msg == '1'){
                                      location.href = '../user/index.php';
                                    console.log("thành công")
                                    }
                                }
                              });
                            }
                          }
			              });
                }
            })
        });
</script>