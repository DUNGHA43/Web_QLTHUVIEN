<?php
// Thừa kế file layout.php
$pageTitle = "Vendor";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/connect.php";    
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";    
?>
<?php
    $smTG = $_GET['maTL'];
    $rs = getTG('tbltheloai','maTL',$smTG);
    $udTG = mysqli_fetch_array($rs);
?>
<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa thông thể loại</h1>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="category.php">
                <input type="hidden" name="maTL" value="<?php echo $udTG['maTL']; ?>">
                
                <div class="form-group">
                    <label class="control-label">Tên thể loại</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="tenTL" value="<?php echo $udTG['tenTL']; ?>">
                    </div>
                </div>


                <div class="form-group ">
                    <div class="d-flex">
                        <input type="submit" class="btn btn-success ml-auto" name="btn-suaTL" value="Sửa"></input>
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