<!-- Image and text -->
<nav class="navbar bg-dark d-flex">
    <div class="col-3 d-flex ">
      <a class="btn" href="./index.php">
        <img src="../asset/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
      </a>
      <a href="../user/index.php" class="btn-content-logo text-light mt-1" style="font-size:1.5rem"><h3 class="btn-content-logo-text">Barista</h3></a>
    </div>

    <div class="col-5 d-flex">
      <input class="input-search-navbar" type="search" placeholder="Search" aria-label="Search">
      <button class="btn-search-navbar"><i class="fas fa-search"></i></button>
    </div>
    
    <div class="col text-right">
        <span class="username-khach-hang-navbar-hide d-none"><?php echo $_SESSION['username'] ?></span>
        <span class="ten-khach-hang-navbar-hide d-none"><?php echo $_SESSION['login_user'] ?></span>
        <button class="btn ten-khach-hang-navbar text-light" style="position:relative" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['login_user'] ?>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="dropdown-menu mt-2" style="position:absolute; top:40px; left:250px;" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../thong_tin_khach_hang/thongtin_user.php?username=<?php echo $_SESSION['username'] ?>"><i class="pr-2 fas fa-info-circle"></i>Thông tin cá nhân</a>
            <a class="dropdown-item" href="../thong_tin_khach_hang/thongtin_user.php?username=<?php echo $_SESSION['username'] ?>"><i class="pr-2 fas fa-shopping-cart"></i>Đơn hàng</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#thaydoi_matkhau" style="cursor: pointer;"><i class="pr-2 fas fa-key" ></i>Thay đổi mật khẩu</a>
            <a class="dropdown-item" href="../logout/logout.php"><i class="pr-2 fas fa-power-off"></i>Đăng xuất</a>
        </div>
        <a class="img-khach-hang-navbar" href="../thong_tin_khach_hang/thongtin_user.php?username=<?php echo $_SESSION['username'] ?>">
          <img id="img-khach-hang-navbar" src="../asset/img_user/<?php echo $_SESSION['avatar_icon'] ?>" height="30" width="30" alt="avatar"/>
        </a>
    </div>
</nav> 

<div class="modal fade" id="thaydoi_matkhau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label class="border-bottom border-dark"  for="mat_khau_hien_tai">Mật khẩu hiện tại:</label>
            <input type="password" class="form-control" id="mat_khau_hien_tai" require>
          </div>
          <div class="form-group">
            <label class="border-bottom border-dark"  for="mat_khau_moi">Mật khẩu mới</label>
            <input type="password" class="form-control" id="mat_khau_moi" require>
          </div>
          <div class="form-group">
            <label class="border-bottom border-dark"  for="mat_khau_moi_nhap_lai">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" id="mat_khau_moi_nhap_lai" require>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="luu_mat_khau_moi">Lưu mật khẩu</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#luu_mat_khau_moi').on('click', function(){

      let mk_cu = $('#mat_khau_hien_tai').val();
      let mk_moi = $('#mat_khau_moi').val();
      let mk_moi_2 = $('#mat_khau_moi_nhap_lai').val();
      let username = $('.username-khach-hang-navbar-hide').text();

      if(mk_moi == mk_moi_2){

        if(kiemtramatkhau(mk_cu) && kiemtramatkhau(mk_moi) && kiemtramatkhau(mk_moi_2)){
          
          kiemTraMatKhau(mk_cu,mk_moi,mk_moi_2,username)

        }

      } else {

        thongbaoloi('Mật khẩu mới không trung nhau. Xin kiểm tra lại !!!')

      }

    })

    function doiMatKhau(username,mk_moi){
      $.ajax({
        url: "../api/thongtin_khachhang/thaydoi_matkhau.php",
        type: "POST",
        cache: false,
        data: {
          action: "luuMatKhauMoi",
          username: username,
          mk_moi: mk_moi,
        },
        success: function(msg) {
          thongbaotot(msg);
          location.href = "../trang_chu/index.php";
        }
      });
    }

    function kiemTraMatKhau(mk_cu,mk_moi,mk_moi_2,username){
      console.log(mk_cu,mk_moi,mk_moi_2,username)
      $.ajax({
        url: "../api/thongtin_khachhang/thaydoi_matkhau.php",
        type: "POST",
        cache: false,
        data: {
          action: "kiemTraMatKhau",
          mk_cu: mk_cu,
          mk_moi: mk_moi,
          username: username,
        },
        success: function(msg) {
          if(msg == "success"){
            doiMatKhau(username,mk_moi)
          } else {
            thongbaoloi(msg)
          }
          
        }
      });
    }

    $(".input-search-navbar").keyup(function () {
      let value_input = $(".input-search-navbar").val().trim();
      // console.log(value_input);

      $('.body_page_begin').addClass('d-none');
      $('.body_page_search').removeClass('d-none');

      
      $.ajax({
        url: "../api/search/search.php",
        type: "GET",
        cache: false,
        data: {
          action: "search",
          val: value_input,
        },
        success: function(msg) {
          let data = $.parseJSON(msg);
          // console.log(data);
          let html = ''; 
          for(let i = 0; i < data.length; i++) {
            html += "<div class='container text-light mb-3 py-3'>"
              html += "<div class='d-flex table_sanpham'>"
                html += "<div class='img_product_search p-4'>"
                  html += "<img src='../asset/img_products/" + data[i].img_monan + "' alt='../asset/img_products/" + data[i].img_monan + "' height='150' width='150' style='border-radius:5px'>"
                html += "</div>"
                html += "<div class='thong_tin_san_pham_search p-4'>"
                  html += "<h3 class='pb-4'>" + data[i].ten + "</h3>"
                  html += "<p>" + data[i].dia_chi + "</p>"
                html += "</div>"
              html += "</div>"
            html += "</div>"
          }

          $(".body_page_search_data").html(html);
        }
      })
    })

    $('.close_search_body_button').on('click', function(){
        $('.body_page_search').addClass('d-none');

        $('.body_page_begin').removeClass('d-none');
    })
    
    

  })
</script>