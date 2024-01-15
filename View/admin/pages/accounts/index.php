<?php
// Thừa kế file layout.php
$pageTitle = "Vendor";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>
<h1><span class="badge badge-secondary mb-5">Tài Khoản</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="account_Controller.php">
                <input type="text" placeholder="Input here!" name="keyword" class="form-control" />
                <div class="input-group-append">
                    <input name="btn_Search" class="btn btn-success" type="submit" value="Search"></input>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex">
        <div class=" col-md-4 d-flex ml-auto">
            <button type="button" class="btn btn-outline-success ml-auto" style="width:150px;" data-toggle="modal" data-target="#Create">
                Thêm +
            </button>
        </div>
    </div>
</div>


<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Số CCCD</th>
            <th>Số ĐT</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
            <th>Quyền</th>
            <th>Action</th>

        </tr>

        <?php
        $smTG = $_GET['value'];
        if ($smTG == "") {
            $result = show_Info_All('tbltaikhoan');
        } else
            $result = show_Infor_ByName($smTG,'tbltaikhoan', 'hoTen');
        while ($rows = mysqli_fetch_array($result)) {
        ?>
    <tbody>
        <tr>
            <td>
                <h6><?php echo $rows['taiKhoan'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['matKhau'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['maSV'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['hoTen'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['ngaySinh'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['soCCCD'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['soDT'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['email'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['gioiTinh'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['diaChi'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 5px;"><img src="http://localhost/Web_QLTHUVIEN/public/client/image/<?php echo $rows['anhTaiKhoan'] ?>" style="width: 50px; height: 50px;" alt=""></h6>
            </td>
            <td>
                <h6><?php echo $rows['maQuyen'] ?></h6>
            </td>
            <td>
                <!--    -->
                <a href="account_Controller.php?act=updateTaiKhoan&maTK=<?php echo $rows['taiKhoan'] ?>" class="btn btn-warning">Sửa</a>
                <a onclick="return Del('<?php echo $rows['taiKhoan'] ?>')" href="account_Controller.php?act=deleteTaiKhoan&maTK=<?php echo $rows['taiKhoan'] ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>


        <!-- End of product loop -->
    </tbody>
<?php } ?>

<script>
    function Del(name) {
        return confirm("Bạn có muốn xóa tác giả : " + name + "?");
    }
</script>


<!-- End of product loop -->

<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thêm tài khoản</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="account_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label for="taikhoan" class="control-label">Tài khoản</label>
                        <input id="taikhoan" type="text" class="form-control input-lg" name="taiKhoan" value="">
                        <span class="form-message invalid"></span>  
                    </div>


                    <div class="form-group">
                        <label for="matkhau" class="control-label">Mật khẩu</label>
                        <div>
                            <input id="matkhau" type="password" class="form-control input-lg" name="matKhau">
                        </div>
                        <span class="form-message invalid"></span>  
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mã SV</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="maSV">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Họ tên</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="hoTen">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ngày sinh</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngaySinh">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số CCCD</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soCCCD">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số điện thoại</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDienThoai">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Giới tính</label>
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="css" name="gioiTinh" value="Nam">
                                <label for=" html">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="gioiTinh" value="Nữ">
                                <label for="css">Nữ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Địa chỉ</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="diaChi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hinhAnh" class="control-label">Hình ảnh</label>
                        <div>
                                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
                                <label for="image">Image file</label>
                                <input type="file" id="image" name="image" onchange="getFileName()">
                                <input type="hidden" id="output" name="outputNameIMG">
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
                            <input type="text" class="form-control input-lg" name="quyen">
                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-ThemTaiKhoan">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End create  -->
</tbody>

<script src="../../../../Web_QLTHUVIEN/config/validator.js"></script>
<script>
validator({
  form: '#form1',
  errorSelector: '.form-message',
  rules: [
    validator.isRequired('#taikhoan'),
    validator.isRequired('#matkhau'),
  ]
});
</script>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>