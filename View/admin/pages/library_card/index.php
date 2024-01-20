<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>
<h1><span class="badge badge-secondary mb-5">Thẻ thư viện!</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="librarycard_Controller.php">
                <input type="text" placeholder="Nhập tên tài khoản cần tìm thẻ thư viện!" name="keyword" class="form-control" />
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
            <th>Mã thẻ thu viện</th>
            <th>Tài khoản</th>
            <th>Ngày hết hạn</th>
            <th>Số lần vi phạm</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>
            <th>Lựa chọn</th>
        </tr>
        <?php
    $smTTV = $_GET['value'];
    if ($smTTV == "") {
        $result = show_Info_All('tblthethuvien');
    } else{
        $result = show_Infor_ByName($smTTV,'tblthethuvien','taikhoan');}
    while ($rows = mysqli_fetch_array($result)) {
    ?>
        <tbody>
            <tr>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['maTheTV'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['taiKhoan'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ngayHetHan'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['soLanVP'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['trangThai'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ghiChu'] ?></h6>
                </td>
                <td>
                    <?php 
                    if($rows['trangThai'] == "Thẻ bị khóa" )
                    {?>
                        <a href="muontra_Controller.php?act=muonsach&maTTV=<?php echo $rows['maTheTV'] ?>&trangThai=<?php echo $rows['trangThai']; ?>" class="btn btn-secondary" style="pointer-events: none;">Mượn sách</a>
                    <?php }
                    else{ ?>
                        <a href="muontra_Controller.php?act=muonsach&maTTV=<?php echo $rows['maTheTV'] ?>&trangThai=<?php echo $rows['trangThai']; ?>" class="btn btn-success">Mượn sách</a>
                    <?php }?>
                    <a href="muontra_Controller.php?act=sachmuon&maTTV=<?php echo $rows['maTheTV'] ?>" class="btn btn-success">Đang mượn</a>
                    <a href="librarycard_Controller.php?act=updatettv&maTTV=<?php echo $rows['maTheTV'] ?>" class="btn btn-warning">Sửa</a>
                    <a onclick="return Del('<?php echo $rows['maTheTV'] ?>')" href="librarycard_Controller.php?act=deletettv&maTTV=<?php echo $rows['maTheTV'] ?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>


            <!-- End of product loop -->
        </tbody>
    <?php } ?>    


    <script>
        function Del(name) {
            return confirm("Bạn có muốn xóa thẻ thư viện : " + name + "?");
        }
    </script>
</table>
<!-- Create -->
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thêm thẻ thư viện</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="librarycard_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tài khoản cần đăng ký thẻ</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="taiKhoan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ngày hết hạn</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngayHH" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số lần vi phạm</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soLanVP" value="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="trangThai" class="control-label">Trạng thái</label>
                        <div>
                            <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                            <select name="trangThai" id="" class='btn btn-light' style="width: 466px;">
                                <OPTION Value="Đã kích hoạt">Đã kích hoạt</OPTION>
                                <OPTION Value="Chưa kích hoạt">Chưa kích hoạt</OPTION>
                                <OPTION Value="Hết hạn thẻ">Hết hạn thẻ</OPTION>
                                <OPTION Value="Hết hạn thẻ">Thẻ bị khóa</OPTION>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="moTa" class="control-label">Ghi chú</label>
                        <textarea class="form-control input-lg" name = "ghiChu" id="ghiChu" rows="3"></textarea>
                        <span class="form-message invalid"></span> 
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-ThemTTV">Thêm</button>
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