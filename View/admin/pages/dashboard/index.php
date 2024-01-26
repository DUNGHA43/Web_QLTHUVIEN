<?php
    // Thừa kế file layout.php
    $pageTitle = "Page Title";
    ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?> 

<h1>Xin chào tài khoản admin:  <?php if(isset($_SESSION['taikhoan'])) {
    echo $_SESSION['taikhoan'];
    } ?></h1>
<?php
    $content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

    $htmlFilePath = ADMIN_PATH . 'layouts/default.php';

    include $htmlFilePath; // Thực hiện thừa kế
?>
