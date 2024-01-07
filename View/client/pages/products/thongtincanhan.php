<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/account_Model.php";
$row = mysqli_fetch_array(showUser($_SESSION['taikhoan']));
$tmpimg;
?>
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Chọn ảnh</h1>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="http://localhost/Web_QLTHUVIEN/config/process-form.php">
                        <div class="form-group">
                        <label for="image">Image file</label>
                        <input type="file" id="image" name="image">
                        <input type="submit" value="upload" name="submit">
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End create  -->
<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-8">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
            <button class="rounded-circle img-fluid" type="button" data-toggle="modal" data-target="#Create">
                <?php 
                if(isset($_SESSION['update_img']))
                {
                    $_SESSION['img'] = $_SESSION['update_img'];
                }
                ?>
                <img src="public/client/image/<?php if(isset($_SESSION['img'])){ echo $_SESSION['img']; } else if(isset($_COOKIE['img'])){echo $_COOKIE['img'];} ?>"
                class="rounded-circle img-fluid" style="width: 100px;" />
            </button>
            </div>
            <h4 class="mb-2"><?php echo $_SESSION['taikhoan'] ?></h4>
            <form action="http://localhost/Web_QLTHUVIEN/Controller/account_Controller.php" method="post">
            <div class="input-group mb-3" style="margin-top: 5%;">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 10px;">Mã sinh viên</span>
            <input type="text" class="form-control" placeholder="Nhập mã sinh viên" aria-label="Username" aria-describedby="basic-addon1" name="masv" value="<?php echo $row['maSV']; ?>">
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 50px;">Họ tên</span>
            <input type="text" class="form-control" placeholder="Nhập họ tên" aria-label="name" aria-describedby="basic-addon1" name="hoten" value="<?php echo $row['hoTen']; ?>">
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 28px;">Ngày sinh</span>
            <input type="date" class="form-control" placeholder="Nhập số điện thoại" aria-label="name" aria-describedby="basic-addon1" name="ngaysinh" value="<?php echo $row['ngaySinh']; ?>">
            <span class="input-group-text" id="basic-addon1" style="margin-right: 20px; margin-left: 10px;">Giới tính</span>
            <label class="form-check-label" style="margin-right: 1%; margin-top: 1%;"> 
                <input type="radio" name="gender" value="male" class="form-check-input" <?php if($row["gioiTinh"] == "male"){?>checked<?php }?>> Nam
                <input type="radio" name="gender" value="female" class="form-check-input" <?php if($row["gioiTinh"] == "female"){?>checked<?php }?>> Nữ
            </label>
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 47px;">Liên hệ</span>
            <input type="text" class="form-control" placeholder="Nhập số điện thoại" aria-label="name" aria-describedby="basic-addon1" name="sodt" value="<?php echo $row['soDT']; ?>">
            <span class="input-group-text" id="basic-addon1" style="margin-left: 10px;">Email</span>
            <input type="text" class="form-control" placeholder="Nhập email" aria-label="name" aria-describedby="basic-addon1" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 32px;">Căn cước</span>
            <input type="text" class="form-control" placeholder="Nhập căn cước công dân" aria-label="name" aria-describedby="basic-addon1" name="cancuoc" value="<?php echo $row['soCCCD']; ?>">
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 50px;">Địa chỉ</span>
            <input type="text" class="form-control" placeholder="Nhập địa chỉ" aria-label="name" aria-describedby="basic-addon1" name="diachi" value="<?php echo $row['diaChi']; ?>">
            </div>
            <input type="submit" class="btn btn-primary btn-rounded btn-lg" value="Cập nhật" name="btn-capnhat">
            </input>
            </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php 
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra
$htmlFilePath = CLIENT_PATH . 'layouts/default.php';
include $htmlFilePath; // Thực hiện thừa kế
?>