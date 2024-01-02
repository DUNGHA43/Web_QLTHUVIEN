<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/Author_Model.php';

// if(isset($_GET['smTG'])){
//     echo $_GET['smTG'];
//     $smTG = $_GET['smTG'];
    
//     $rs = getTG($smTG);
//     echo "<pre>";
//     print_r(mysqli_fetch_assoc($rs));
// }

if(isset($_GET['smTG'])){
    echo $_GET['smTG'];
    $smTG = $_GET['smTG'];
    $rs = getTG($smTG);
    $udTG = mysqli_fetch_array($rs);
    $udTG['maTG'];
    header("location: http://localhost/Web_QLTHUVIEN/index.php?data=".urlencode(serialize($udTG)));
    exit;
}

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
