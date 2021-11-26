<div class="container tongthe_sanpham_donhang py-4">
    <div class="select-button-donhang d-flex justify-content-around">
        <button class="tablinks_donhang" id="tatca">Tất cả</button>
        <button class="tablinks_donhang" id="cho_xac_nhan">Chờ xác nhận <span id="soluong_choxacnhan"></span></button>
        <button class="tablinks_donhang" id="cho_lay_hang">Chờ lấy hàng <span id="soluong_cholayhang"></span></button>
        <button class="tablinks_donhang" id="dang_giao">Đang giao <span id="soluong_danggiao"></span></button>
        <button class="tablinks_donhang" id="da_nhan">Đã nhận <span id="soluong_danhan"></span></button>
        <button class="tablinks_donhang" id="da_huy">Đã hủy <span id="soluong_dahuy"></span></button>
    </div>

    <div id="table_tatca" class="tabcontent_donhang  mt-2">
        
    </div>

    <div id="table_choxacnhan" class="tabcontent_donhang table_sanpham"></div>

    <div id="table_cholayhang" class="tabcontent_donhang table_sanpham"></div>

    <div id="table_danggiao" class="tabcontent_donhang table_sanpham"></div>

    <div id="table_danhan" class="tabcontent_donhang table_sanpham"></div>

    <div id="table_dahuy" class="tabcontent_donhang table_sanpham"></div>
</div>

<script>
    $(document).ready(function(){

        getDataOfProductsSelect();

        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent_donhang");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        document.getElementById("table_tatca").style.display = "block";
        document.getElementById("tatca").className += " border-bottom border-success font-weight-bold text-success";

        function show_donhang(btn, item) {
            // Declare all variables
            var i, tabcontent_products_nhahang, tablinks;

            // Get all elements with class="tabcontent_products_nhahang" and hide them
            tabcontent_products_nhahang = document.getElementsByClassName("tabcontent_donhang");
            for (i = 0; i < tabcontent_products_nhahang.length; i++) {
                tabcontent_products_nhahang[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks_products_nhahang = document.getElementsByClassName("tablinks_donhang");
            for (i = 0; i < tablinks_products_nhahang.length; i++) {
                tablinks_products_nhahang[i].className = tablinks_products_nhahang[i].className.replace(" border-bottom border-success font-weight-bold text-success", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(item).style.display = "block";
            document.getElementById(btn).className += " border-bottom border-success font-weight-bold text-success";
        }

        $("#tatca").click(function() {
            show_donhang("tatca","table_tatca")

        });

        $("#cho_xac_nhan").click(function() {
            show_donhang("cho_xac_nhan","table_choxacnhan")

        });

        $("#cho_lay_hang").click(function() {
            show_donhang("cho_lay_hang","table_cholayhang")

        });

        $("#dang_giao").click(function() {
            show_donhang("dang_giao","table_danggiao")

        });

        $("#da_nhan").click(function() {
            show_donhang("da_nhan","table_danhan")

        });

        $("#da_huy").click(function() {
            show_donhang("da_huy","table_dahuy")

        });

        function getDataOfProductsSelect() {
            const arr = window.location.search.substring(1).split('&');
            // console.log(arr);

            let username = arr[0].slice(9);
            // console.log(username);

            $.ajax({
                url: '../api/don_hang/don_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataOfProductsSelect',
                    username: username,
                },
                success: function(data) {
                    // console.log(data); 

                    let data_profile = $.parseJSON(data);

                    addDataOfProductsSelect(data_profile);

                    for (i = 0; i < data_profile.length; i++){

                        let show_profile = 'click_show_profile_' + i;
                        let show_sp_ten = 'show_sp_ten_' + i;

                        $(`.${show_profile}`).on('click', function() {

                            $('.thongtin_chitiet_donhang').toggle();
                            $('.tongthe_sanpham_donhang').toggle();

                            let c = $('.ten-khach-hang-navbar-hide').text();

                            let a = $(`.${show_sp_ten}`).attr('ma_monan');
                            let b = $(`.${show_sp_ten}`).attr('ma_nhahang');

                            chiTietSanPhamOrder(a, b, c);
                        })
                    }
                }
            });
        }

        function chiTietSanPhamOrder(ma_monan, ma_nhahang, ten){
            // console.log(ma_monan, ma_nhahang, ten);

            $.ajax({
                url: '../api/don_hang/don_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'chiTietSanPham',
                    ma_monan: ma_monan,
                    ma_nhahang: ma_nhahang,
                    ten: ten,
                },
                success: function(msg) {

                    let data = $.parseJSON(msg);
                    console.log(data);

                    let ship = 25000

                    let html_1 = "";
                    let html = '';
                    let tong_tien = '';

                    html += "<div class='col-3 img_sanpham text-center'>"
                    html += "<img src='../asset/img_products/" + data[0].img_monan + "'/>"
                    html += "</div>"
                    html += "<div class='col-7 '>"
                    html += "<p class='tittle_sanpham'>" + data[0].ten_monan + "</p>"
                    html += "<p class='nhahang_sanpham'>Mã nhà hàng : " + data[0].ma_nhahang + "</p>"
                    html += "<p class='soluong_sanpham'>Số lượng : " + data[0].so_luong + "</p>"
                    html += "</div>"
                    html += "<div class='col-2 gia_sanpham align-self-center'>"
                    html += "<p>" + parseInt(data[0].gia_tien).toLocaleString('vi-VN') + "</p>"
                    html += "</div>"

                    html_1 += "<div class='row'>"
                    html_1 += "<div class='col-6'>"
                    html_1 += "<div class='diachi_nguoinha'>"
                    html_1 += "<h1>Địa chỉ người nhận</h1>"
                    html_1 += "<p class='hoten_nguoinhan'>" + data[0].ten + "</p>"
                    html_1 += "<p class='hoten_nguoinhan'>" + data[0].sdt + "</p>"
                    html_1 += "<p class='hoten_nguoinhan'>" + data[0].dia_chi + "</p>"
                    html_1 += "</div>"
                    html_1 += "</div>"
                    html_1 += "<div class='col-3 text-right pb-5 align-self-center border-bottom border-light'>"
                    html_1 += "<div class='tong_tien_hang_content h-100 '>Tổng hàng tiền:</div>"
                    html_1 += "<div class='phi_van_chuyen_content h-100 '>Phí vận chuyển:</div>"
                    html_1 += "</div>"
                    html_1 += "<div class='col-3 text-right pb-5 align-self-center border-bottom border-light'>"
                    html_1 += "<div class='tong_tien_hang h-100'>" + parseInt(data[0].gia_tien).toLocaleString('vi-VN') + "</div>"
                    html_1 += "<div class='phi_van_chuyen h-100'>" + parseInt(ship).toLocaleString('vi-VN') + "</div>"
                    html_1 += "</div>"
                    html_1 += "</div>"

                    tong_tien += "<span>" + (parseInt(data[0].gia_tien) + parseInt(ship)).toLocaleString('vi-VN') + "</span>"

                    $('#chi_tiet_san_pham').html(html)
                    $("#thong_khach_hang_order").html(html_1);
                    $(".tong_tien").html(tong_tien);

                                
                }
            })

            
        }

        
        function addDataOfProductsSelect(data){
            let html = "";

            for (let i = 0; i < data.length; i++) {
                    
                html += "<div class='container table_sanpham text-light my-2'>"
                html += "<div class='row title_sanpham_order title_sanpham_order_cursor py-5 click_show_profile_" + i + "'>"

                if(data[i].img_monan == ''){
                    html += "<div class='col-3 img_sanpham text-right'><img src='https://via.placeholder.com/150'/></div>"
                } else {
                    html += "<div class='col-3 img_sanpham text-right'><img src='../asset/img_products/" + data[i].img_monan + "'/></div>"
                }

                html += "<div class='col-7 '>"
                html += "<p class='tittle_sanpham show_sp_ten_" + i + "' ma_monan='" + data[i].ma_monan + "' ma_nhahang='" + data[i].ma_nhahang + "'>" + data[i].ten_monan + "</p>"
                html += "<p>Tên nhà hàng: <strong class='show_sp_nhahang_" + i + "'>" + data[i].ten + "</strong></p>"
                html += "<p class='soluong_sanpham'>Số lượng : <span class='show_sp_soluong_" + i + "'>" + data[i].so_luong + "</span></p>"
                html += "</div>"
                html += "<div class='col-2 gia_sanpham align-self-center'>"
                html += "<p class='show_sp_giatien_" + i + "' style='display:none'>" + parseInt(data[i].gia_tien) + " </p>"
                html += "</div>"
                html += "</div>"
                html += "<div class='tongtien_sanpham d-flex justify-content-end py-2 my-2'>"
                html += "<div class='tong_tien pr-5'>Tổng tiền: <span class='tong_tien pr-5' tong_tien='" + parseInt(data[i].gia_tien) + "'>" + parseInt(data[i].gia_tien).toLocaleString('vi-VN') + "</span></div>"
                html += "</div>"
                html += "<div class='btn_lienhe_nhanhang pb-4 d-flex justify-content-end'>"
                html += "<button class='danhanhang'>Đã nhận hàng</button>"
                html += "<button class='lienhenguoiban'>Liên hệ người bán</button>"
                html += "</div>"
                html += "</div>"

                

            }

            $("#table_tatca").html(html);
        }


    });
</script>