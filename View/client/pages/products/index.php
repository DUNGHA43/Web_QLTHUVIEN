<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>

<div class="container-fluid">
    <div class="container header">
        <div class="row">
            <div class="input-group mt-5">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = CLIENT_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>