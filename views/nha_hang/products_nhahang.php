<div class='container products_body'>
    <div class='row'>
        <div class='col-2 p-0 m-0 btn_selects_products_nhahang'>
            <button class='tablink_btn_selects_products_nhahang' id='btn_products_nhahang_tatca'>Tất cả</button>
            <button class='tablink_btn_selects_products_nhahang' id='btn_products_nhahang_spnoibat'>Sản phẩm nổi bật</button>
            <button class='tablink_btn_selects_products_nhahang' id='btn_products_nhahang_spbanchay'>Sản phẩm bán chạy</button>
        </div>
        <div class='col-10'>
            <div class='tabcontent_products_nhahang' id='tatca_products_nhahang'>
                <div id="tatca_monan_tatca_body" style='height:900px'></div>
                <div id="tatca_monan_paginations"></div>
            </div>
            <div class='tabcontent_products_nhahang' id='hot_products_nhahang'>
                <div id="hot_monan_hot_body"style='height:900px'></div>
                <div id="hot_monan_paginations"></div>
            </div>
            <div class='tabcontent_products_nhahang' id='bestseller_products_nhahang'>
                <div id="bestseller_monan_bestseller_body"style='height:900px'></div> 
                <div id="bestseller_monan_paginations"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        getDataOfMonAn();
        getDataOfMonAn_hot();
        getDataOfMonAn_bestseller();

        var i, tabcontent, tablinks;

        // Get all elements with class='tabcontent' and hide them
        tabcontent = document.getElementsByClassName('tabcontent_products_nhahang');
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = 'none';
        }

        document.getElementById('tatca_products_nhahang').style.display = 'block';
        document.getElementById('btn_products_nhahang_tatca').style.backgroundColor = '#101748';
        document.getElementById('btn_products_nhahang_tatca').style.border = '1px solid white';

        function show_products_nhahang(btn, item) {
            // Declare all variables
            var i, tabcontent_products_nhahang, tablinks;

            // Get all elements with class="tabcontent_products_nhahang" and hide them
            tabcontent_products_nhahang = document.getElementsByClassName("tabcontent_products_nhahang");
            for (i = 0; i < tabcontent_products_nhahang.length; i++) {
                tabcontent_products_nhahang[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks_products_nhahang = document.getElementsByClassName("tablink_btn_selects_products_nhahang");
            for (i = 0; i < tablinks_products_nhahang.length; i++) {
                tablinks_products_nhahang[i].style.backgroundColor = '#222e7c';
                tablinks_products_nhahang[i].style.border = 'none';
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(item).style.display = 'block';
            document.getElementById(btn).style.backgroundColor = '#101748';
            document.getElementById(btn).style.border = '1px solid white';
        }

        $("#btn_products_nhahang_tatca").click(function() {
            show_products_nhahang("btn_products_nhahang_tatca","tatca_products_nhahang")

        })

        $("#btn_products_nhahang_spnoibat").click(function() {
            show_products_nhahang("btn_products_nhahang_spnoibat","hot_products_nhahang")
            
        })

        $("#btn_products_nhahang_spbanchay").click(function() {
            show_products_nhahang("btn_products_nhahang_spbanchay","bestseller_products_nhahang")
            
        })

        function getDataOfMonAn() {
            const arr = window.location.search.substring(1).split('&');
            // console.log(arr);

            let ma_nhahang = arr[1].slice(9);

            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPhamOfMaSanpham',
                    ma_nhahang : ma_nhahang,
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    // console.log(data_profile);   
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
                             var html = addDataMonAnToCard(data);
                            // console.log(html);

                            $("#tatca_monan_tatca_body").html(html);
                        }
                    })
                    // addDataToCard(data_profile);
                }
            });
        }

        function getDataOfMonAn_hot() {
            const arr = window.location.search.substring(1).split('&');
            // console.log(arr);

            let ma_nhahang = arr[1].slice(9);

            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPhamOfMaSanpham_hot',
                    ma_nhahang : ma_nhahang,
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    // console.log(data_profile);   
                    $("#hot_monan_paginations").pagination({
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
                             var html = addDataMonAnToCard(data);
                            // console.log(html);

                            $("#hot_monan_hot_body").html(html);
                        }
                    })
                    // addDataToCard(data_profile);
                }
            });
        }

        function getDataOfMonAn_bestseller() {
            const arr = window.location.search.substring(1).split('&');
            // console.log(arr);

            let ma_nhahang = arr[1].slice(9);

            $.ajax({
                url: '../api/san_pham/san_pham.php',
                type: 'GET',
                cache: false,
                data: {
                    action : 'getDataSanPhamOfMaSanpham_bestseller',
                    ma_nhahang : ma_nhahang,
                },
                success: function(data) {
                    // console.log(data);
                    let data_profile = $.parseJSON(data);
                    // console.log(data_profile);   
                    $("#bestseller_monan_paginations").pagination({
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
                             var html = addDataMonAnToCard(data);
                            // console.log(html);

                            $("#bestseller_monan_bestseller_body").html(html);
                        }
                    })
                    // addDataToCard(data_profile);
                }
            });
        }

        
        function addDataMonAnToCard(data){
            let html = "";
            html += "<div class='row'>";

            for (let i = 0; i < data.length; i++) {
                    
                    html += "<div class='col-3 item_card_trangchu'>"
                        html += "<div class='card'>"
                        html += "<img src='../asset/img_products/" + data[i].img_monan + "' class='card-img-top' alt='" + data[i].img_monan + "'>"
                            html += "<div class='card-body'>"

                            if(data[i].ten.length >= 12){
                                html += "<p><b>" + data[i].ten.slice(0,12) + "..." + "</b></p>"
                            }else{
                                html += "<p><b>" + data[i].ten + "</b></p>"
                            }

                            if(data[i].dia_chi.length >= 20){
                                html += "<p><small class='card-text'>" + data[i].dia_chi.slice(0,20) + " ... " + "</small></p>"
                            }else{
                                html += "<p><small class='card-text'>" + data[i].dia_chi + "</small></p>"
                            }

                            html += "<div class='d-flex mt-3'>"
                            html += "<a type='button' class='w-25 p-1 btn btn-primary mr-1' class='badge text-light'><i class='fas fa-cart-plus'></i></a>";
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

        
    });
</script>
