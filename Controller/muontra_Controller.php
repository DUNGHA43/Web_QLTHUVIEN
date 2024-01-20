<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/CRUD_Model.php';

if(isset($_POST['btn-addmuontra']))
{
    $maTTV = $_POST['_token'];
    $ngayNhan = date('Y-m-d');
    $ngayHenTra = $_POST['ngayHenTra'];
    $ngayHoanTra = "0000-00-00";
    $ghiChu = "";
    if(isset($_SESSION['listTL']))
    {
        for($i=0; $i < sizeof($_SESSION['listTL']); $i++)
        {
            echo $maTTV;
            addMuonTra($maTTV, $ngayNhan, $ngayHenTra, $ngayHoanTra, $_SESSION['listTL'][$i][0], $_SESSION['listTL'][$i][1], $_SESSION['listTL'][$i][2], $ghiChu);
        }
        $_SESSION['slide_admin'] = 13;
        unset($_SESSION['listTL']);
        header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value");
    }
    elseif($ngayHenTra == "") 
    {
        $msg = "Vui lòng chọn ngày hẹn trả!";
        $_SESSION['slide_admin'] = 14;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&msg=$msg&value");
    }
    else{ 
        $msg = "Bạn chưa chọn sách!!";
        $_SESSION['slide_admin'] = 14;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&msg=$msg&value");
    }
}

if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
    echo "<pre>";
    print_r($_POST);
    $valueSearch = $_POST['keyword'];
    $_SESSION['slide_admin'] = 13;
    header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch&maTTV");
}


if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'muonsach':
            $_SESSION['slide_admin'] = 14;
            $maTTV = $_GET['maTTV'];
            $trangThai = $_GET['trangThai'];
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value");
            break;
        case 'sachmuon':
            $_SESSION['slide_admin'] = 13;
            $maTTV = $_GET['maTTV'];
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value");
            break;
        case 'xacnhanmuon':
            $_SESSION['slide_admin'] = 13;
            $maTTV = $_GET['maTTV'];
            $maTL = $_GET['maTL'];
            $ngayNhan = date('Y-m-d');
            $trangThai = $_GET['trangThai'];
            if($trangThai != "Đã nhận" && $trangThai != "Đã trả")
            {
                updateXNMuonTra('ngayMuon', $ngayNhan, 'Đã nhận', $maTL, $maTTV);
            }
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=&value");
            break;
        case 'xacnhantra':
            $_SESSION['slide_admin'] = 13;
            $maTTV = $_GET['maTTV'];
            $maTL = $_GET['maTL'];
            $ngayTra = date('Y-m-d');
            $soLuong = $_GET['soLuong'];
            $trangThai = $_GET['trangThai'];
            if($trangThai == "Đã nhận")
            {
                $slCu = getMaByTen('soLuong','tbltailieu','maTaiLieu', $maTL);
                updateXNMuonTra('ngayHoanTra', $ngayTra, 'Đã trả', $maTL, $maTTV);
                updateSLDCM(($slCu + $soLuong),$maTL);
            }
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value");
            break;
        case 'xoamuontra':
            $_SESSION['slide_admin'] = 13;
            $maTTV = $_GET['maTTV'];
            $maTL = $_GET['maTL'];
            $soLuong = $_GET['soLuong'];
            $slCu = getMaByTen('soLuong','tbltailieu','maTaiLieu', $maTL);
            updateSLDCM(($slCu + $soLuong), $maTL);
            DeleteTwoConditions('tblqlmuontra','maTheTV','maTaiLieu', $maTTV, $maTL);
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV&value");
            break;
        case 'themTL':
            $_SESSION['slide_admin'] = 14;
            if(!isset($_SESSION['listTL'])) { $_SESSION['listTL'] = []; }
            $maTL = $_GET['maTL'];
            $maTTV = $_GET['maTTV'];
            $soLuong = 1;
            $TrangThai = "Đã nhận";
            $kt = 0;
            $slCu = getMaByTen('soLuong','tbltailieu','maTaiLieu', $maTL);
            if($slCu > 0)
            {
                updateSLDCM(($slCu - $soLuong),$maTL);
                if(isset($_SESSION['listTL'])){
                    for($i=0; $i < sizeof($_SESSION['listTL']); $i++)
                    {
                        if($_SESSION['listTL'][$i][0] == $maTL){
                            $kt = 1;
                            $soLuongnew = $soLuong + $_SESSION['listTL'][$i][1];
                            $_SESSION['listTL'][$i][1] = $soLuongnew;
                            break;
                        }
                    }
                }
            }
            else
            {
                $msg = "Số lượng sách trong thư viện đã hết";
                header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value&msg=$msg");
                break;
            }
            //
            if($kt == 0)
            {
                $ListTL = [$maTL, $soLuong, $TrangThai];
                $_SESSION['listTL'][] = $ListTL;
            }
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value");
            break;
        case 'huythemTL':
            $_SESSION['slide_admin'] = 14;
            $maTTV = $_GET['maTTV'];    
            for($i=0; $i < sizeof($_SESSION['listTL']); $i++)
            {
                $slCu = getMaByTen('soLuong','tbltailieu','maTaiLieu', $_SESSION['listTL'][$i][0]);
                updateSLDCM((intval($slCu) + intval($_SESSION['listTL'][$i][1])), $_SESSION['listTL'][$i][0]);
            }
            unset($_SESSION['listTL']);
            header("location: http://localhost/Web_QLTHUVIEN/index.php?maTTV=$maTTV&value");
            break;
    }
}
?>