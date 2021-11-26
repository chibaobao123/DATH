<div class="py-5">
    <div class="btn_choose_kindof_products">
        <h3 class="text-light d-inline">Các loại món ăn</h3>
        <button class="btn-monan-tatca tablinks_products_monan" id="btn-monan-tatca">Tất cả</button>
        <button class="btn-monan-chay tablinks_products_monan" id="btn-monan-doan">Đồ ăn</button>
        <button class="btn-monan-quan1 tablinks_products_monan" id="btn-monan-douong">Đồ uống</button>
        <button class="btn-monan-chay tablinks_products_monan" id="btn-monan-chay">Món chay</button>
        <button class="btn-monan-quan1 tablinks_products_monan" id="btn-monan-banhkem">Bánh kem</button>
        <button class="btn-monan-quan3 tablinks_products_monan" id="btn-monan-trangmieng">Tráng miệng</button>

    </div>
</div>

<div class="tabcontent_products_monan" id="tatca_monan_tatca">
    <div id="tatca_monan_tatca_body" style='height:1100px'></div>
    <div id="tatca_monan_paginations"></div>
</div>

<div class="tabcontent_products_monan" id="doan_monan_doan">
    <div id="doan_monan_doan_body" style='height:1100px'></div>
    <div id="doan_monan_paginations"></div>
</div>
<div class="tabcontent_products_monan" id="douong_monan_douong">
    <div id="douong_monan_douong_body" style='height:1100px'></div>
    <div id="douong_monan_paginations"></div>
</div>
<div class="tabcontent_products_monan" id="chay_monan_chay">
    <div id="chay_monan_chay_body" style='height:1100px'></div>
    <div id="chay_monan_paginations"></div>
</div>
<div class="tabcontent_products_monan" id="banhkem_monan_banhkem">
    <div id="banhkem_monan_banhkem_body" style='height:1100px'></div>
    <div id="banhkem_monan_paginations"></div>
</div>
<div class="tabcontent_products_monan" id="trangmieng_monan_trangmieng">
    <div id="trangmieng_monan_trangmieng_body" style='height:1100px'></div>
    <div id="trangmieng_monan_paginations"></div>
</div>

<script>
    $(document).ready(function(){

        getDataOfMonAn();

        let i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent_products_monan");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        document.getElementById("tatca_monan_tatca").style.display = "block";
        document.getElementById("btn-monan-tatca").className += " border-bottom bottom-light";

        function show_products_monan(btn, item) {
            // Declare all variables
            let i, tabcontent_products_monan, tablinks;

            // Get all elements with class="tabcontent_products_monan" and hide them
            tabcontent_products_monan = document.getElementsByClassName("tabcontent_products_monan");
            for (i = 0; i < tabcontent_products_monan.length; i++) {
                tabcontent_products_monan[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks_products_monan = document.getElementsByClassName("tablinks_products_monan");
            for (i = 0; i < tablinks_products_monan.length; i++) {
                tablinks_products_monan[i].className = tablinks_products_monan[i].className.replace(" border-bottom bottom-light", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(item).style.display = "block";
            document.getElementById(btn).className += " border-bottom bottom-light";
        }

        $("#btn-monan-tatca").click(function() {
            show_products_monan("btn-monan-tatca","tatca_monan_tatca")

        })

        $("#btn-monan-doan").click(function() {
            show_products_monan("btn-monan-doan","doan_monan_doan")
            
        })

        $("#btn-monan-douong").click(function() {
            show_products_monan("btn-monan-douong","douong_monan_douong")
            
        })
        
        $("#btn-monan-chay").click(function() {
            show_products_monan("btn-monan-chay","chay_monan_chay")
            
        })

        $("#btn-monan-banhkem").click(function() {
            show_products_monan("btn-monan-banhkem","banhkem_monan_banhkem")
            
        })


        $("#btn-monan-trangmieng").click(function() {
            show_products_monan("btn-monan-trangmieng","trangmieng_monan_trangmieng")
            
        })

        function getDataOfMonAn() {
            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPham',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    // console.log(data_profile);   
                    $("#tatca_monan_paginations").pagination({
                        dataSource: data_profile,
                        pageSize: 18,
                        ulClassName: 'd-flex justify-content-center ul_btn_paginations p-0 text-light',
                        activeClassName: 'li_btn_paginations_active',
                        autoHidePrevious: true,
                        autoHideNext: true,
                        showPrevious: true,
                        showNext: true,
                        callback: function(data, pagination) {
                            // template method of yourself
                             let html = addDataMonAnToCard(data);
                            // console.log(html);

                            $("#tatca_monan_tatca_body").html(html);

                            for(let i = 0; i < data.length; i++){

                                let btn_add_shopping_cart = 'btn-add-product-to-shopping-cart-' + i;
                                let ten_products_user_page = 'ten_products_user_page_' + i;

                                $(`.${btn_add_shopping_cart}`).click(function(e){
                                    let action = 'add';
                                    let ma_monan = $(`.${ten_products_user_page}`).attr("ma_monan");
                                    // console.log(action, ten, img, ma_monan, gia_tien);

                                    addToCart(action, ma_monan)
                                })
                            }
                        }
                    })
                }
            });
        }

        
        function addDataMonAnToCard(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_products/" + data[i].img_monan + "' class='card-img-top img_product_monan_user_page_" + i + "' alt='" + data[i].img_monan + "'>"
                            html += "<div class='card-body'>"

                            if(data[i].ten.length > 11){
                                html += "<p><b class='ten_products_user_page_" + i +"' img='" + data[i].img_monan +"' ma_monan='" + data[i].ma_monan + "' gia_tien='" + data[i].gia_tien + "' ten='" + data[i].ten + "'>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            } else {
                                html += "<p><b class='ten_products_user_page_" + i +"' ma_monan='" + data[i].ma_monan + "' gia_tien='" + data[i].gia_tien + "' ten='" + data[i].ten + "'>" + data[i].ten + "</b></p>"
                            }

                            html += "<p><span>" + parseInt(data[i].gia_tien).toLocaleString() + "</span>đ</p>"
                            html += "<div class='d-flex mt-3'>"
                            html += "<button type='button' class='w-25 p-1 btn btn-primary mr-1 btn-add-product-to-shopping-cart-" + i + " badge text-light'><i class='fas fa-cart-plus'></i></button>";
                            html += "<a type='button' class='w-75 text-white btn btn-primary' class='badge text-light' style='font-size:0.7rem' href='../san_pham/index.php?id=" + data[i].id + "&ma_monan=" + data[i].ma_monan + "&ma_nhahang=" + data[i].ma_nhahang + "'>Xem chi tiết</a>"
                            html += "</div>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }

            // html += data.map(x => {
            //     return  "<div class='col-2 item_card_trangchu'><div class='card'><img src='../asset/img_nhahang/" + x.img_nhahang +"' class='card-img-top' alt='" + data[i].img_nhahang + "'><div class='card-body'><p>" + x.ten +"</p><p><small class='card-text'>" + x.dia_chi.slice(0,20) +  "..."  + "</small></p><button type="button" class="btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3" data-toggle="modal" data-target="#form-dang-nhap-card"></div></div></div>"
            // })
            
            html += "</div>";
            return html;
        }


        function addToCart(action, ma_monan) {
            let so_luong = 1;
            var queryString = "";
                if(action != "") {
                    switch(action) {
                        case "add":
                            queryString = 'action=' + action + '&ma_monan=' + ma_monan + '&so_luong=' + so_luong;
                        break;
                        case "remove":
                            queryString = 'action='+action+'&ma_monan='+ ma_monan;
                        break;
                        case "empty":
                            queryString = 'action='+action;
                        break;
                    }	 
                }
                $.ajax({
                    url: "../api/shopping_cart/shopping_cart.php",
                    data: queryString,
                    type: "POST",
                    success:function(data){

                        
                        // console.log(data_sp)
                        let html = "";
                        let tong_tien = 0;


                        // console.log(data);
                        if (data == "Hiện chưa có sản phẩm nào được chọn"){

                            html += "<p>Hiện chưa có sản phẩm nào được chọn</p>";
                            
                        } else {

                            let data_sp = $.parseJSON(data);

                            html += "<table cellpadding='10' cellspacing='1' class='table w-100'>"
                            html += "<tbody>"
                            html += "<tr style='font-size:12px;' class='text-center'>"
                            html += "<th><strong>Hình</strong></th>"
                            html += "<th><strong>Tên</strong></th>"
                            html += "<th><strong>Số lượng</strong></th>"
                            html += "<th><strong>Gía tiền</strong></th>"
                            html += "</tr>"

                            for (let item in data_sp) {
                                // console.log(data_sp[item])
                                html += "<tr class='text-center'>"
                                html += "<td><img height='50px' width='50px' src='../asset/img_products/" + data_sp[item].img_monan + "' img_monan='" + data_sp[item].img_monan + "'  class='img_monan_order'/></td>"
                                html += "<td><strong><span class='ten_sanpham_order' ma_monan='" + data_sp[item].ma_monan + "' ma_nhahang='" + data_sp[item].ma_nhahang + "' dia_chi='" + data_sp[item].dia_chi + "'>" + data_sp[item].ten + "</span></strong></td>"
                                html += "<td><input class='so_luong_order' type='number' name='so_luong' value = '" + data_sp[item].so_luong +"' style='width:50px'/></td>"
                                html += "<td class='text-right gia_sanpham_order' gia='"+ (parseInt(data_sp[item].so_luong) * parseInt(data_sp[item].gia_tien)) + "'>" + (parseInt(data_sp[item].so_luong) * parseInt(data_sp[item].gia_tien)).toLocaleString('vi-VN') + "</td>"
                                html += "<td class='text-center'><button onClick = 'addToCart('remove','" + data_sp[item].ma_monan + "')' class='btnRemoveAction cart-action btn text-danger'><i class='fas fa-times-circle'></i></button></td>"
                                html += "</tr>"

                                tong_tien += parseInt(data_sp[item].so_luong) * parseInt(data_sp[item].gia_tien)
                            }

                            html += "<tr>"
                            html += "<td colspan='5' class='text-right '><strong>Tổng tiền:</strong> <span class='gia_tong_tien_order'>" + parseInt(tong_tien).toLocaleString() + "</span></td>"
                            html += "</tr>"
                            html += "</tbody>"
                            html += "</table"
                        }

                        $("#cart-item").html(html);
                        
                    },
                    error:function (){
                        thongbaoloi('error')
                    }
	            });
        }

        

    });

    
</script>