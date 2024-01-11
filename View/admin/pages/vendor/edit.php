<?php
// Thừa kế file layout.php
$pageTitle = "Vendor";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/connect.php";    
include "../Web_QLTHUVIEN/Model/Author_Model.php";    
?>
<?php
    $smTG = $_GET['maNCC'];
    $rs = getTG('tblnhacungcap','maNCC',$smTG);
    $udTG = mysqli_fetch_array($rs);
?>
<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa thông nhà cung cấp</h1>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="nhacungcap_Controller.php">
                <input type="hidden" name="maNCC" value="<?php echo $udTG['maNCC']; ?>">
                <div class="form-group">
                    <label class="control-label">Tên tác giả</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="tenNCC" value="<?php echo $udTG['tenNCC']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="soDT" value="<?php echo $udTG['soDT']; ?>">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label">Địa chỉ</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="diaChi" value="<?php echo $udTG['diaChi']; ?>">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="d-flex">
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="btn-SuaNCC" value="Sửa">
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