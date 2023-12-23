<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ms-auto">
        <a class="navbar-brand ml-3" href="#">Browser</a>
        <a class="navbar-brand" href="#">News</a>
        <a class="navbar-brand" href="#">Books1</a>
    </nav>
</div>

<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

include('../../layouts/default.php'); // Thực hiện thừa kế
?>
