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
                }
            });
        }

        
        function addDataOfProductsSelect(data){
            let html = "";

            for (let i = 0; i < data.length; i++) {
                    
                html += "<div class='container table_sanpham text-light my-2'>"
                html += "<div class='row title_sanpham_order py-5'>"

                if(data[i].img_monan == ''){
                    html += "<div class='col-3 img_sanpham text-right'><img src='https://via.placeholder.com/150'/></div>"
                } else {
                    html += "<div class='col-3 img_sanpham text-right'><img src='../asset/img_products/" + data[i].img_monan + "'/></div>"
                }

                html += "<div class='col-7 '>"
                html += "<p class='tittle_sanpham' ma_monan='" + data[i].ma_monan + "'>" + data[i].ten_monan + "</p>"
                html += "<p class='nhahang_sanpham' ma_nhahang='" + data[i].ma_nhahang + "'>" + data[i].ten_nhahang + "</p>"
                html += "<p class='soluong_sanpham'>" + data[i].so_luong + "</p>"
                html += "</div>"
                html += "<div class='col-2 gia_sanpham align-self-center'>"
                html += "<p> " + (data[i].gia_tien).toLocaleString('vi-VN')+ " </p>"
                html += "</div>"
                html += "</div>"
                html += "<div class='tongtien_sanpham d-flex justify-content-end py-2 my-2'>"
                html += "<div class='tong_tien pr-5'>Tổng tiền: <span class='tong_tien pr-5'>" + (data[i].gia_tien  * data[i].so_luong).toLocaleString('vi-VN') + "</span></div>"
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