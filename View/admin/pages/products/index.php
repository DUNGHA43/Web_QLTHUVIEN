<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>



<h1><span class="badge badge-secondary mb-5">Sửa tên ở đây nè!</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6">
            <form action="path" method="POST" class="form-change-multi">
                <div class="d-flex align-items-start">
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ids" value="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form id="form-search" class="input-group" method="POST" action="author_Controller.php">
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
            <th>Mã tác giả</th>
            <th>Tên tác giả</th>
            <th>Ngày sinh</th>
            <th>Nơi sinh</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th>Lựa chọn</th>
        </tr>
    </thead>
    <?php
    $smTG = $_GET['value'];
    if ($smTG == "") {
        $result = show_Info_All('tbltacgia');
    } else
        $result = show_Infor_ByName($smTG, 'tbltacgia', 'tenTG');
    while ($rows = mysqli_fetch_array($result)) {
    ?>
        <tbody>
            <tr>
                <td>
                    <h6><?php echo $rows['maTG'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['tenTG'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['ngaySinh'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['noiSinh'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['soDT'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['gioiTinh'] ?></h6>
                </td>
                <td>
                    <!--    -->
                    <a href="author_Controller.php?act=updatetacgia&maTG=<?php echo $rows['maTG'] ?>" class="btn btn-warning">Sửa</a>
                    <a onclick="return Del('<?php echo $rows['tenTG'] ?>')" href="author_Controller.php?act=deletetacgia&maTG=<?php echo $rows['maTG'] ?>" class="btn btn-danger">Xóa</a>
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
</table>
<!-- Create -->
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thêm tác giả</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tên tác giả</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="" required>
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
                            <input type="number" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>


                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="css" name="gioiTinh" value="Nam">
                                <label for=" css">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="gioiTinh" value="Nữ">
                                <label for="css">Nữ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-ThemTG">Thêm</button>
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