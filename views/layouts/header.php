<!-- Image and text -->
<nav class="navbar bg-dark d-flex">
    <div class="col-3 d-flex ">
      <a class="btn" href="./index.php">
        <img src="../asset/img/logo.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
      </a>
      <a href="./index.php" class="btn-content-logo text-light mt-1" style="font-size:1.5rem"><h3 class="btn-content-logo-text">Barista</h3></a>
    </div>

    <div class="col-5 d-flex">
      <input class="input-search-navbar" type="search" placeholder="Search" aria-label="Search">
      <button class="btn-search-navbar"><i class="fas fa-search"></i></button>
    </div>

    <div class="col-2"></div>

    <div class="col text-right">
        <button class="btn ten-khach-hang-navbar text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['login_user'] ?>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="./thongtin_user.php"><i class="pr-2 fas fa-info-circle"></i>Thông tin cá nhân</a>
            <a class="dropdown-item" href="../logout/logout.php"><i class="pr-2 fas fa-power-off"></i>Đăng xuất</a>
        </div>
        <a class="img-khach-hang-navbar" href="./thongtin_user.php">
            <img id="img-khach-hang-navbar" src="https://via.placeholder.com/150" height="30" width="30" alt="avatar"/>
        </a>
    </div>
</nav> 
