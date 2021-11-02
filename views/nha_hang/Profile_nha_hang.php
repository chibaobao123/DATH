<div class='container text-white my-4 py-5 px-0 profile_nhahang rounded rounded-pill' id='profile_nhahang'></div>

<script>
    $(document).ready(function() {
        const arr = window.location.search.substring(1).split('&');
        // console.log(arr);

        let id = arr[0].slice(3);
        let ma_nhahang = arr[1].slice(9);
        // console.log(id, ma_nhahang);
        
        $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                
                data: {
                    action : 'getDataNhaHangOfId',
                    id : id,
                    ma_nhahang : ma_nhahang,
                },
                success: function(data_profile) {
                    // console.log(data);
                    let data = $.parseJSON(data_profile);
                    let html = "";
                    html += "<div class='row'>";

                    for (let i = 0; i < data.length; i++) {
                        
                        let date = new Date();
                        getHours = date.getHours() ;
                        // console.log(getHours)

                        let hoursNhahang_mocua = data[i].gio_mo_cua.split(":")[0];
                        // console.log(hoursNhahang_mocua)

                        let hoursNhahang_dongcua = data[i].gio_dong_cua.split(":")[0];
                        // console.log(hoursNhahang_dongcua)

                        html +="<div class='col-5 d-flex justify-content-center align-items-center'>"
                        html +="<img class='img-avatar-profile rounded-circle' src='../asset/img_nhahang/" + data[i].img_nhahang + "' height='300' width='300'/>"
                        html +="</div>"
                        html +="<div class='col-5'>"
                        html +="<div class='px-0'>"
                        html +="<h1 class='ten_nhahang px-1 py-1'>" + data[i].ten + "</h1>"
                        html +="<h5 class='theloai_nhahang px-1 py-3 text-white-50'>" + data[i].the_loai + "</h5>"
                        html +="<div class='diachi_nhahang'><i class='fas fa-location-arrow px-1 py-3'></i> <span>" + data[i].dia_chi + "</span></div>"

                        if(hoursNhahang_mocua <= getHours && hoursNhahang_dongcua > getHours){
                            html +="<div class='thoigian_mocua'><i class='far fa-clock px-1 py-3'></i> <span class='font-weight-bold text-success pr-3'>Đang mở cửa</span> <span class='giomocua_nhahang'>" + data[i].gio_mo_cua + "</span> - <span class='giodongcua_nhahang'>" + data[i].gio_dong_cua + "</span> <i class='fas fa-exclamation-circle'></i></div>"
                        } else {
                            html +="<div class='thoigian_mocua'><i class='far fa-clock px-1 py-3'></i> <span class='font-weight-bold text-danger pr-3'>Đang đóng cửa</span> <span class='giomocua_nhahang'>" + data[i].gio_mo_cua + "</span> - <span class='giodongcua_nhahang'>" + data[i].gio_dong_cua + "</span> <i class='fas fa-exclamation-circle'></i></div>"
                        }

                        html +="<div class='giaca_nhahang'><i class='fas fa-money-bill-wave-alt px-1 py-3'></i> <span class='giathapnhat_nhahang'>" + data[i].gia_tien_thap + "đ</span> - <span class='giacaonhat_nhahang'>" + data[i].gia_tien_cao + "đ</span></div>"
                        html +="</div>"
                        html +="</div>"
                    }

                    html += "</div>";
                    // console.log(html)
                    $("#profile_nhahang").html(html);
                }
        })
    })
</script>