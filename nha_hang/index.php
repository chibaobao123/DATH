<!doctype html>
<html lang="en">
  <head>
    <?php
      include("../sessions/session_page.php");
    ?>
    <title><?php echo $_SESSION['login_user'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- css layout layouts.css -->
    <link rel="stylesheet" href="../css/layouts.css">

    <!-- css layout trang_chu.css -->
    <link rel="stylesheet" href="../css/nha_hang.css">

    <!-- toast -->
    <link rel="stylesheet" href="../library/toast/jquery.toast.min.css">

  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/93ec6d166b.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- toast -->
    <script src="../library/toast/jquery.toast.min.js"></script>

    <!-- toast (js thong_bao) -->
    <script src="../library/thong_bao/thong_bao.js"></script>

    <!-- validation -->
    <script src="../library/validate/validation.js"></script>

    <section class="header_user">
      <?php
        include('../views/layouts/header.php');
      ?>
    </section>
    
    <section class='body_page_begin'>
      <section class="body_thong_tin_nha_hang container py-5">
        <section class="thongitn_nhahang_layout pb-5">
          <?php
            include("../views/nha_hang/Profile_nha_hang.php");
          ?>
        </section>
        <section class="products_nhahang_layout pb-5">
          <?php
            include("../views/nha_hang/products_nhahang.php");
          ?>
        </section>
      </section>
    </section>


    <section class="body_trang_user container body_page_search d-none">
        <div class='close_search_body d-flex justify-content-end py-4'>
          <button type='button' class='btn btn-primary close_search_body_button'><i class='fas fa-times' style='font-size: 20px;'></i></button>
        </div>
        <div class="body_page_search_data">

        </div>
    </section>

    <section class="footer_trangchu">
      <?php
        include("../views/layouts/footer.php");
      ?>
    </section>

  </body>
</html>