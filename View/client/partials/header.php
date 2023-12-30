<nav class="navbar navbar-light bg-light " style="padding: 15px 40px;">
  <form class="form-inline form-infor">
    <a class="navbar-brand a" href="http://localhost/Web_QLTHUVIEN/index.php">Trang chủ</span></a>
    <a class="navbar-brand">Về chúng tôi</a>
    <a class="navbar-brand">Mượn sách</a>

  </form>
  <form class="form-inline">
    <!-- Example split danger button -->
    
    <!-- Example single danger button -->
    
    <?php if (isset($_SESSION['hoTen']) && isset($_SESSION['img']) && ($_SESSION['hoTen'] != "")) {
      echo '<div class="dropdown ">
      <button class="btn btn-secondary dropdown-toggle buttonDropdown" type="button" data-toggle="dropdown" aria-expanded="false">
      <span class= "mr-2 d-none d-lg-inline text-gray-600 small">'. $_SESSION['hoTen'] . '</span>
      <img src="public/client/image/'.$_SESSION['img'].'" alt="" class="img-profile rounded-circle"">
      </button>
      <div class="dropdown-menu">
        <button class="dropdown-item" type="button">Action</button>
        <button class="dropdown-item" type="button">Another action</button>
        <button class="dropdown-item" type="button">Something else here</button>
      </div> 
    </div>';
    } else {
    ?>
      <span class= "mr-2 d-none d-lg-inline text-gray-600 small"><?php $_SESSION['hoTen'] ?></span>
      <a class="navbar-brand" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangki.php">Đăng ký</a>
      <a class="navbar-brand" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php">Đăng nhập</a>
    <?php } ?>
  </form>
</nav>
<a href=""></a>
<style>
  .form-infor {
    padding-left: 10px;
  }

  .form-infor a {
    padding-left: 30px;
  }

  .form-inline a {
    font-size: 16px;

  }

  .img-profile {
    width: 30px;
    height: 30px;
  }

  .buttonDropdown {
    background-color: cornflowerblue;
    margin-right: 10px;
    width: 180px;
    /* width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 70px; */
  }


</style>