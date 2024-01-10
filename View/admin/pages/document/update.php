<?php
// Thừa kế file layout.php
$pageTitle = "Document";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/connect.php";    
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";    
?>
<?php
    $smTG = $_GET['maDCM'];
    $rs = getTG('tbltailieu','maTaiLieu',$smTG);
    $udTG = mysqli_fetch_array($rs);
?>
<div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Sửa tài liệu</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="tailieu_Controller.php" id="form_themTL">
                    <input type="hidden" name="_token" value="<?php echo $udTG['maTaiLieu']; ?>">
                    <input type="hidden" name="date" value="<?php echo $udTG['ngayThem'] ?>">
                    <div class="form-group">
                        <label for="tenTL" class="control-label">Tên tên tài liệu</label>
                        <input id="tenTL" type="text" class="form-control input-lg" name="tenTL" value="<?php echo $udTG['tenTaiLieu']; ?>">
                        <span class="form-message invalid"></span>  
                    </div>

                    <div class="form-group">
                        <label for="soLuong" class="control-label">Số lượng</label>
                        <input id="soLuong" type="number" class="form-control input-lg" name="soLuong" value="<?php echo $udTG['soLuong']; ?>" min="0">
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
                                <OPTION Value="<?php echo $rows['tenTG']; ?>" <?php if($rows['maTG'] == $udTG['maTG']) {echo 'selected';} ?>><?php echo $rows['tenTG']; ?></OPTION>
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
                                <OPTION Value="<?php echo $rows['tenNCC']; ?>" <?php if($rows['maNCC'] == $udTG['maNCC']) {echo 'selected';} ?>><?php echo $rows['tenNCC']; ?></OPTION>
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
                                <OPTION Value="<?php echo $rows['tenTL']; ?>" <?php if($rows['maTL'] == $udTG['maTL']) {echo 'selected';} ?>><?php echo $rows['tenTL']; ?></OPTION>
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
                                <input type="file" id="image" name="image" onchange="getFileName()"> <br>
                                Hình ảnh hiện tại: <input type="text" readonly id="output" name="outputNameIMG" value="<?php echo $udTG['hinhAnh']; ?>">
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
                        <textarea class="form-control input-lg" name = "moTa" id="moTa" rows="3"><?php echo $udTG['moTa'] ?></textarea>
                        <span class="form-message invalid"></span> 
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <input type="submit" class="btn btn-success ml-auto" name="btn-SuaTL">
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>