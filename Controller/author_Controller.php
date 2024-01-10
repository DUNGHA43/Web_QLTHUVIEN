<?php
session_start();
ob_start();
include "../Model/connect.php";
include "../Model/CRUD_Model.php";

if (isset($_POST['btn-ThemTG'])) {
    $maTG = 'TG' . generateNew('tbltacgia', 'maTG');
    $tenTG = $_POST['tenTG'];
    $ngaySinh = $_POST['ngaySinh'];
    $noiSinh = $_POST['noiSinh'];
    $soDT = $_POST['soDT'];
    $gioiTinh = $_POST['gioiTinh'];
    add_Author($maTG, $tenTG, $ngaySinh, $noiSinh, $soDT, $gioiTinh);
    header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
}



if (isset($_GET['act'])) {
    
    switch ($_GET['act']) {
        case 'deletetacgia':
            $smTG = $_GET['maTG'];
            Delete('tbltacgia','maTG',$smTG);
            $_SESSION['slide_admin'] = 1;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
            break;
        case 'updatetacgia':
            $_SESSION['slide_admin'] = 2;
            $smTG = $_GET['maTG'];
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTG=$smTG");
            break;
    }
}

if (isset($_POST['btn-SuaTG']) && ($_POST['btn-SuaTG'])){
    $maTG = $_POST['maTG'];
    $tenTG = $_POST['tenTG'];
    $ngaySinh = $_POST['ngaySinh'];
    $noiSinh = $_POST['noiSinh'];
    $soDT = $_POST['soDT'];
    $gioiTinh = $_POST['gioiTinh'];
    UpdateTacGia($maTG, $tenTG, $ngaySinh, $noiSinh, $soDT, $gioiTinh);
    $_SESSION['slide_admin'] = 1;
    header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
}

if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
    echo "<pre>";
    print_r($_POST);
    $valueSearch = $_POST['keyword'];
    $_SESSION['slide_admin'] = 1;
    header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch");
}
?>
