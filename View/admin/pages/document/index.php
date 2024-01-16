<?php
// Thừa kế file layout.php
$pageTitle = "document";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>
<h1><span class="badge badge-secondary mb-5">Danh sách tài liệu</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="tailieu_Controller.php">
                <input type="text" placeholder="Nhập tên tài liệu cần tìm!" name="keyword" class="form-control" />
                <div class="input-group-append">
                    <input name="btn_Search" class="btn btn-success" type="submit" value="Tìm kiếm"></input>
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
            <th>Mã tài liệu</th>
            <th>Tên tài liệu</th>
            <th>Số lượng</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Hình ảnh</th>
            <th>Lựa chọn</th>
        </tr>
    </thead>
    <?php
    $smTL = $_GET['value'];
    if ($smTL == "") {
        $result = show_Info_All('tbltailieu');
    } else
        $result = show_Infor_ByName($smTL, 'tbltailieu', 'tenTaiLieu');
    while ($rows = mysqli_fetch_array($result)) { ?>
    <tbody>
        <tr>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTaiLieu'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['tenTaiLieu'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['soLuong'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTL'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTG'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 5px;"><img src="http://localhost/Web_QLTHUVIEN/public/client/image/<?php echo $rows['hinhAnh'] ?>" style="width: 50px; height: 50px;" alt=""></h6>
            </td>
            <td>
                <a href="tailieu_Controller.php?act=updateDCM&maDCM=<?php echo $rows['maTaiLieu']?>" class="btn btn-warning">Sửa</a>
                <a onclick="return Del('<?php echo $rows['maTaiLieu'] ?>')" href="tailieu_Controller.php?act=deleteDCM&maDCM=<?php echo $rows['maTaiLieu'] ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>


        <!-- End of product loop -->
    </tbody>
<?php } ?>
</table>
    <script>
        function Del(name) {
            return confirm("Bạn có muốn xóa tác giả : " + name + "?");
        }
    </script>
<!-- Create -->
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thêm tài liệu</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="tailieu_Controller.php" id="form_themTL">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label for="tenTL" class="control-label">Tên tên tài liệu</label>
                        <input id="tenTL" type="text" class="form-control input-lg" name="tenTL" value="">
                        <span class="form-message invalid"></span>  
                    </div>

                    <div class="form-group">
                        <label for="soLuong" class="control-label">Số lượng</label>
                        <input id="soLuong" type="number" class="form-control input-lg" name="soLuong" value="0" min="0">
                        <span class="form-message invalid"></span>  
                    </div>
                    
                    <div class="form-group">
                        <label for="nhaTG" class="control-label">Tác giả</label>
                            <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                            <select name="tacGia" id="nhaTG" class='btn btn-light' style="width: 466px;">
                            <?php 
                                $resultTG = show_Info_All('tbltacgia');
                                while ($rows = mysqli_fetch_array($resultTG)) {
                            ?>
                                <OPTION Value="<?php echo $rows['tenTG']; ?>"><?php echo $rows['tenTG']; ?></OPTION>
                            <?php 
                            }
                            ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="nhaCC" class="control-label">Nhà cung cấp</label>
                        <div>
                            <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                            <select name="nhaCC" id="" class='btn btn-light' style="width: 466px;">
                            <?php 
                                $resultNCC = show_Info_All('tblnhacungcap');
                                while ($rows = mysqli_fetch_array($resultNCC)) {
                            ?>
                                <OPTION Value="<?php echo $rows['tenNCC']; ?>"><?php echo $rows['tenNCC']; ?></OPTION>
                            <?php 
                            }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="theLoai" class="control-label">Thể loại</label>
                        <div>
                            <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                            <select name="theLoai" id="" class='btn btn-light' style="width: 466px;">
                            <?php 
                                $resultTL = show_Info_All('tbltheloai');
                                while ($rows = mysqli_fetch_array($resultTL)) {
                            ?>
                                <OPTION Value="<?php echo $rows['tenTL']; ?>"><?php echo $rows['tenTL']; ?></OPTION>
                            <?php 
                            }
                            ?>
                            </select>
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
                        <label for="moTa" class="control-label">Mô tả</label>
                        <textarea class="form-control input-lg" name = "moTa" id="moTa" rows="3"></textarea>
                        <span class="form-message invalid"></span> 
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <input type="submit" class="btn btn-success ml-auto" name="btn-ThemTL">
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End create  -->
<script src="../../../../Web_QLTHUVIEN/config/validator.js"></script>
<script>
validator({
  form: '#form_themTL',
  errorSelector: '.form-message',
  rules: [
    validator.isRequired('#tenTL'),
    validator.isRequired('#soLuong'),
  ]
});
</script>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>
<style>
    .invalid{
        color: red;
    }
</style>