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
            <form id="form-search" class="input-group" method="POST" action="nhacungcap_Controller.php">
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
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Số CCCD</th>
            <th>Số ĐT</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Quyền</th>
            <th>Action</th>

        </tr>

    <tbody>
        <tr>
            <td>
                <h6>
                    admin
                </h6>
            </td>
            <td>
                <h6>
                    123
                </h6>
            </td>

            <td>
                <h6>
                    MASV
                </h6>
            </td>

            <td>
                <h6>
                    Trần Vũ Hoàng
                </h6>
            </td>

            <td>
                <h6>
                    25/02/2003
                </h6>
            </td>

            <td>
                <h6>
                    0989289777777
                </h6>
            </td>

            <td>
                <h6>
                    037203000895
                </h6>
            </td>


            <td>
                <h6>
                    Email@gmail.com
                </h6>
            </td>

            <td>
                <h6>
                    Hà Nội
                </h6>
            </td>

            <td>
                <h6>
                    Quyền
                </h6>
            </td>
            <td>
                <!--    -->
                <a href="nhacungcap_Controller.php?act=updatencc&maNCC=<?php echo $rows['maNCC'] ?>" class="btn btn-warning">Sửa</a>
                <a href="nhacungcap_Controller.php?act=deletencc&maNCC=<?php echo $rows['maNCC'] ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>


        <!-- End of product loop -->

        <div id="Create" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Thêm thể loại</h1>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="nhacungcap_Controller.php">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group">
                                <label class="control-label">Tài khoản</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="taiKhoan">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Mật khẩu</label>
                                <div>
                                    <input type="password" class="form-control input-lg" name="matKhau">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Mã SV</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="maSV">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Họ tên</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="hoTen">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Ngày sinh</label>
                                <div>
                                    <input type="date" class="form-control input-lg" name="ngaySinh">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Số CCCD</label>
                                <div>
                                    <input type="number" class="form-control input-lg" name="soCCCD">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <div>
                                    <input type="number" class="form-control input-lg" name="soDienThoai">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Địa chỉ</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="diaChi">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Quyền</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="quyen">
                                </div>
                            </div>


                            <div class="form-group ">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-success ml-auto" name="btn-ThemNCC">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End create  -->
    </tbody>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>