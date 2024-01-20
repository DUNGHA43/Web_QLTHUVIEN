<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
$maTTV = "";
$lyDo = "";
$maTL = "";
if(isset($_GET['maTTV']) && isset($_GET['value']))
{
    $maTTV = $_GET['maTTV'];
    $lyDo = "Trả muộn tài liệu " . $_GET['value'];
    $maTL = $_GET['maTL'];
}
?>
<h1><span class="badge badge-secondary mb-5">Danh sách trả muộn</span></h1>

<div class="container-fluid">
    <div class="col d-flex justify-content-center">
        <form action="violations_Controller.php" method="post" style="width: 100%;">
        <input type="hidden" name="_token" value="<?php echo $maTL; ?>">
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 20px;">Thẻ thư viện</span>
            <input type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="maTTV" value="<?php echo $maTTV; ?>" style="margin-right: 10px; width: auto;" readonly>
            <span class="input-group-text" id="basic-addon1" style="padding-right: 20px;">Lý do vi phạm</span>
            <input type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="lyDoVP" value="<?php echo $lyDo; ?>" style="width: auto; margin-right: 10px;">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 20px;">Hình thức xử lý</span>
            <select name="hinhThuc" class="form-control" aria-label="name" aria-describedby="basic-addon1" style="width: auto;">
                <option value="Cảnh cáo">Cảnh cáo</option>
                <option value="Khóa tài khoản">Khóa tài khoản</option>
            </select>
            <button type="submit" name="btn-ThemViPham" class="btn btn-success" style="width: 80px; margin-left: 5px;">Xử lý</button>
            </div>
        </form>
    </div>  
</div>

<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Thẻ thư viện</th>
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
        $result = show_Info_Borrow_Return('tblqlmuontra');
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
                    <a href="violations_Controller.php?act=chonvippham&maTTV=<?php echo $rows['maTheTV']; ?>&tenTL=<?php echo getNameOrCodeDCM('tenTaiLieu', 'maTaiLieu', $rows['maTaiLieu'], 'tenTaiLieu'); ?>" class="btn btn-success">Chọn</a>
                </td>
            </tr>


            <!-- End of product loop -->
        </tbody>
    <?php } ?>    
</table>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>