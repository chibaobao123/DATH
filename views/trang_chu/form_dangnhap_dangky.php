<div class="modal fade" id="form-dang-nhap-card" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="dangnhap_content_form_dangnhap_dangky">Đăng nhập</span><span class="dangky_content_form_dangnhap_dangky d-none">Đăng ký</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="btn_select_dangnhap_dangky d-flex mb-5">
            <button class="btn w-100 btn_select_dangnhap_form_dangnhap_dangky  border-dark border-left-0 border-top-0 ">Đăng nhập</button>
            <button class="btn w-100 btn_select_dangky_form_dangnhap_dangky">Đăng ký</button>
        </div>
        <div class="dang_nhap_form_dangnhap_dangky">
            <form>
            <div class="form-group">
                <label class="border-bottom border-dark"  for="tai_khoan_dang_nhap_form_dangnhap_dangky">Tài khoản hoặc Email:</label>
                <input type="text" class="form-control" id="tai_khoan_dang_nhap_form_dangnhap_dangky">
            </div>
            <div class="form-group">
                <label class="border-bottom border-dark"  for="mat_khau_dang_nhap_form_dangnhap_dangky">Password</label>
                <input type="password" class="form-control" id="mat_khau_dang_nhap_form_dangnhap_dangky">
            </div>
            </form>
        </div>
        <div class="dang_ky_form_dangnhap_dangky d-none">
            <div class="row">
            <div class="col">
                <form>
                <div class="form-group">
                    <label class="border-bottom border-dark" for="ten_dang_ky_form_dangnhap_dangky">Họ và tên:</label>
                    <input type="text" class="form-control" id="ten_dang_ky_form_dangnhap_dangky" require>
                </div>
                <div class="form-group">
                    <label class="border-bottom border-dark"  for="email_dang_ky_form_dangnhap_dangky">Email:</label>
                    <input type="text" class="form-control" id="email_dang_ky_form_dangnhap_dangky" require>
                </div>
                </form>
            </div>
            <div class="col">
                <form>
                <div class="form-group">
                    <label class="border-bottom border-dark"  for="tai_khoan_dang_ky_form_dangnhap_dangky">Tài khoản:</label>
                    <input type="text" class="form-control" id="tai_khoan_dang_ky_form_dangnhap_dangky" require>
                </div>
                <div class="form-group">
                    <label class="border-bottom border-dark"  for="sdt_dang_ky_form_dangnhap_dangky">Số điện thoại:</label>
                    <input type="text" class="form-control" id="sdt_dang_ky_form_dangnhap_dangky" require>
                </div>
                </form>
            </div>
            </div>
            <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label class="border-bottom border-dark"  for="sonha_dangky_form_dangnhap_dangky">Số nhà :</label>
                    <input type="text" class="form-control" id="sonha_dangky_form_dangnhap_dangky" placeholder="VD: 28 Nguyễn Kiệm" require>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="border-bottom border-dark"  for="quan_dangky_form_dangnhap_dangky">Quận :</label>
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
                    <label class="border-bottom border-dark"  for="phuong_dangky_form_dangnhap_dangky">Phường :</label>
                    <input type="text" class="form-control" id="phuong_dangky_form_dangnhap_dangky" placeholder="VD: Bến nghé,......" require>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col">
                <div class="form-group">
                <label class="border-bottom border-dark"  for="mat_khau_dang_ky_form_dangnhap_dangky">Mật khẩu</label>
                <input type="password" class="form-control" id="mat_khau_dang_ky_form_dangnhap_dangky" require>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                <label class="border-bottom border-dark"  for="mat_khau_dang_ky_form_dangnhap_dangky_1">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="mat_khau_dang_ky_form_dangnhap_dangky_1" require>
                </div>
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer btn_dangnhap_form_dangnhap_dangky">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-dang-nhap-form_dangnhap_dangky">Đăng nhập</button>
      </div>
      <div class="modal-footer btn_dangky_form_dangnhap_dangky d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-dang-ky-form_dangnhap_dangky">Đăng ký</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('.btn_select_dangnhap_form_dangnhap_dangky').click(function(){
            $('.dangnhap_content_form_dangnhap_dangky').removeClass('d-none');
            $('.dang_nhap_form_dangnhap_dangky').removeClass('d-none');
            $('.btn_dangnhap_form_dangnhap_dangky').removeClass('d-none');

            $('.dangky_content_form_dangnhap_dangky').addClass('d-none');
            $('.dang_ky_form_dangnhap_dangky').addClass('d-none');
            $('.btn_dangky_form_dangnhap_dangky').addClass('d-none');

            $('.btn_select_dangnhap_form_dangnhap_dangky').addClass('border-dark border-left-0 border-top-0');
            $('.btn_select_dangky_form_dangnhap_dangky').removeClass('border-dark border-right-0 border-top-0');
        })

        $('.btn_select_dangky_form_dangnhap_dangky').click(function(){
            $('.dangnhap_content_form_dangnhap_dangky').addClass('d-none');
            $('.dang_nhap_form_dangnhap_dangky').addClass('d-none');
            $('.btn_dangnhap_form_dangnhap_dangky').addClass('d-none');

            $('.dangky_content_form_dangnhap_dangky').removeClass('d-none');
            $('.dang_ky_form_dangnhap_dangky').removeClass('d-none');
            $('.btn_dangky_form_dangnhap_dangky').removeClass('d-none');

            $('.btn_select_dangky_form_dangnhap_dangky').addClass('border-dark border-right-0 border-top-0');
            $('.btn_select_dangnhap_form_dangnhap_dangky').removeClass('border-dark border-left-0 border-top-0');
        })
        
        $('#btn-dang-nhap-form_dangnhap_dangky').click(function() {
            let u = $("#tai_khoan_dang_nhap_form_dangnhap_dangky").val().trim();
            let p =  $("#mat_khau_dang_nhap_form_dangnhap_dangky").val().trim();
            
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
                        thongbaoloi(msg);
                    }
                }
            })
        })    

        $('#btn-dang-ky-form_dangnhap_dangky').click(function() {
                let mk1 = $("#mat_khau_dang_ky_form_dangnhap_dangky").val().trim();
                let mk2 = $("#mat_khau_dang_ky_form_dangnhap_dangky_1").val().trim();
                let sdt = $("#sdt_dang_ky_form_dangnhap_dangky").val();
                let email = $("#email_dang_ky_form_dangnhap_dangky").val();
                let ten = $("#ten_dang_ky_form_dangnhap_dangky").val();
                let u = $("#tai_khoan_dang_ky_form_dangnhap_dangky").val();
                let sonha_dangky = $("#sonha_dangky_form_dangnhap_dangky").val();
                let quan_dangky = $("#quan_dangky_form_dangnhap_dangky").val();
                let phuong_dangky = $("#phuong_dangky_form_dangnhap_dangky").val();
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