<?php
// Thừa kế file layout.php
$pageTitle = "Document";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/connect.php";    
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";    
?>
<?php
    $smTG = $_GET['maTK'];
    $rs = getTG('tbltaikhoan','taikhoan',$smTG);
    $udTG = mysqli_fetch_array($rs);
?>
<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa thông tin tài khoản</h1>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" enctype="multipart/form-data" action="account_Controller.php">
                <input type="hidden" name="taikhoan" value="<?php echo $udTG['taiKhoan']; ?>">
                <div class="form-group">
                    <label class="control-label">Tài khoản</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="taiKhoan" value="<?php echo $udTG['taiKhoan']; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label">Mật khẩu</label>
                    <div>
                        <input type="password" class="form-control input-lg" name="matKhau" value="<?php echo $udTG['matKhau']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Mã SV</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="maSV" value="<?php echo $udTG['maSV']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Họ tên</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="hoTen" value="<?php echo $udTG['hoTen']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Ngày sinh</label>
                    <div>
                        <input type="date" class="form-control input-lg" name="ngaySinh" value="<?php echo $udTG['ngaySinh']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Số CCCD</label>
                    <div>
                        <input type="number" class="form-control input-lg" name="soCCCD" value="<?php echo $udTG['soCCCD']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <div>
                        <input type="number" class="form-control input-lg" name="soDienThoai" value="<?php echo $udTG['soDT']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Email</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="email" value="<?php echo $udTG['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="html" name="gioiTinh" value="Nam" required 
                                <?php
                                if($udTG['gioiTinh'] == "Nam")
                                    echo 'checked';
                                ?>
                                >
                                <label for="html">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="gioiTinh" value="Nữ" required 
                                <?php
                                if($udTG['gioiTinh'] == "Nữ")
                                    echo 'checked';
                                ?>
                                >
                                <label for="css">Nữ</label>
                                
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="control-label">Địa chỉ</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="diaChi" value="<?php echo $udTG['diaChi']; ?>">
                    </div>
                </div>
                <div class="form-group">
                        <label for="hinhAnh" class="control-label">Hình ảnh</label>
                        <div>
                                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
                                <label for="image">Image file</label>
                                <input type="file" id="image" name="image" onchange="getFileName()"> <br>
                                Hình ảnh hiện tại: <input type="text" readonly id="output" name="outputNameIMG" value="<?php echo $udTG['anhTaiKhoan']; ?>">
                                <script>  
                                    function getFileName() {
                                        // Lấy thẻ input file
                                        var input = document.getElementById('image');

                                        // Kiểm tra xem đã chọn file hay chưa
                                        if (input.files.length > 0) {
                                            // Lấy tên của file
                                            var fileName = input.files[0].name;
                                            var outputInput = document.getElementById('output');
                                            outputInput.value = fileName;
                                            // Hiển thị tên của file (hoặc bạn có thể thực hiện bất kỳ hành động nào khác với tên file)
                                        }
                                    }
                                </script>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="control-label">Quyền</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="quyen" value="<?php echo $udTG['maQuyen']; ?>">
                    </div>
                </div>


                <div class="form-group ">
                    <div class="d-flex">
                        <input type="submit" class="btn btn-success ml-auto" name="btn-SuaTaiKhoan" value="Sửa"></input>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-dialog -->
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>