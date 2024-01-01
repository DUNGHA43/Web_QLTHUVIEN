<?php
session_start();
ob_start();
include_once '../Model/connect.php';
include '../Model/Author_Model.php';

if (isset($_POST['btn-ThemTG'])) {
    $maTG = 'TG'. generateNewAuthor();
    $tenTG = $_POST['tenTG'];
    $ngaySinh = $_POST['ngaySinh'];
    $noiSinh = $_POST['noiSinh'];
    $soDT = $_POST['soDT'];
    $gioiTinh = $_POST['gioiTinh'];
    add_Author($maTG, $tenTG, $ngaySinh, $noiSinh, $soDT, $gioiTinh);
    header("location: http://localhost/Web_QLTHUVIEN/index.php");
}
?>
