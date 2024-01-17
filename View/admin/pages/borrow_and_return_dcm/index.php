<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>
<h1><span class="badge badge-secondary mb-5">Danh sách mượn trả!</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="muontra_Controller.php">
                <input type="text" placeholder="Nhập mã thẻ thư viện" name="keyword" class="form-control" />
                <div class="input-group-append">
                    <input name="btn_Search" class="btn btn-success" type="submit" value="Tìm kiếm"></input>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex">
        <div class=" col-md-4 d-flex ml-auto">
        </div>
    </div>
</div>


<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Mã thẻ thư viện</th>
            <th>Ngày nhận</th>
            <th>Ngày hẹn trả</th>
            <th>Ngày hoàn trả</th>
            <th>Tài liệu mượn</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>
            <th>Lựa chọn</th>
        </tr>
        <?php
    $maTTV = $_GET['maTTV'];
    $smTTV = $_GET['value'];
    if ($smTTV == "" && $maTTV == "") {
        $result = show_Info_All('tblqlmuontra');
    } else if ($smTTV == "") {
        $result = show_Infor_ByName($maTTV,'tblqlmuontra','maTheTV');}
    else{ $result = show_Infor_ByName($smTTV,'tblqlmuontra','maTheTV'); }
    while ($rows = mysqli_fetch_array($result)) {
    ?>
        <tbody>
            <tr>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['maTheTV'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ngayMuon'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ngayHenTra'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ngayHoanTra'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo getNameOrCodeDCM('tenTaiLieu', 'maTaiLieu', $rows['maTaiLieu'], 'tenTaiLieu'); ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['soLuong'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['trangThai'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ghiChu'] ?></h6>
                </td>
                <td>
                    <a href="#" class="btn btn-success">Đã nhận</a>
                    <a href="#" class="btn btn-success">Đã trả</a>
                    <a href="#" class="btn btn-danger">Xóa</a>
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
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>