<div class="py-5">
    <div class="btn_choose_kindof_products">
        <h3 class="text-light d-inline">Nhà hàng</h3>
        <button class="btn-nhahang-tatca tablinks_products_nhahang" id="btn-nhahang-tatca">Tất cả</button>
        <button class="btn-nhahang-chay tablinks_products_nhahang" id="btn-nhahang-chay">Nhà hàng chay</button>
        <button class="btn-nhahang-quan1 tablinks_products_nhahang" id="btn-nhahang-quan1">Quận 1</button>
        <button class="btn-nhahang-quan3 tablinks_products_nhahang" id="btn-nhahang-quan3">Quận 3</button>
        <button class="btn-nhahang-quanbinhthanh tablinks_products_nhahang" id="btn-nhahang-quanbinhthanh">Quận Bình Thạnh</button>
        <button class="btn-nhahang-quanphunnhuan tablinks_products_nhahang" id="btn-nhahang-quanphunhuan">Quận Phú Nhuận</button>
        <button class="btn-nhahang-quangovap tablinks_products_nhahang" id="btn-nhahang-quangovap">Quận Gò Vấp</button>
    </div>
</div>

<div class="tabcontent_products_nhahang" id="tatca_nhahang_tatca"></div>
<div class="tabcontent_products_nhahang" id="chay_nhahang_chay"></div>
<div class="tabcontent_products_nhahang" id="quan1_nhahang_quan1"></div>
<div class="tabcontent_products_nhahang" id="quan3_nhahang_quan3"></div>
<div class="tabcontent_products_nhahang" id="quanbinhthanh_nhahang_quanbinhthanh"></div>
<div class="tabcontent_products_nhahang" id="quanphunhuan_nhahang_quanphunhuan"></div>
<div class="tabcontent_products_nhahang" id="quangovap_nhahang_quangovap"></div>

<script>
    $(document).ready(function(){

        getDataOfNhaHang();
        getDataOfNhaHang_chay();
        getDataOfNhaHang_quan1();
        getDataOfNhaHang_quan3();
        getDataOfNhaHang_quanbinhthanh();
        getDataOfNhaHang_quanphunhuan();
        getDataOfNhaHang_quangovap();


        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent_products_nhahang");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        document.getElementById("tatca_nhahang_tatca").style.display = "block";
        document.getElementById("btn-nhahang-tatca").className += " border-bottom bottom-light";

        function show_products_nhahang(btn, item) {
            // Declare all variables
            var i, tabcontent_products_nhahang, tablinks;

            // Get all elements with class="tabcontent_products_nhahang" and hide them
            tabcontent_products_nhahang = document.getElementsByClassName("tabcontent_products_nhahang");
            for (i = 0; i < tabcontent_products_nhahang.length; i++) {
                tabcontent_products_nhahang[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks_products_nhahang = document.getElementsByClassName("tablinks_products_nhahang");
            for (i = 0; i < tablinks_products_nhahang.length; i++) {
                tablinks_products_nhahang[i].className = tablinks_products_nhahang[i].className.replace(" border-bottom bottom-light", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(item).style.display = "block";
            document.getElementById(btn).className += " border-bottom bottom-light";
        }

        $("#btn-nhahang-tatca").click(function() {
            show_products_nhahang("btn-nhahang-tatca","tatca_nhahang_tatca")

        })

        $("#btn-nhahang-chay").click(function() {
            show_products_nhahang("btn-nhahang-chay","chay_nhahang_chay")
            
        })

        $("#btn-nhahang-quan1").click(function() {
            show_products_nhahang("btn-nhahang-quan1","quan1_nhahang_quan1")
            
        })

        $("#btn-nhahang-quan3").click(function() {
            show_products_nhahang("btn-nhahang-quan3","quan3_nhahang_quan3")
            
        })

        $("#btn-nhahang-quanbinhthanh").click(function() {
            show_products_nhahang("btn-nhahang-quanbinhthanh","quanbinhthanh_nhahang_quanbinhthanh")
            
        })
        
        $("#btn-nhahang-quanphunhuan").click(function() {
            show_products_nhahang("btn-nhahang-quanphunhuan","quanphunhuan_nhahang_quanphunhuan")
            
        })
        
        $("#btn-nhahang-quangovap").click(function() {
            show_products_nhahang("btn-nhahang-quangovap","quangovap_nhahang_quangovap")
            
        })
        
        function getDataOfNhaHang() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard(data_profile);
                }
            });
        }

        
        function addDataToCard(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }

            // html += data.map(x => {
            //     return  "<div class='col-2 item_card_trangchu'><div class='card'><img src='../asset/img_nhahang/" + x.img_nhahang +"' class='card-img-top' alt='https://via.placeholder.com/150'><div class='card-body'><p>" + x.ten +"</p><p><small class='card-text'>" + x.dia_chi.slice(0,20) +  "..."  + "</small></p><button type="button" class="btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3" data-toggle="modal" data-target="#form-dang-nhap-card"></div></div></div>"
            // })
            
            html += "</div>";
            // console.log(html)
            $("#tatca_nhahang_tatca").html(html);
        }

        function getDataOfNhaHang_chay() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang_chay',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard_chay(data_profile);
                }
            });
        }

        
        function addDataToCard_chay(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";

            $("#chay_nhahang_chay").html(html);
        }

        function getDataOfNhaHang_quan1() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang_quan1',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard_quan1(data_profile);
                }
            });
        }

        
        function addDataToCard_quan1(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";

            $("#quan1_nhahang_quan1").html(html);
        }


        function getDataOfNhaHang_quan3() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang_quan3',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard_quan3(data_profile);
                }
            });
        }

        
        function addDataToCard_quan3(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";

            $("#quan3_nhahang_quan3").html(html);
        }

        function getDataOfNhaHang_quanbinhthanh() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang_quanbinhthanh',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard_quanbinhthanh(data_profile);
                }
            });
        }

        
        function addDataToCard_quanbinhthanh(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";

            $("#quanbinhthanh_nhahang_quanbinhthanh").html(html);
        }

        function getDataOfNhaHang_quanphunhuan() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang_quanphunhuan',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard_quanphunhuan(data_profile);
                }
            });
        }

        
        function addDataToCard_quanphunhuan(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";

            $("#quanphunhuan_nhahang_quanphunhuan").html(html);
        }

        function getDataOfNhaHang_quangovap() {
            $.ajax({
                url: '../api/nha_hang/nha_hang.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataNhaHang_quangovap',
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    addDataToCard_quangovap(data_profile);
                }
            });
        }

        
        function addDataToCard_quangovap(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-2 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_nhahang/" + data[i].img_nhahang + "' class='card-img-top' alt='https://via.placeholder.com/150'>"
                            html += "<div class='card-body'>"
                            html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            html += "<button type='button' class='btn-dang-nhap-card btn-dangnhap-dangky-navbar-card w-100 btn btn-primary mt-3' data-toggle='modal' data-target='#form-dang-nhap-card'>Xem chi tiết</button>"
                            html += "</div>"
                        html += "</div>"
                    html += "</div>"
            }
            
            html += "</div>";

            $("#quangovap_nhahang_quangovap").html(html);
        }
    });
</script>