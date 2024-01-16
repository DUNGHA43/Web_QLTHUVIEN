<nav class="navbar navbar-light bg-dark bg-gradient fixed-top" style="padding: 15px 40px; height: 80px; width: 100%;">
  <form class="form-inline form-infor">
  <div style="display: flex;">
    <div style="padding-top: 4px;">
    <a class="navbar-brand a text" href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=trangchuclient">Trang chủ</span></a>
    <a class="navbar-brand text">Về chúng tôi</a>
    <a class="navbar-brand text">Mượn sách</a>
    </div>
    <div>
    <a class="navbar-brand text dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    Thể loại
    </a>
    <div class="dropdown-menu bg-dark bg-gradient" style="margin-top: 1.3%; margin-left: 28px; opacity: 0.9;">
        <a class="dropdown-item text" href="">aaa</a>
        <a class="dropdown-item text" href="">nnn</a>
        <a class="dropdown-item text" href="">aaa</a>
        <a class="dropdown-item text" href="">nnn</a>
        <a class="dropdown-item text" href="">aaa</a>
    </div>
    </div>
  </div>
  </form>
  <form class="d-flex" action="" style="width: 500px;">
        <input class="form-control me-2" type="search" placeholder="Nhập tên tài liệu" aria-label="Search">
        <button class="btn btn-outline-success bg-secondary text bg-gradient" type="submit">Search</button>
  </form>
  <form class="form-inline">
    <!-- Example split danger button -->
    
    <!-- Example single danger button -->
    
    <?php if (isset($_SESSION['taikhoan']) && isset($_SESSION['hoTen']) && isset($_SESSION['img']) && ($_SESSION['hoTen'] != "")) {
      echo '<div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle buttonDropdown" type="button" data-toggle="dropdown" aria-expanded="false">
      <span class= "mr-2 d-none d-lg-inline text-gray-600 small">'. $_SESSION['hoTen'] . '</span>
      <img src="public/client/image/'.$_SESSION['img'].'" alt="" class="img-profile rounded-circle"">
      </button>
      <div class="dropdown-menu bg-dark bg-gradient" style="opacity: 0.9; margin-top: 15px;">
        <a class="navbar-brand dropdown-item textdd" href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=thongtinnguoidung">Thông tin cá nhân</a>
        <button class="navbar-brand dropdown-item textdd" type="button" data-toggle="modal" data-target="#updateinfo" style="font-size: 16px;">
        Đổi mật khẩu
        </button>
        <a class="navbar-brand dropdown-item textdd" href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=thoat">Đăng xuất</a>
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
      <a class="navbar-brand dropdown-item textdd" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/thongtincanhan.php?tk='.$_SESSION['taikhoan'].'">Thông tin cá nhân</a>
      <button class="navbar-brand dropdown-item textdd" type="button" data-toggle="modal" data-target="#update" style="font-size: 16px;">
        Đổi mật khẩu
      </button>
      <a class="navbar-brand dropdown-item textdd" href="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php?act=thoat">Đăng xuất</a>
      </div> 
    </div>';
    } 
    else {
    ?>
      <a class="navbar-brand text-white" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangki.php">Đăng ký</a>
      <a class="navbar-brand text-white" href="http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php">Đăng nhập</a>
    <?php } ?>
  </form>
</nav>

<div id="updateinfo" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
        <div class="card" style="border-radius: 15px;">
            <div class="modal-header">
                <h1 class="modal-title">Đổi mật khẩu</h1>
            </div>
            <div class="card-body ">
            <div class="modal-body">
                <h4 class="mb-2"><?php echo "Tài khoản: " . $_SESSION['taikhoan'] ?></h4>
                <form method="post" action="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php" id="form-1">
                    <div class="form-group" style="margin-top: 2%;">
                    <label for="mkCU" class="form-label" id="basic-addon1" style="padding-right: 20px;">Mật khẩu cũ</label>
                    <input id="mk-cu" type="password" class="form-control" placeholder="Nhập mật khẩu cũ" aria-label="Username" aria-describedby="basic-addon1" name="mkCu" value="">
                    <span class="form-message invalid"></span>
                    </div>
                    <div class="form-group" style="margin-top: 2%;">
                    <label for="mkMoi" class="form-label" id="basic-addon1">Mật khẩu mới</label>
                    <input id="mk-moi" type="password" class="form-control" placeholder="Nhập mật khẩu mới" aria-label="Username" aria-describedby="basic-addon1" name="" value="">
                    <span class="form-message invalid"></span>  
                    </div>
                    <div class="form-group" style="margin-top: 2%;">
                    <label for="mkMoiXN" class="form-label" id="basic-addon1">Xác nhận mật khẩu mới</label>
                    <input id="mk-moixn" type="password" class="form-control" placeholder="Nhập mật khẩu mới" aria-label="Username" aria-describedby="basic-addon1" name="mkMoi" value="">
                    <span class="form-message invalid"></span>  
                    </div>
                    <div class="form-group" style="margin-top: 2%;">
                    <input type="submit" class="btn btn-primary btn-rounded btn-lg" value="Đổi mật khẩu" name="btn-doimatkhau">
                    </div> 
                </form>
            </div>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End create  -->
<script src="../../../../Web_QLTHUVIEN/config/validator.js"></script>
<script>

validator({
  form: '#form-1',
  errorSelector: '.form-message',
  rules: [
    validator.isRequired('#mk-cu'),
    validator.isRequired('#mk-moi'),
    validator.isRequired('#mk-moixn'),
    validator.minLength('#mk-cu', 6),
    validator.minLength('#mk-moi', 6),
    validator.minLength('#mk-moixn', 6),
    validator.maxLength('#mk-cu', 18),
    validator.maxLength('#mk-moi', 18),
    validator.maxLength('#mk-moixn', 18),
    validator.isComfirm('#mk-moixn', function() {
      return document.querySelector('#form-1 #mk-moi').value;
    }, 'Mật khẩu nhập không trùng!')
  ]
});

</script>
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

.invalid{
  color: red;
}
.navbar-brand:hover{
  color:  lightblue;
}
.text, .textdd{
  color: azure;
}
.textdd:hover{
  color: black;
}
.menu{
  color: blueviolet;
}
</style>