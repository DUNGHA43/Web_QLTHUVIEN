<nav class="navbar navbar-light bg-light " style="padding: 15px 40px;">
  <form class="form-inline form-infor">
    <a class="navbar-brand a" href="http://localhost/Web_QLTHUVIEN/index.php">Trang chủ</span></a>
    <a class="navbar-brand">Về chúng tôi</a>
    <a class="navbar-brand">Mượn sách</a>
    <?php if(isset($_COOKIE['hoTen']))
    {
      echo $_COOKIE['hoTen'];
    }else
    {
      echo "ko có";
    }
     ?>
  </form>
  <form class="form-inline">
    <!-- Example split danger button -->
    
    <!-- Example single danger button -->
    
    <?php if (isset($_SESSION['taikhoan']) && isset($_SESSION['hoTen']) && isset($_SESSION['img']) && ($_SESSION['hoTen'] != "")) {
      echo '<div class="dropdown ">
      <button class="btn btn-secondary dropdown-toggle buttonDropdown" type="button" data-toggle="dropdown" aria-expanded="false">
      <span class= "mr-2 d-none d-lg-inline text-gray-600 small">'. $_SESSION['hoTen'] . '</span>
      <img src="public/client/image/'.$_SESSION['img'].'" alt="" class="img-profile rounded-circle"">
      </button>
      <div class="dropdown-menu">
        <a class="navbar-brand dropdown-item" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/thongtincanhan.php?tk='.$_SESSION['taikhoan'].'">Thông tin cá nhân</a>
        <a class="navbar-brand dropdown-item" href="#">abcxyz</a>
        <a class="navbar-brand dropdown-item" href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=thoat">Đăng xuất</a>
      </div> 
    </div>';
    }
    else if(isset($_COOKIE['taikhoan']) && isset($_COOKIE['hoTen']) && isset($_COOKIE['img']) && ($_COOKIE['hoTen'] != "")){
      echo '<div class="dropdown ">
      <button class="btn btn-secondary dropdown-toggle buttonDropdown" type="button" data-toggle="dropdown" aria-expanded="false">
      <span class= "mr-2 d-none d-lg-inline text-gray-600 small">'. $_COOKIE['hoTen'] . '</span>
      <img src="public/client/image/'.$_COOKIE['img'].'" alt="" class="img-profile rounded-circle"">
      </button>
      <div class="dropdown-menu">    
      <a class="navbar-brand dropdown-item" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/thongtincanhan.php?tk='.$_SESSION['taikhoan'].'">Thông tin cá nhân</a>
      <a class="navbar-brand dropdown-item" href="#">abcxyz</a>
      <a class="navbar-brand dropdown-item" href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=thoat">Đăng xuất</a>
      </div> 
    </div>';
    } 
    else {
    ?>
      <a class="navbar-brand" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangki.php">Đăng ký</a>
      <a class="navbar-brand" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php">Đăng nhập</a>
    <?php } ?>
  </form>
</nav>
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
    margin-left: 7px;
    margin-right: 7px;
  }

  .buttonDropdown {
    background-color: #5E6969;
    margin-right: 10px;
  }

</style>