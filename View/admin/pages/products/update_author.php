<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra     

include "../Web_QLTHUVIEN/Model/connect.php";    
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";    
?>
<?php
    $smTG = $_GET['maTG'];
    $rs = getTG('tbltacgia','maTG',$smTG);
    $udTG = mysqli_fetch_array($rs);
?>
    
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Sửa thông tin tác giả</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="maTG" value="<?php echo$udTG['maTG'];?>">
                    <div class="form-group">
                        <label class="control-label">Tên tác giả</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="<?php echo $udTG['tenTG'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ngày sinh</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngaySinh" value="<?php echo $udTG['ngaySinh'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nơi sinh</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="noiSinh" value="<?php echo $udTG['noiSinh'];?>">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label">SĐT</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="<?php echo $udTG['soDT'];?>">
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

                    <div class="form-group ">
                        <div class="d-flex">
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="btn-SuaTG" value="Sửa">
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