<div class="py-5">
    <div class="btn_choose_kindof_products">
        <h3 class="text-light d-inline">Các loại món ăn</h3>
        <button class="btn-monan-tatca tablinks_products_monan" id="btn-monan-tatca">Tất cả</button>
        <button class="btn-monan-chay tablinks_products_monan" id="btn-monan-chay">Món chay</button>
        <button class="btn-monan-quan1 tablinks_products_monan" id="btn-monan-banhkem">Bánh kem</button>
        <button class="btn-monan-quan3 tablinks_products_monan" id="btn-monan-trangmieng">Tráng miệng</button>
    </div>
</div>

<div class="tabcontent_products_monan" id="tatca_monan_tatca">
    <div id="tatca_monan_tatca_body" style="height: 600px;"></div>
    <div id="tatca_monan_paginations"></div>
</div>

<div class="tabcontent_products_monan" id="chay_monan_chay">
    <div id="chay_monan_chay_body" style="height: 600px;"></div>
    <div id="chay_monan_paginations"></div>
</div>
<div class="tabcontent_products_monan" id="banhkem_monan_banhkem">
    <div id="banhkem_monan_banhkem_body" style="height: 600px;"></div>
    <div id="banhkem_monan_paginations"></div>
</div>
<div class="tabcontent_products_monan" id="trangmieng_monan_trangmieng">
    <div id="trangmieng_monan_trangmieng_body" style="height: 600px;"></div>
    <div id="trangmieng_monan_paginations"></div>
</div>

<script>
    $(document).ready(function(){

        getDataOfMonAn();
        getDataOfMonAn_chay();
        getDataOfMonAn_banhkem();
        getDataOfMonAn_trangmieng();


        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent_products_monan");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        document.getElementById("tatca_monan_tatca").style.display = "block";
        document.getElementById("btn-monan-tatca").className += " border-bottom bottom-light";

        function show_products_monan(btn, item) {
            // Declare all variables
            var i, tabcontent_products_monan, tablinks;

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
                    action : 'getDataSanPham_monan',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    $("#tatca_monan_paginations").pagination({
                        dataSource: data_profile,
                        pageSize: 12,
                        ulClassName: 'd-flex justify-content-center ul_btn_paginations p-0 text-light',
                        activeClassName: 'li_btn_paginations_active',
                        autoHidePrevious: true,
                        autoHideNext: true,
                        showPrevious: true,
                        showNext: true,
                        callback: function(data, pagination) {
                            // template method of yourself
                            let html = addDataToCard(data);
                            $("#tatca_monan_tatca_body").html(html);
                        }
                    })
                    
                }
            });
        }

        function getDataOfMonAn_chay() {
            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPham_chay',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    $("#chay_monan_paginations").pagination({
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
                            let html = addDataToCard(data);
                            $("#chay_monan_chay_body").html(html);
                        }
                    })
                    
                }
            });
        }

        function getDataOfMonAn_banhkem() {
            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPham_banhkem',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    $("#banhkem_monan_paginations").pagination({
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
                            let html = addDataToCard(data);
                            $("#banhkem_monan_banhkem_body").html(html);
                        }
                    })
                    
                }
            });
        }

        function getDataOfMonAn_trangmieng() {
            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPham_tranngmieng',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    $("#trangmieng_monan_paginations").pagination({
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
                            let html = addDataToCard(data);
                            $("#trangmieng_monan_trangmieng_body").html(html);
                        }
                    })
                    
                }
            });
        }


        function addDataToCard(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_products/" + data[i].img_monan + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"

                            if(data[i].ten.length > 12){
                                html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            } else {
                                html += "<p><b>" + data[i].ten + "</b></p>"
                            }

                            if(data[i].dia_chi.length > 15){
                                html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,15) + " ... " + "</small></p>"
                            } else {
                                html += "<p><small class='card-text'>" + data[i].dia_chi + " ... " + "</small></p>"
                            }
                            
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";
            return html;
            
        }

    });
</script>