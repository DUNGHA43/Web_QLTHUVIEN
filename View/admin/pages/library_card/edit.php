<?php
// Thừa kế file layout.php
$pageTitle = "Vendor";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/connect.php";    
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";    
?>
<?php
    $smTTV = $_GET['maTTV'];
    $rs = getTG('tblthethuvien','maTheTV',$smTTV);
    $udTG = mysqli_fetch_array($rs);
?>
 <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thông tin thẻ thư viện</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="librarycard_Controller.php">
                    <input type="hidden" name="_token" value="<?php echo $udTG['maTheTV'] ?>">
                    <div class="form-group">
                        <label class="control-label">Tài khoản</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="taiKhoan" readonly value="<?php echo $udTG['taiKhoan'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ngày hết hạn</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngayHH" value="<?php echo $udTG['ngayHetHan'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số lần vi phạm</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soLanVP" value="<?php echo $udTG['soLanVP'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="trangThai" class="control-label">Trạng thái</label>
                        <div>
                            <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                            <select name="trangThai" id="" class='btn btn-light' style="width: 466px;">
                                <OPTION Value="Đã kích hoạt" <?php if("Đã kích hoạt" == $udTG['trangThai']) {echo 'selected';} ?>>Đã kích hoạt</OPTION>
                                <OPTION Value="Chưa kích hoạt" <?php if("Chưa kích hoạt" == $udTG['trangThai']) {echo 'selected';} ?>>Chưa kích hoạt</OPTION>
                                <OPTION Value="Hết hạn thẻ" <?php if("Hết hạn thẻ" == $udTG['trangThai']) {echo 'selected';} ?>>Hết hạn thẻ</OPTION>
                                <OPTION Value="Thẻ bị khóa" <?php if("Thẻ bị khóa" == $udTG['trangThai']) {echo 'selected';} ?>>Thẻ bị khóa</OPTION>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="moTa" class="control-label">Ghi chú</label>
                        <textarea class="form-control input-lg" name = "ghiChu" id="ghiChu" rows="3"><?php echo $udTG['ghiChu'] ?></textarea>
                        <span class="form-message invalid"></span> 
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-SuaTTV">Sửa</button>
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