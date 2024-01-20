<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/CRUD_Model.php';

if(isset($_POST['btn-ThemViPham']))
{
    $maXLVP = "XLVP" . generateNew('tblxulyvipham', 'maXLVP');
    $maTTV = $_POST['maTTV'];
    $lyDo = $_POST['lyDoVP'];
    $hinhThuc = $_POST['hinhThuc'];
    $ngayXL = date('Y-m-d');
    $vpCu = getMaByTen('soLanVP','tblthethuvien','maTheTV', $maTTV);
    updateViolationLibraryCard($maTTV, 'soLanVP',($vpCu + 1));
    $maTL = $_POST['_token'];
    updateNoteMtra($maTTV, $maTL, 'Đã xử lý');
    if($hinhThuc == "Khóa tài khoản")
    {
        updateViolationLibraryCard($maTTV, 'trangThai', 'Thẻ bị khóa');
    }
    addViolation($maXLVP, $maTTV, $lyDo, $hinhThuc, $ngayXL);
    $_SESSION['slide_admin'] = 15;
    header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV&value&maTL");
}

if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
    echo "<pre>";
    print_r($_POST);
    $valueSearch = $_POST['keyword'];
    $_SESSION['slide_admin'] = 15;
    header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch&maTTV");
}

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'xoavipham':
            $_SESSION['slide_admin'] = 15;
            $maXL = $_GET['maXL'];
            $maTTV = $_GET['maTTV'];
            $vpCu = getMaByTen('soLanVP','tblthethuvien','maTheTV', $maTTV);
            updateViolationLibraryCard($maTTV, 'soLanVP',($vpCu - 1));
            Delete('tblxulyvipham', 'maXLVP', $maXL);
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV&value&maTL");
            break;
        
        case 'danhsachtramuon':
            $_SESSION['slide_admin'] = 16;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV&value&maTL");
            break;
        case 'chonvippham':
            $_SESSION['slide_admin'] = 16;
            $maTTV = $_GET['maTTV'];
            $tenTL = $_GET['tenTL'];
            $maTL = getNameOrCodeDCM('maTaiLieu', 'tenTaiLieu', $_GET['tenTL'], 'maTaiLieu');
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value=$tenTL&maTL=$maTL");
            break;
        }
        
}

?>