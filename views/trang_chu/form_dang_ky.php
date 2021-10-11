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
        <div class="row">
          <div class="col">
            <form>
              <div class="form-group">
                <label class="border-bottom border-dark" for="ten_dang_ky">Họ và tên:</label>
                <input type="text" class="form-control" id="ten_dang_ky" require>
              </div>
              <div class="form-group">
                <label class="border-bottom border-dark"  for="email_dang_ky">Email:</label>
                <input type="text" class="form-control" id="email_dang_ky" require>
              </div>
            </form>
          </div>
          <div class="col">
            <form>
              <div class="form-group">
                <label class="border-bottom border-dark"  for="tai_khoan_dang_ky">Tài khoản:</label>
                <input type="text" class="form-control" id="tai_khoan_dang_ky" require>
              </div>
              <div class="form-group">
                <label class="border-bottom border-dark"  for="sdt_dang_ky">Số điện thoại:</label>
                <input type="text" class="form-control" id="sdt_dang_ky" require>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            <div class="form-group">
                <label class="border-bottom border-dark"  for="sonha_dangky">Số nhà :</label>
                <input type="text" class="form-control" id="sonha_dangky" placeholder="VD: 28 Nguyễn Kiệm" require>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
                <label class="border-bottom border-dark"  for="quan_dangky">Quận :</label>
                <select id="quan_dangky">
                  <option value="--">--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="Gò Vâp">Gò Vấp</option>
                  <option value="Bình thạnh">Bình thạnh</option>
                  <option value="Bình Tân">Bình Tân</option>
                  <option value="Phú Nhuận">Phú Nhuận</option>
                  <option value="Tân Bình">Tân Bình</option>
                  <option value="Tân Phú">Tân Phú</option>
                  <option value="Thủ Đức">Thủ Đức</option>
                </select>
            </div>
          </div>
          <div class="col-4 tabcontent">
            <div class="form-group">
                <label class="border-bottom border-dark"  for="phuong_dangky">Phường :</label>
                <input type="text" class="form-control" id="phuong_dangky" placeholder="VD: Bến nghé,......" require>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label class="border-bottom border-dark"  for="mat_khau_dang_ky">Mật khẩu</label>
              <input type="password" class="form-control" id="mat_khau_dang_ky" require>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label class="border-bottom border-dark"  for="mat_khau_dang_ky_1">Nhập lại mật khẩu</label>
              <input type="password" class="form-control" id="mat_khau_dang_ky_1" require>
            </div>
          </div>
        </div>
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
                let mk1 = $("#mat_khau_dang_ky").val().trim();
                let mk2 = $("#mat_khau_dang_ky_1").val().trim();
                let sdt = $("#sdt_dang_ky").val();
                let email = $("#email_dang_ky").val();
                let ten = $("#ten_dang_ky").val();
                let u = $("#tai_khoan_dang_ky").val();
                let sonha_dangky = $("#sonha_dangky").val();
                let quan_dangky = $("#quan_dangky").val();
                let phuong_dangky = $("#phuong_dangky").val();
                let dia_chi = sonha_dangky + ','+ ' ' + 'quận ' + quan_dangky + ',' + ' ' + 'phường ' + phuong_dangky;
                console.log(dia_chi);
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
                            u : u,
                            dia_chi: dia_chi,
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
                                    dia_chi: dia_chi,
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