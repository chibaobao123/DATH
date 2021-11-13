<div class="py-5">
    <div class="btn_choose_kindof_products">
        <h3 class="text-light d-inline">Đồ uống</h3>
        <button class="btn-douong-tatca tablinks_products_douong" id="btn-douong-tatca">Tất cả</button>
        <button class="btn-douong-trasua tablinks_products_douong" id="btn-douong-trasua">Trà sữa</button>
        <button class="btn-douong-nuoctraicay tablinks_products_douong" id="btn-douong-nuoctraicay">Nước trái cây</button>
        <button class="btn-douong-sua tablinks_products_douong" id="btn-douong-sua">Sữa</button>
        <button class="btn-douong-khac tablinks_products_douong" id="btn-douong-khac">Các loại khác</button>
    </div>
</div>

<div class="tabcontent_products_douong" id="tatca_douong_tatca">
    <div id="tatca_monnuoc_tatca_body" style="height: 600px;"></div>
    <div id="tatca_monnuoc_paginations"></div>
</div>
<div class="tabcontent_products_douong" id="trasua_douong_trasua">
    <div id="trasua_monnuoc_trasua_body" style="height: 600px;"></div>
    <div id="trasua_monnuoc_paginations"></div>
</div>
<div class="tabcontent_products_douong" id="nuoctraicay_douong_nuoctraicay">
    <div id="nuoctraicay_monnuoc_nuoctraicay_body" style="height: 600px;"></div>
    <div id="nuoctraicay_monnuoc_paginations"></div>
</div>
<div class="tabcontent_products_douong" id="sua_douong_sua">
    <div id="sua_monnuoc_sua_body" style="height: 600px;"></div>
    <div id="sua_monnuoc_paginations"></div>
</div>
<div class="tabcontent_products_douong" id="khac_douong_khac">
    <div id="khac_monnuoc_khac_body" style="height: 600px;"></div>
    <div id="khac_monnuoc_paginations"></div>
</div>

<script>
    $(document).ready(function(){

        getDataOfMonNuoc()

        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent_products_douong");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        document.getElementById("tatca_douong_tatca").style.display = "block";
        document.getElementById("btn-douong-tatca").className += " border-bottom bottom-light";

        function show_products_douong(btn, item) {
            // Declare all variables
            var i, tabcontent_products_douong, tablinks;

            // Get all elements with class="tabcontent_products_douong" and hide them
            tabcontent_products_douong = document.getElementsByClassName("tabcontent_products_douong");
            for (i = 0; i < tabcontent_products_douong.length; i++) {
                tabcontent_products_douong[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks_products_douong = document.getElementsByClassName("tablinks_products_douong");
            for (i = 0; i < tablinks_products_douong.length; i++) {
                tablinks_products_douong[i].className = tablinks_products_douong[i].className.replace(" border-bottom bottom-light", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(item).style.display = "block";
            document.getElementById(btn).className += " border-bottom bottom-light";
        }

        $("#btn-douong-tatca").click(function() {
            show_products_douong("btn-douong-tatca","tatca_douong_tatca")

        })

        $("#btn-douong-trasua").click(function() {
            show_products_douong("btn-douong-trasua","trasua_douong_trasua")
            
        })

        $("#btn-douong-nuoctraicay").click(function() {
            show_products_douong("btn-douong-nuoctraicay","nuoctraicay_douong_nuoctraicay")
            
        })

        $("#btn-douong-sua").click(function() {
            show_products_douong("btn-douong-sua","sua_douong_sua")
            
        })

        $("#btn-douong-khac").click(function() {
            show_products_douong("btn-douong-khac","khac_douong_khac")
            
        })

        function getDataOfMonNuoc() {
            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPham_monnuoc',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    $("#tatca_monnuoc_paginations").pagination({
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
                            $("#tatca_monnuoc_tatca_body").html(html);
                        }
                    })
                    
                }
            });
        }

        function addDataToCard(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                // let j = Math.floor((Math.random() * data.length));

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