<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>

<div class="modal-header">
                <h1 class="modal-title">Thống Kê Tài Liệu</h1>
            </div>
<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Mã tài liệu</th>
            <th>Tên tài liệu</th>
            <th>Hình ảnh</th>
            <th>Số Lượng Còn</th>
            <th>Số Lượng Mượn</th>
            <th>Số Lượng Tổng</th>
        </tr>
    </thead>
    <?php
        $result = ThongKeKho();
    while ($rows = mysqli_fetch_array($result)) { ?>
    <tbody>
        <tr>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTaiLieu'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['tenTaiLieu'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 5px;"><img src="http://localhost/Web_QLTHUVIEN/public/client/image/<?php echo $rows['hinhAnh'] ?>" style="width: 50px; height: 50px;" alt=""></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['SoLuongCon'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['SoLuongMuon'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['SoLuongTong'] ?></h6>
            </td>
        </tr>


        <!-- End of product loop -->
    </tbody>
<?php } ?>
</table>


<div class="modal-header">
                <h1 class="modal-title">Thống Kê Người Dùng Đang Mượn</h1>
            </div>
<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Mã thẻ Thư viện</th>
            <th>Tài Khoản</th>
            <th>Tên tài liệu</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <?php
        $result = MuonTaiLieu();
    while ($rows = mysqli_fetch_array($result)) { ?>
    <tbody>
        <tr>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTheTV'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['taiKhoan'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['tenTaiLieu'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['trangThai'] ?></h6>
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