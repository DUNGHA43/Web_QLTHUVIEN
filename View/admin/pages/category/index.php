<?php
// Thừa kế file layout.php
$pageTitle = "Vendor";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>
<h1><span class="badge badge-secondary mb-5">Thể loại</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="category.php">
                <input type="text" placeholder="Nhập tên thể loại cần tìm" name="keyword" class="form-control" />
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
            <th>Mã thể loại</th>
            <th>Tên thể loại</th>
            <th>Lựa chọn</th>
        </tr>
        <?php
        $smTG = $_GET['value'];
        if ($smTG == "") {
            $result = show_Info_All('tbltheloai');
        } else
            $result = show_Infor_ByName($smTG, 'tbltheloai', 'tenTL');
        while ($rows = mysqli_fetch_array($result)) {
        ?>
    <tbody>
        <tr>
            <td>
                <h6><?php echo $rows['maTL'] ?></h6>
            </td>
            <td>
                <h6><?php echo $rows['tenTL'] ?></h6>
            </td>
            <td>
                <!--    -->
                <a href="category.php?act=updateTL&maTL=<?php echo $rows['maTL'] ?>" class="btn btn-warning">Sửa</a>
                <a onclick="return Del('<?php echo $rows['maTL'] ?>')" href="category.php?act=deleteTL&maTL=<?php echo $rows['maTL'] ?>" class="btn btn-danger">Xóa</a>
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
                        <h1 class="modal-title">Thêm thể loại</h1>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="category.php">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group">
                                <label class="control-label">Mã thể loại</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="maTL">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Tên thể loại</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="tenTL">
                                </div>
                            </div>



                            <div class="form-group ">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-success ml-auto" name="btn-theloai">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End create  -->
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>