<div class='container text-white mt-5 py-5 px-0 profile_sanpham' id='profile_sanpham'></div>
<div class='container text-white mt-2 py-3 px-0 profile_nhahang_sanpham' id='profile_nhahang_sanpham'></div>
<div class='container text-center text-white mt-2 py-3'>
    <h2>-- Một số món khác --</h2>
</div>
<div class='container mt-2 py-3 cungNhaHang_sanpham'>
    <div id="cungNhaHang_sanpham"></div>
    <div id="cungNhaHang_sanpham_paginations"></div>
</div>

<div class="modal fade" id="order_products" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        const arr = window.location.search.substring(1).split('&');
        // console.log(arr);

        let id = arr[0].slice(3);
        let ma_monan = arr[1].slice(9);
        let ma_nhahang = arr[2].slice(11);
        // console.log(id, ma_monan,ma_nhahang);

        $.ajax({
            url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                
                data: {
                    action : 'getDataSanPhamOfId',
                    id : id,
                    ma_monan : ma_monan,
                },
                success: function(data_profile) {
                    let data = $.parseJSON(data_profile);
                    // console.log(data);

                    let ten = data[0].ten;
                    let gia = parseInt(data[0].gia_tien).toLocaleString('vi-VN');
                    let img = data[0].img_monan;
                    let danh_gia = data[0].danh_gia;
                    let dia_chi = data[0].dia_chi;
                    let tinh_trang = data[0].tinh_trang;
                    // console.log(ten, gia, danh_gia, dia_chi,tinh_trang)

                    let html = "";
                    html += "<div class='row'>"
                    html += "<div class='col-5 d-flex justify-content-center align-items-center'>"
                    html += "<img class='img-avatar-profile rounded-circle' src='../asset/img_products/" + img + "' height='300' width='300'/>"
                    html += "</div>"
                    html += "<div class='col-5'>"
                    html += "<div class='px-0'>"
                    html += "<h1 class='ten_sanpham px-1 py-1'>" + ten + "</h1>"
                    html += "<h5 class='theloai_sanpham px-1 py-3 text-white'><i class='pr-2 fas fa-dollar-sign'></i>" + gia + "đ</h5>"

                    if(danh_gia == 0){
                        html += "<p class='dang_gia_sanphham m-0'> Đánh giá:"
                        html += "<span class='text-white-50 pl-3'>"
                        html += "Chưa được đánh giá <i class='fas fa-exclamation-circle'></i>"
                        html += "</span>"
                        html += "</p>"
                    } else if (danh_gia == 1) {
                        html += "<p class='dang_gia_sanphham m-0'> Đánh giá:"
                        html += "<span class='text-warning pl-3'>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "</span>"
                        html += "</p>"
                    } else if (danh_gia == 2){
                        html += "<p class='dang_gia_sanphham m-0'> Đánh giá:"
                        html += "<span class='text-warning pl-3'>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "</span>"
                        html += "</p>"
                    } else if (danh_gia == 3){
                        html += "<p class='dang_gia_sanphham m-0'> Đánh giá:"
                        html += "<span class='text-warning pl-3'>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "</span>"
                        html += "</p>"
                    } else if (danh_gia == 4){
                        html += "<p class='dang_gia_sanphham m-0'> Đánh giá:"
                        html += "<span class='text-warning pl-3'>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='far fa-star'></i>"
                        html += "</span>"
                        html += "</p>"
                    } else if (danh_gia == 5){
                        html += "<p class='dang_gia_sanphham m-0'> Đánh giá:"
                        html += "<span class='text-warning pl-3'>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "<i class='fas fa-star'></i>"
                        html += "</span>"
                        html += "</p>"
                    }
                    


                    html += "<p class='diachi_sanpham m-0 px-1 pt-2'>"
                    html += "<i class='fas fa-location-arrow pl-1 pr-3 py-3'></i>"
                    html += "<span >" + dia_chi + "</span>"
                    html += "</p>"
                    html += "<p class='diachi_sanpham m-0 px-1 pt-2'>Tình trạng:"

                    if(tinh_trang == 1) {
                        html += "<i class='fas fa-circle text-success pl-3 pr-1 py-3'></i>"
                        html += "<span class='text-success font-weight-bold'>Hiện còn</span>"
                    } else if (tinh_trang == 0) {
                        html += "<i class='fas fa-circle text-danger pl-3 pr-1 py-3'></i>"
                        html += "<span class='text-danger font-weight-bold'>Tạm hết</span>"
                    }

                    html += "</p>"
                    html += "<button type='button' class='btn btn-primary mt-3 w-100' data-toggle='modal' data-target='#order_products'><i class='fas fa-shopping-cart'></i></button>"
                    html += "</div>"
                    html += "</div>"
                    html += "</div>"

                    $("#profile_sanpham").html(html);

                }
        })

        $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                
                data: {
                    action : 'getDataNhaHangOfMaNhaHang',
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

                        html +="<div class='col-3 d-flex justify-content-center align-items-center'>"
                        html +="<img class='img-avatar-profile rounded-circle' src='../asset/img_nhahang/" + data[i].img_nhahang + "' height='150' width='150'/>"
                        html +="</div>"
                        html +="<div class='col'>"
                        html +="<h4>" + data[i].ten + "</h4>"
                        if(hoursNhahang_mocua <= getHours && hoursNhahang_dongcua > getHours){
                            html +="<div class='thoigian_mocua'><i class='far fa-clock px-1 py-3'></i> <span class='font-weight-bold text-success pr-3'>Đang mở cửa</span> <span class='giomocua_nhahang'>" + data[i].gio_mo_cua + "</span> - <span class='giodongcua_nhahang'>" + data[i].gio_dong_cua + "</span> <i class='fas fa-exclamation-circle'></i></div>"
                        } else {
                            html +="<div class='thoigian_mocua'><i class='far fa-clock px-1 py-3'></i> <span class='font-weight-bold text-danger pr-3'>Đang đóng cửa</span> <span class='giomocua_nhahang'>" + data[i].gio_mo_cua + "</span> - <span class='giodongcua_nhahang'>" + data[i].gio_dong_cua + "</span> <i class='fas fa-exclamation-circle'></i></div>"
                        }

                        html +="<div class='giaca_nhahang'><i class='fas fa-money-bill-wave-alt px-1 py-3'></i> <span class='giathapnhat_nhahang'>" + data[i].gia_tien_thap + "đ</span> - <span class='giacaonhat_nhahang'>" + data[i].gia_tien_cao + "đ</span></div>"
                        html +="</div>"
                    }

                    html += "</div>";
                    // console.log(html)
                    $("#profile_nhahang_sanpham").html(html);
                }
        })

        $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                
                data: {
                    action : 'getDataSanPhamOfMaSanpham',
                    ma_nhahang : ma_nhahang,
                },
                success: function(data_profile) {
                    // console.log(data);
                    let data = $.parseJSON(data_profile);
                    $("#cungNhaHang_sanpham_paginations").pagination({
                        dataSource: data,
                        pageSize: 12,
                        ulClassName: 'd-flex justify-content-center ul_btn_paginations p-0 text-light',
                        activeClassName: 'li_btn_paginations_active',
                        autoHidePrevious: true,
                        autoHideNext: true,
                        showPrevious: true,
                        showNext: true,
                        callback: function(data, pagination) {
                            // template method of yourself
                             var html = addDatacungNhaHangProductsToCard(data);
                            // console.log(html);

                            $("#cungNhaHang_sanpham").html(html);
                        }
                    })
                }
        })

        function addDatacungNhaHangProductsToCard(data){
            let html = "";

            html += "<div class='row'>"

            for(let i = 0; i < data.length; i++){
                html += "<div class='col-2 item_card_trangchu'>"
                html += "<div class='card'>"
                html += "<img src='../asset/img_products/" + data[i].img_monan + "' class='card-img-top' alt='../asset/img_products/" + data[i].img_monan + "'>"
                html += "<div class='card-body'>"

                if(data[i].ten.length > 12){
                    html += "<p><b>" + data[i].ten.slice(0,12) + " ..." + "</b></p>"
                }else {
                    html += "<p><b>" + data[i].ten + "</b></p>"
                }

                html += "<p><small class='card-text'>" + (data[i].dia_chi).slice(0,12) + "..." + "</small></p>"
                html += "<div class='d-flex mt-3'>"
                html += "<a type='button' class='w-25 p-1 btn btn-primary mr-1'><i class='fas fa-cart-plus'></i></a>"
                html += "<a type='button' class='w-75 text-white btn btn-primary' style='font-size:0.7rem'>Xem chi tiết</a>"
                html += "</div>"
                html += "</div>"
                html += "</div>"
                html += "</div>"
            }

            html += "</div>"

            return html;
        }


    })
</script>