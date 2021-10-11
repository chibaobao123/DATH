<!-- Modal -->
<div class='modal fade' id='form_sua_thong_tin' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Thông tin của <?php echo $_SESSION['login_user'] ?></h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body' id='body_form_chinh_sua'>
        
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>
        <button type='button' class='btn btn-primary' id="btn_luu_chinh_sua">Lưu chỉnh sửa</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){

        getProfile_chinhsua();

        function getProfile_chinhsua() {
            var ten_khachhang = $('.ten-khach-hang-navbar-hide').text();
                // console.log(ten_khachhang);

            $.ajax({
            url: '../api/thongtin_khachhang/thongtin_khachhang.php?user='+ten_khachhang,
            type: 'GET',
            cache: false,
            data: {
                action : 'thongtin_khachhang',
                ten : ten_khachhang,
            },
            success: function(data) {
                // console.log(data);
                var data_profile = $.parseJSON(data);
                addValue(data_profile);
            }
            });
        }


        function addValue(data) {
            let html = "";
            for (let i = 0; i < data.length; i++) {
                html += "<div class='row'>"
                    html += "<div class='col'>"
                        html += "<div class='d-none' id='id_khachhang_chinhsua'>" + data[i].id + "</div>"
                        html += "<form>"
                        html += "<div class='form-group'>"
                            html += "<label class='border-bottom border-dark' for='ten_chinhsua'>Họ và tên:</label>"
                            html += "<input value='" + data[i].ten +"'type='text' class='form-control' id='ten_chinhsua' require>"
                        html += "</div>"
                        html += "</form>"
                    html += "</div>"
                    html += "<div class='col'>"
                        html += "<form>"
                        html += "<div class='form-group'>"
                            html += "<label class='border-bottom border-dark'  for='sdt_chinhsua'>Số điện thoại:</label>"
                            html += "<input value='" + data[i].sdt +"'type='text' class='form-control' id='sdt_chinhsua' require>"
                        html += "</div>"
                        html += "</form>"
                    html += "</div>"
                    html += "</div>"
                    html += "<div class='form-group'>"
                        html += "<label class='border-bottom border-dark'  for='email_chinhsua'>Email:</label>"
                        html += "<input value='" + data[i].email +"'type='text' class='form-control' id='email_chinhsua' require>"
                    html +="</div>"
                    html += "<div>"
                        html += "<label class='border-bottom border-dark mb-3'  for='email_chinhsua'>Giới tính:</label>"
                    html += "</div>"
                    html += "<div class='row text-center'>"

                        if(data[i].sex == ''){
                            html += "<div class='col'>"
                                html += "<input type='radio' id='sex_nam' name='sex' value='nam'>"
                                html += "<label for='sex_nam'>Nam</label>"
                            html += "</div>"
                            html += "<div class='col'>"
                                html += "<input type='radio' id='sex_nu' name='sex' value='nữ'>"
                                html += "<label for='sex_nu'>Nữ</label>"
                            html += "</div>"
                        } else if( data[i].sex == 'nam'){
                            html += "<div class='col'>"
                                html += "<input type='radio' id='sex_nam' name='sex' value='nam' checked>"
                                html += "<label for='sex_nam'>Nam</label>"
                            html += "</div>"
                            html += "<div class='col'>"
                                html += "<input type='radio' id='sex_nu' name='sex' value='nữ'>"
                                html += "<label for='sex_nu'>Nữ</label>"
                            html += "</div>"
                        } else if( data[i].sex == 'nữ'){
                            html += "<div class='col'>"
                                html += "<input type='radio' id='sex_nam' name='sex' value='nam'>"
                                html += "<label for='sex_nam'>Nam</label>"
                            html += "</div>"
                            html += "<div class='col'>"
                                html += "<input type='radio' id='sex_nu' name='sex' value='nữ'> checked"
                                html += "<label for='sex_nu'>Nữ</label>"
                            html += "</div>"
                        }

                    html += "</div>"
                    html += "<div class='row mt-3'>"
                    html += "<div class='col'>"
                        html += "<div class='form-group'>"
                            html += "<label class='border-bottom border-dark'  for='diachi_chinhsua'>Địa chỉ :</label>"
                            html += "<input value='" + data[i].dia_chi +"'type='text' class='form-control' id='diachi_chinhsua' require>"
                        html += "</div>"
                    html += "</div>"
                html += "</div>"
            }

            $('#body_form_chinh_sua').html(html);
        }

        $('#btn_luu_chinh_sua').on('click', function() {
            let ten = $('#ten_chinhsua').val();       
            let sdt = $('#sdt_chinhsua').val();
            let email = $('#email_chinhsua').val();
            let dia_chi = $('#diachi_chinhsua').val();
            let sex = $('input[name="sex"]:checked').val();
            let id = $('#id_khachhang_chinhsua').text(); 


            if(kiemtraten(ten) && kiemtrasdt(sdt) && kiemtraemail(email) && kiemtradiachi(dia_chi) && kiemtrasex(sex)){
                // console.log(ten,sdt,email, dia_chi, sex , id);

                $.ajax({
                    url: '../api/thongtin_khachhang/thongtin_khachhang.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        action : 'chinhsua_thongtin',
                        ten : ten,
                        sdt : sdt,
                        email : email,
                        dia_chi : dia_chi,
                        sex : sex,
                        id : id,
                    },
                    success: function(msg) {
                        console.log(msg);
                        if (msg.includes("đã tồn tại")) {
							thongbaoloi(msg);
						} else {
							thongbaotot(msg);
                            tailaitrang()
						}
                    }
                });
            }
        })

    });
</script>