<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/CRUD_Model.php';

    if (isset($_POST['btn-ThemNCC'])) {
        echo "<pre>";
        print_r($_POST);
        $maTG = 'NCC' . generateNew('tblnhacungcap', 'maNCC');
        $tenNCC = $_POST['tenNCC'];
        $soDT = $_POST['soDT'];
        $diaChi = $_POST['diaChi'];
        add_NCC($maTG, $tenNCC, $soDT, $diaChi);
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if (isset($_GET['act'])) {
    
        switch ($_GET['act']) {
            case 'deletencc':
                $smNCC = $_GET['maNCC'];
                Delete('tblnhacungcap','maNCC',$smNCC);
                $_SESSION['slide_admin'] = 3;
                header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
                break;
            case 'updatencc':
                $_SESSION['slide_admin'] = 4;
                $maNCC = $_GET['maNCC'];
                header("location: http://localhost/Web_QLTHUVIEN/index.php?maNCC=$maNCC");
                break;
        }
    }

    if (isset($_POST['btn-SuaNCC']) && ($_POST['btn-SuaNCC'])){
        $maNCC = $_POST['maNCC'];
        $tenNCC = $_POST['tenNCC'];
        $soDT = $_POST['soDT'];
        $diaChi = $_POST['diaChi'];
        UpdateNCC($maNCC, $tenNCC, $soDT, $diaChi);
        $_SESSION['slide_admin'] = 3;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
        echo "<pre>";
        print_r($_POST);
        $valueSearch = $_POST['keyword'];
        $_SESSION['slide_admin'] = 3;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch");
    }
?>