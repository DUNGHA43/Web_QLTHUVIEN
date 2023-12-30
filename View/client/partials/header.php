<nav class="navbar navbar-light bg-light " style="padding: 15px 40px;">
  <form class="form-inline form-infor">
    <a class="navbar-brand a" href="http://localhost/Web_QLTHUVIEN/index.php">Trang chủ</span></a>
    <a class="navbar-brand">Về chúng tôi</a>
    <a class="navbar-brand">Mượn sách</a>
    <a class="navbar-brand">Disabled</a>
  </form>
  <form class="form-inline">
  
    <?php if(isset($_SESSION['hoTen'])&& ($_SESSION['hoTen']!="")) {
          echo '<li><a href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=userinfo">'.$_SESSION['hoTen'].'</a> 
                    <a href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=thoat">Thoat</a></li>';
    }else {
     ?>
    <a class="navbar-brand" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangki.php">Đăng ký</a>
    <a class="navbar-brand" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php">Đăng nhập</a>
      <?php } ?>
  </form>
</nav>

<style>
.form-infor{
  padding-left: 10px;
}


.form-infor a {
  padding-left: 30px;
}
.form-inline a{
  font-size: 16px;
    
}


</style>