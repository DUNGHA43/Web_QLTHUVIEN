<?php
session_start();
ob_start();
include '../Model/connect.php';
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

if ($_GET['updateTG']){
    $matg = $_GET['updateTG'];
    $kqByID = seachByMaTG($matg);
    print_r($kqByID);
    include "location: http://localhost/Web_QLTHUVIEN/View/admin/pages/products/index.php";
    // $name = $row['tenTG'];
    // $date = $row['ngaySinh'];
    // $noisinh = $row['noiSinh'];
    // $sdt = $row['soDT'];
    // $gioiTinh = $row['gioiTinh'];
    
}
?>
