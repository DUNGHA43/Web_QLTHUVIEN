<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/CRUD_Model.php';

    if (isset($_POST['btn-theloai'])) {
        echo "<pre>";
        print_r($_POST);
        $maTL = $_POST['maTL'];
        $tenTL = $_POST['tenTL'];
        add_theloai($maTL, $tenTL);
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if (isset($_GET['act'])) {
    
        switch ($_GET['act']) {
            case 'deleteTL':
                $maTL = $_GET['maTL'];
                Delete('tbltheloai','maTL',$maTL);
                $_SESSION['slide_admin'] = 7;
                header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
                break;
            case 'updateTL':
                $_SESSION['slide_admin'] = 8;
                $maTL = $_GET['maTL'];
                header("location: http://localhost/Web_QLTHUVIEN/index.php?maTL=$maTL");
                break;
        }
    }

    if (isset($_POST['btn-suaTL']) && ($_POST['btn-suaTL'])){
        print_r($_POST);
        $maTL = $_POST['maTL'];
        $tenTL = $_POST['tenTL'];
        UpdateTL($maTL, $tenTL);
        $_SESSION['slide_admin'] = 7;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
        $valueSearch = $_POST['keyword'];
        $_SESSION['slide_admin'] = 7;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch");
    }

?>