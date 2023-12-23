<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>
    <h2>This is the content of the page</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra


include('../../layouts/default.php'); // Thực hiện thừa kế
?>
