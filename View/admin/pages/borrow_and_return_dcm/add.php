<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}
?>
<h1><span class="badge badge-secondary mb-5">Tài liệu đã chọn</span></h1>

<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Mã tài liệu</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
        </tr>
        <?php
    $smTL = $_GET['value'];
    $maTTV = $_GET['maTTV'];
    if(isset($_SESSION['listTL']))
    {
    for($i=0; $i < sizeof($_SESSION['listTL']); $i++) { 
        $tmp = $_SESSION['listTL'][$i][0];
    ?>
    <tbody>
        <tr>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $tmp; ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $_SESSION['listTL'][$i][1]; ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $_SESSION['listTL'][$i][2]; ?></h6>
            </td>
        </tr>
        <!-- End of product loop -->
    </tbody>
    
        <?php }} ?>
    </thead>
</table>
<div class="container-fluid">
    <div class="col d-flex justify-content-center">
        <form action="muontra_Controller.php" method="post">
            <input type="hidden" name="_token" value="<?php echo $maTTV; ?>">
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1" style="padding-right: 50px;">Ngày hẹn trả</span>
            <input type="date" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="ngayHenTra" value="">
            <button type="submit" name="btn-addmuontra" class="btn btn-success" style="width: 80px; margin-left: 5px;">Thêm</button>
            </div>
        </form>
        <form action="">
        <a href="muontra_Controller.php?act=huythemTL&maTTV=<?php echo $maTTV ?>" class="btn btn-success" style="width: 80px; margin-left: 5px;">Hủy</a>
        </form>
    </div>  
</div>


<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-6 ">
        <h1>Danh sách tài liệu</h1>
        </div>
        <div class="col-6 mb-4" style="margin-top: 10px;">
            <form id="form-search" class="input-group" method="POST" action="librarycard_Controller.php">
                <input type="hidden" name="maTTV" value="<?php $maTTV; ?>">
                <input type="text" placeholder="Nhập tên tài liệu" name="keyword" class="form-control" />
                <div class="input-group-append">
                    <input name="btn_SearchDCM" class="btn btn-success" type="submit" value="Tìm kiếm"></input>
                </div>
            </form>
        </div>
    </div>
</div>


<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>Mã tài liệu</th>
            <th>Tên tài liệu</th>
            <th>Số lượng</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Hình ảnh</th>
            <th>Lựa chọn</th>
        </tr>
        <?php
    $smTL = $_GET['value'];
    if ($smTL == "") {
        $result = show_Info_All('tbltailieu');
    } else
        $result = show_Infor_ByName($smTL, 'tbltailieu', 'tenTaiLieu');
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
                <h6 style="padding-top: 15px;"><?php echo $rows['soLuong'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTL'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 15px;"><?php echo $rows['maTG'] ?></h6>
            </td>
            <td>
                <h6 style="padding-top: 5px;"><img src="http://localhost/Web_QLTHUVIEN/public/client/image/<?php echo $rows['hinhAnh'] ?>" style="width: 50px; height: 50px;" alt=""></h6>
            </td>
            <td>
                <a href="muontra_Controller.php?act=themTL&maTTV=<?php echo $maTTV; ?>&maTL=<?php echo getNameOrCodeDCM('maTaiLieu', 'tenTaiLieu', $rows['tenTaiLieu'], 'maTaiLieu');?>" class="btn btn-success" style="margin-top: 10px;">Chọn</a>
            </td>
        </tr>


        <!-- End of product loop -->
    </tbody>
    
        <?php } ?>
    </thead>
</table>
<script> alert('<?php echo $msg; ?>'); </script>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>