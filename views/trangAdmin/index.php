
<nav class="sidebar close">
        <header>
            <div class="image-text">    
                <span class="image" >
                    <img src="../asset/img_nhahang/<?php echo $_SESSION['avatar_icon_admin']?>" height="70" width="50" />
                </span>
                <div class="text logo-text">
                    <span class="name" id="tenNhaHang">
                        <?php echo $_SESSION['login_admin']?>
                    </span>
                    <span class="profession" id="maNhaHang">
                        <?php echo $_SESSION['username_admin']?>
                    </span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#" onclick="openTab(event, 'trangChu')" id="defaultOpen">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Trang Chủ</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#" onclick="openTab(event, 'donHang')">
                            <i class='bx bx-receipt icon'></i>
                            <span class="text nav-text">Đơn hàng</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#" onclick="openTab(event, 'sanPham')">
                            <i class='bx bx-archive icon'></i>
                            <span class="text nav-text">Sản phẩm</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li> -->

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="./logOutAdmin.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home tabcontent" id="trangChu" >
        <?php include("../views/trangAdmin/trangChu.php"); ?>
    </section>

    <section class="home tabcontent" id="donHang" >
        <?php include("../views/trangAdmin/donHang.php"); ?>
    </section>
    
    <section class="home tabcontent" id="sanPham">
        <?php include("../views/trangAdmin/sanPham.php"); ?>
    </section>
   