<?php
$dataFile = MODEL_PATH . 'show_Documents.php';
include $dataFile;
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include '../Web_QLTHUVIEN/Model/CRUD_Model.php';
?>
<div class="container-fluid bg-light bg-gradient">
    <div class="container header d-flex justify-content-center">
        <div class="row w-75 mt-5">
            <div class="input-group" style="margin-top: 5%;">
            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['value']))
    {
    if($_GET['value'] == ""){ ?> 
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1>Tài liệu mới</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $dcmNew = show_List_DCMs_New();
            while ($rows = $dcmNew->fetch_assoc()) {
            ?>
                <div class="col-3" style="padding-top: 20px;">
                    <div class="card" style="width: 18rem; height: 580px;">
                        <img src="public/client/image/<?php echo $rows['hinhAnh'] ?>" class="card-img-top" alt="..." style=" height: 300px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rows['tenTaiLieu'] ?></h5>
                            <p class="card-text" id="<?php echo $rows['maTaiLieu'].'1' ?>"><?php echo $rows['moTa'] ?></p>
                            <h6 href="#" class="" style="bottom: 0;">Trạng thái: <?php if($rows['soLuong'] > 0 ){ echo "Còn sách"; }else{ echo "Đang hết";} ?></h6>
                        </div>
                    </div>
                </div>
            <?php 
                echo " <script>
                document.addEventListener('DOMContentLoaded', function() {
                var paragraph = document.getElementById('".$rows['maTaiLieu']."1');
                var text = paragraph.textContent;
                var maxLength = 180;
                var shortenedText = text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
                paragraph.textContent = shortenedText;
                });
                </script>";
            }
            ?>
        </div>
    </div>
        <?php }}?>

    <?php
    $smTL = "";
    if(isset($_GET['value']))
    {
        $smTL = $_GET['value'];
    }
    if(isset($_GET['btn']) == 'search') {
        $cGR = show_Infor_ByName($smTL, 'tbltailieu', 'tenTaiLieu');      
        while ($rowsCGR = $cGR->fetch_assoc()) {
        ?>
            <div class="row">
                    <div class="col-12">
                        <h1>Thể loại <?php echo getMaByTen('tenTL', 'tbltheloai', 'maTL', $rowsCGR['maTL'])?></h1>
                    </div>
                </div>
            <div class="col-3" style="padding-top: 20px;">
                <div class="card" style="width: 18rem; height: 580px;">
                    <img src="public/client/image/<?php echo $rowsCGR['hinhAnh']; ?>" class="card-img-top" alt="..." style=" height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rowsCGR['tenTaiLieu']; ?></h5>
                        <p class="card-text" id="<?php echo $rowsCGR['maTaiLieu']; ?>"><?php echo $rowsCGR['moTa'] ?></p>
                        <h6 href="#" class="">Trạng thái: <?php if($rowsCGR['soLuong'] > 0 ){ echo "Còn sách"; }else{ echo "Đang hết";} ?></h6>
                    </div>
                </div>
            </div>
                <?php 
                    echo " <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    var paragraph = document.getElementById('".$rowsCGR['maTaiLieu']."');
                    var text = paragraph.textContent;

                    // Giới hạn độ dài của đoạn văn bản
                    var maxLength = 180;
                    var shortenedText = text.length > maxLength ? text.substring(0, maxLength) + '...' : text;

                    // Gán văn bản đã giới hạn vào thẻ <p>
                    paragraph.textContent = shortenedText;
                    });
                    </script>";
        
                } ?>
                </div>
            </div>
        <?php } ?>
    <?php 
    if($smTL == "")
    {
        $cGR = showCGR();
    }else
    {
        $cGR = showCGRByCode($smTL);
    }
    while ($rowsCGR = $cGR->fetch_assoc()) {
    ?>
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <h1>Thể loại <?php echo $rowsCGR['tenTL'] ?></h1>
                </div>
            </div>
            <div class="row">
                <?php
                $dcmByCGR = showDCM_BY_CGR($rowsCGR['maTL']);
                while ($rowsDCM = $dcmByCGR->fetch_assoc()) {
                ?>
                    <div class="col-3" style="padding-top: 20px;">
                        <div class="card" style="width: 18rem; height: 580px;">
                            <img src="public/client/image/<?php echo $rowsDCM['hinhAnh']; ?>" class="card-img-top" alt="..." style=" height: 300px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rowsDCM['tenTaiLieu']; ?></h5>
                                <p class="card-text" id="<?php echo $rowsDCM['maTaiLieu']; ?>"><?php echo $rowsDCM['moTa'] ?></p>
                                <h6 href="#" class="">Trạng thái: <?php if($rowsDCM['soLuong'] > 0 ){ echo "Còn sách"; }else{ echo "Đang hết";} ?></h6>
                            </div>
                        </div>
                    </div>
            <?php 
                               echo " <script>
                               document.addEventListener('DOMContentLoaded', function() {
                               var paragraph = document.getElementById('".$rowsDCM['maTaiLieu']."');
                               var text = paragraph.textContent;
       
                               // Giới hạn độ dài của đoạn văn bản
                               var maxLength = 180;
                               var shortenedText = text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
       
                               // Gán văn bản đã giới hạn vào thẻ <p>
                               paragraph.textContent = shortenedText;
                               });
                            </script>";
                }
            } ?>
            </div></div>
        </div>
        </div>
        </div>
    </div>
</div>
<style>
    .card{
        position: relative; /* Đặt vị trí của thẻ cha là relative */
        width: 18rem;
    }
    .card h6 {
      position: absolute; /* Đặt vị trí của thẻ a là absolute */
      bottom: 0; /* Hiển thị ở phía dưới của thẻ cha */
      left: 0;
      padding: 10px; /* Thêm padding nếu cần thiết */
      margin-bottom: 10px;
      margin-left: 10px;
    }
</style>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = CLIENT_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>