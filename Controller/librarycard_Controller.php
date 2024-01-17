<?php 
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/CRUD_Model.php';

    if(isset($_POST['btn-ThemTTV']))
    {
        $maTTV = 'TTV'. $_POST['taiKhoan'];
        $taiKhoan = $_POST['taiKhoan'];
        $ngayHH = $_POST['ngayHH'];
        $soLanVP = $_POST['soLanVP'];
        $TrangThai = $_POST['trangThai'];
        $ghiChu = $_POST['ghiChu'];
        addLibraryCard($maTTV,$taiKhoan,$ngayHH,$soLanVP,$TrangThai,$ghiChu);
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
        echo "<pre>";
        print_r($_POST);
        $valueSearch = $_POST['keyword'];
        $_SESSION['slide_admin'] = 11;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch");
    }
    if (isset($_POST['btn_SearchDCM']) && ($_POST['btn_SearchDCM'])){
        echo "<pre>";
        print_r($_POST);
        $valueSearch = $_POST['keyword'];
        $maTTV = $_POST['maTTV'];
        $_SESSION['slide_admin'] = 14;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch&maTTV=$maTTV");
    }

    if(isset($_POST['btn-SuaTTV']))
    {
        $maTTV = $_POST['_token'];
        $ngayHH = $_POST['ngayHH'];
        $soLanVP = $_POST['soLanVP'];
        $TrangThai = $_POST['trangThai'];
        $ghiChu = $_POST['ghiChu'];
        updateLibraryCard($maTTV,$ngayHH, $soLanVP, $TrangThai, $ghiChu);
        $_SESSION['slide_admin'] = 11;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if (isset($_GET['act'])) {
    
        switch ($_GET['act']) {
            case 'deletettv':
                $smTVV = $_GET['maTTV'];
                Delete('tblthethuvien','maTheTV',$smTVV);
                $_SESSION['slide_admin'] = 11;
                header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
                break;
            case 'updatettv':
                $_SESSION['slide_admin'] = 12;
                $maTTV = $_GET['maTTV'];
                header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV");
                break;   
        }
    }
?>