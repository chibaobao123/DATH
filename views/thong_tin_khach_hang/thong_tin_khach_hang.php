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

                    let data_profile = sapXep($.parseJSON(data));
                    // console.log(data_profile)

                    let tat_ca = addDataOfProductsSelect(data_profile);
                    // let cho_xac_nhan = addDataOfProductsSelect(data_profile.filter(sp => sp.trangThai == 1))
                    // let cho_lay_hang = addDataOfProductsSelect(data_profile.filter(sp => sp.trangThai == 2))
                    // let dang_giao = addDataOfProductsSelect(data_profile.filter(sp => sp.trangThai == 3))
                    // let da_nhan = addDataOfProductsSelect(data_profile.filter(sp => sp.trangThai == 4))
                    // let da_huy = addDataOfProductsSelect(data_profile.filter(sp => sp.trangThai == 5))

                    $("#table_tatca").html(tat_ca);
                    $("#table_choxacnhan").html(cho_xac_nhan);
                    $("#table_cholayhang").html(cho_lay_hang);
                    $("#table_danggiao").html(dang_giao);
                    $("#table_danhan").html(da_nhan);
                    $("#table_dahuy").html(da_huy);
                }
            });
        }


        

        
    function addDataOfProductsSelect(data){
        console.log(data)    
        let html = "";

        for (let i of data) {
                
            html += "<div class='container table_sanpham text-light my-2'>"
            html += "<div class='row title_sanpham_order title_sanpham_order_cursor py-5' onclick=chiTietSanPhamOrder('" + i.date + "','" + i.ma_nhahang + "','" + i.name + "')>"

            if(i.img_monan == ''){
                html += "<div class='col-3 img_sanpham text-right'><img src='https://via.placeholder.com/150'/></div>"
            } else {
                html += "<div class='col-3 img_sanpham text-right'><img src='../asset/img_nhahang/" + i.img + "'style='height:100%;width:100%;'/></div>"
            }

            html += "<div class='col-7 '>"
            html += "<p class='tittle_sanpham' >" + i.ten_nhahang + "</p>"
            html += "<p>Địa chỉ của hàng: <strong>" + i.dia_chi + "</strong></p>"
            html += "<p>Số điện thoại của hàng: <strong>" + i.sdt + "</strong></p>"
            html += "<p>Người nhận: <strong>" + i.name + "</strong></p>"
            html += "<p>Ngày đặt hàng: <strong>" + i.date + "</strong></p>"
            html += "<p class='soluong_sanpham'>Số lượng : <span class='show_sp_soluong_" + i + "'>" + i.data.length + "</span></p>"
            html += "</div>"
            html += "</div>"

            

        }

        // $("#table_tatca").html(html);
        return html;
    }


    });

    function chiTietSanPhamOrder(date, nhahang, user){
            // console.log(ma_monan, ma_nhahang, ten);
            $('.thongtin_chitiet_donhang').toggle();
            $('.tongthe_sanpham_donhang').toggle();

            let ten = $('.ten-khach-hang-navbar-hide').text();

            $.ajax({
                url: '../api/don_hang/don_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'chiTietSanPham',
                    ten,
                    date,
                    nhahang,
                    user
                },
                success: function(msg) {
                    // console.log(msg);

                    let data = $.parseJSON(msg);
                    console.log(data);

                    let ship = 25000

                    let html_1 = "";
                    let html = '';
                    let tong_tien = '';
                    let trangThai = '';
                    let gia_tien = 0;

                    for(let i of data) {
                        html += "<div class='col-3 img_sanpham text-center'>"
                        html += "<img src='../asset/img_products/" + i.img_monan + "'/>"
                        html += "</div>"
                        html += "<div class='col-7 '>"
                        html += "<p class='tittle_sanpham'>" + i.ten_monan + "</p>"
                        html += "<p class='nhahang_sanpham'>Mã nhà hàng : " + i.ma_nhahang + "</p>"
                        html += "<p class='soluong_sanpham'>Số lượng : " + i.so_luong + "</p>"
                        html += "</div>"
                        html += "<div class='col-2 gia_sanpham align-self-center'>"
                        html += "<p>" + parseInt(i.gia_tien).toLocaleString('vi-VN') + "</p>"
                        html += "</div>"
                    }


                    let tinh_trang = '';
                    console.log(data[0].tinh_trang)
                    switch (Number(data[0].tinh_trang)){
                        case 1:
                            tinh_trang = `<div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-receipt rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-check rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-shipping-fast rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-download rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-star rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>`;
                            break;
                        case 2:
                            tinh_trang = `<div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-receipt rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-check rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-shipping-fast rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-download rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-star rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>`;
                            break;
                        case 3:
                            tinh_trang = `<div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-receipt rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-check rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-shipping-fast rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-download rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-star rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>`;
                            break;
                        case 4:
                            tinh_trang = `<div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-receipt rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-check rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-shipping-fast rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-download rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid #6c757d'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-star rounded-circle p-4 text-secondary' style='border: 5px solid #6c757d; font-size:2rem;'></i>
                                    </div>
                                </div>`;
                            break;
                        case 5:
                            tinh_trang = `<div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-receipt rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-check rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-shipping-fast rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-download rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>

                                <div class='w-100' style='border-top: 5px solid green'></div>

                                <div class='don_hang_icon_layout'>
                                    <div class='don_hang_icon'>
                                        <i class='fas fa-star rounded-circle p-4 text-success' style='border: 5px solid green; font-size:2rem;'></i>
                                    </div>
                                </div>`;
                            break;
                    }



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

                    for(let i of data) {
                        gia_tien += Number(i.gia_tien)
                    }
                    html_1 += "<div class='tong_tien_hang h-100'>" + parseInt(gia_tien).toLocaleString('vi-VN') + "</div>"


                    html_1 += "<div class='phi_van_chuyen h-100'>" + parseInt(ship).toLocaleString('vi-VN') + "</div>"
                    html_1 += "</div>"
                    html_1 += "</div>"
                    
                    tong_tien += "<span>" + (parseInt(gia_tien) + parseInt(ship)).toLocaleString('vi-VN') + "</span>"

                    $('#chi_tiet_san_pham').html(html)
                    $("#thong_khach_hang_order").html(html_1);
                    $(".tong_tien").html(tong_tien);
                    $('#tinhTrangDonHang').html(tinh_trang)
                                
                }
            })

            
    }

    function daNhanHang(ma_monan,ma_nhahang) {
        let ten = $('.username-khach-hang-navbar-hide').text();
        let ma_tinhtrang = 4;
        // console.log(ma_monan, ma_nhahang, ten, ma_tinhtrang);


        $.ajax({
                url: '../api/don_hang/don_hang.php',
                type: 'POST',
                cache: false,
                data: {
                    action : 'daNhanHang',
                    ma_monan: ma_monan,
                    ma_nhahang: ma_nhahang,
                    ma_tinhtrang : ma_tinhtrang,
                    ten: ten,
                },
                success: function(msg) {    
                    console.log(msg);
                    if(msg == "success"){
                        alert('Xác nhận thành công');
                        getDataOfProductsSelect();
                    }else{
                        alert('Lỗi hệ thống')
                    }
                }
            })

    }

    
</script>

