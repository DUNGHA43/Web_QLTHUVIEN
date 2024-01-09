<?php
// Thừa kế file layout.php
$pageTitle = "Vendor";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>
<h1><span class="badge badge-secondary mb-5">Nhà cung cấp!</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
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
            <th>Mã nhà cung cấp</th>
            <th>Tên nhà cung cấp</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Lựa chọn</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <a href="" class='btn btn-warning'>Sửa</a>
                <a href="" class='btn btn-danger'>Xóa</a>

            </td>
        </tr>


        <!-- End of product loop -->
    </tbody>


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
                <h1 class="modal-title">Thêm nhà cung cấp</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Mã nhà cung cấp</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên nhà cung cấp</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="ngaySinh">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số điện thoại</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="noiSinh" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Địa chỉ</label>
                        <div>
                            <input type="number" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>


                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="html" name="fav_language" value="HTML">
                                <label for=" html">Nam</label>
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