<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>

    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Sửa thông tin tác giả</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tên tác giả</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ngày sinh</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngaySinh">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nơi sinh</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="noiSinh" value="">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label">SĐT</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="html" name="gioiTinh" value="Nam">
                                <label for="html">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="gioiTinh" value="Nữ">
                                <label for="css">Nữ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-SuaTG">Sửa</button>
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