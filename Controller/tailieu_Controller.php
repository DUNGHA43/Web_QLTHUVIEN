<?php
session_start();
ob_start();
include "../Model/connect.php";
include "../Model/CRUD_Model.php";
    if(isset($_POST['btn-ThemTL']))
    {
        ob_start();
        if($_FILES["image"]["tmp_name"] != ""){
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($_FILES["image"]["tmp_name"]);
            $mime_types = ["image/gif", "image/png", "image/jpeg"];
            $pathinfo = pathinfo($_FILES["image"]["name"]);
            $base = $pathinfo["filename"];
            $base = preg_replace("/[^\w-]/", "_", $base);
            $filename = $base . "." . $pathinfo["extension"];
            $dir = '';
            $destination = '../public/admin/image/' . $filename;
            $destinationclt = '../public/client/image/' . $filename;
            $i = 1;     
            move_uploaded_file($_FILES["image"]["tmp_name"], $destinationclt);
            
        }
        $maTL = 'TL' . generateNew('tbltailieu', 'maTaiLieu');
        $tenTL = $_POST['tenTL'];
        $soLuong =  $_POST['soLuong'];
        $theLoai = getMaByTen('maTL', 'tbltheloai', 'tenTL', $_POST['theLoai']);
        $tacGia = getMaByTen('maTG', 'tbltacgia', 'tenTG', $_POST['tacGia']);
        $nhaCC = getMaByTen('maNCC', 'tblnhacungcap', 'tenNCC', $_POST['nhaCC']);
        $hinhAnh = $_POST['outputNameIMG'];
        $ngayThem = date('Y-m-d');
        $moTa = $_POST['moTa'];
        addDocument($maTL, $tenTL, $soLuong, $theLoai, $tacGia, $nhaCC, $hinhAnh, $ngayThem, $moTa);
        $_SESSION['slide_admin'] = 5;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }

    if(isset($_POST['btn-SuaTL']))
    {
        ob_start();
        if($_FILES["image"]["tmp_name"] != ""){
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($_FILES["image"]["tmp_name"]);
            $mime_types = ["image/gif", "image/png", "image/jpeg"];
            $pathinfo = pathinfo($_FILES["image"]["name"]);
            $base = $pathinfo["filename"];
            $base = preg_replace("/[^\w-]/", "_", $base);
            $filename = $base . "." . $pathinfo["extension"];
            $dir = '';
            $destination = '../public/admin/image/' . $filename;
            $destinationclt = '../public/client/image/' . $filename;
            $i = 1;     
            move_uploaded_file($_FILES["image"]["tmp_name"], $destinationclt);
            
        }
        $maTL = $_POST['_token'];
        $tenTL = $_POST['tenTL'];
        $soLuong =  $_POST['soLuong'];
        $theLoai = getMaByTen('maTL', 'tbltheloai', 'tenTL', $_POST['theLoai']);
        $tacGia = getMaByTen('maTG', 'tbltacgia', 'tenTG', $_POST['tacGia']);
        $nhaCC = getMaByTen('maNCC', 'tblnhacungcap', 'tenNCC', $_POST['nhaCC']);
        $hinhAnh = $_POST['outputNameIMG'];
        $ngayThem = $_POST['date'];
        $moTa = $_POST['moTa'];
        UpdateDocument($maTL, $tenTL, $soLuong, $theLoai, $tacGia, $nhaCC, $hinhAnh, $ngayThem, $moTa);
        $_SESSION['slide_admin'] = 5;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
    }
    else{ echo "no data";}

    if (isset($_GET['act'])) {
    
        switch ($_GET['act']) {
            case 'deleteDCM':
                $smDCM = $_GET['maDCM'];
                Delete('tbltailieu','maTaiLieu',$smDCM);
                $_SESSION['slide_admin'] = 5;
                header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
                break;
            case 'updateDCM':
                $_SESSION['slide_admin'] = 6;
                $maDCM = $_GET['maDCM'];
                header("location: http://localhost/Web_QLTHUVIEN/index.php?maDCM=$maDCM");
                break;
        }
    }

    if (isset($_POST['btn_Search']) && ($_POST['btn_Search'])){
        echo "<pre>";
        print_r($_POST);
        $valueSearch = $_POST['keyword'];
        $_SESSION['slide_admin'] = 5;
        header("location: http://localhost/Web_QLTHUVIEN/index.php?value=$valueSearch");
    }
?>