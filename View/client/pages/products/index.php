<?php
    $dataFile = MODEL_PATH . 'hienthi.php';
    include $dataFile;
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>

<div class="container-fluid">
    <div class="container header d-flex justify-content-center">
        <div class="row w-75 mt-5">
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1>Ranking board</h1>
            </div>
        </div>
        
        <div class="row">
            <?php 
                while($rows = mysqli_fetch_array($result)){        
            ?>
            <div class="col-3" style="padding-top: 20px;">
                <div class="card" style="width: 18rem;">
                    <img src="public/image/<?php echo $rows['hinhAnh'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rows['tenTaiLieu'] ?></h5>
                        <p class="card-text"><?php echo $rows['moTa'] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = CLIENT_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>