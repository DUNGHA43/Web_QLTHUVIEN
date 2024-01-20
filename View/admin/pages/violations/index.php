<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/CRUD_Model.php";
?>
<h1><span class="badge badge-secondary mb-5">Danh sách xử lý vi phạm</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">
        <a href="violations_Controller.php?act=danhsachtramuon" class="btn btn-success">Danh sách trả muộn</a>
        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="violations_Controller.php">
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
            <th>Mã Xử lý</th>
            <th>Thẻ thư viện</th>
            <th>Lý do vi phạm</th>
            <th>Hình thức xử lý</th>
            <th>Ngày xử lý</th>
            <th>Lựa chọn</th>
        </tr>
        <?php
    $maTTV = $_GET['maTTV'];
    $smTTV = $_GET['value'];
    if ($smTTV == "" && $maTTV == "") {
        $result = show_Info_All('tblxulyvipham');
    } else if ($smTTV == "") {
        $result = show_Infor_ByName($maTTV,'tblxulyvipham','maTheTV');}
    else{ 
        $result = show_Infor_ByName($smTTV,'tblxulyvipham','maTheTV'); }
    while ($rows = mysqli_fetch_array($result)) {
    ?>
        <tbody>
            <tr>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['maXLVP'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['maTheTV'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['lydoVP'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['hinhThucXuLy'] ?></h6>
                </td>
                <td>
                    <h6 style="padding-top: 10px;"><?php echo $rows['ngayXuLy'] ?></h6>
                </td>
                <td>
                    <a onclick="return Del('<?php echo $rows['maXLVP'] ?>')" href="violations_Controller.php?act=xoavipham&maXL=<?php echo $rows['maXLVP'] ?>&maTTV=<?php echo $rows['maTheTV'] ?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>


            <!-- End of product loop -->
        </tbody>
    <?php } ?>    


    <script>
        function Del(name) {
            return confirm("Bạn có muốn xóa vi phạm mã : " + name + "?");
        }
    </script>
</table>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>