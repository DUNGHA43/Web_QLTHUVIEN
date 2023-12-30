<?php 
    session_start();
    ob_start();
    include '../Model/connect.php';
    include '../Model/account_Model.php';
    if(isset($_POST['btn-login']) && ($_POST['btn-login'])){
        $taiKhoan = $_POST['username'];
        $matKhau = $_POST['password'];
        $kq = checkUser($taiKhoan, $matKhau);
        $role = $kq[0]['maQuyen'];
        if($role == "1"){
            $_SESSION["maquyen"] = $role;
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
        }else if($role == "2"){
            $_SESSION['maquyen'] = $role;
            $_SESSION['hoTen'] = $kq[0]['hoTen'];
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
        }else {
            
            header("location: http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php");   
        }
    }

    if(isset($_POST['btn-reg']) && ($_POST['btn-reg'])){
        $taiKhoan = $_POST['username'];
        $matKhau = $_POST['password'];
        $maSV = '';
        $hoTen = $_POST['fullname'];
        $ngaySinh = '';
        $soCCCD = '';
        $soDT = '';
        $email = $_POST['email'];
        $diaChi = $_POST['address']; 
        $gioiTinh = $_POST['gender'];
        $anhTaiKhoan = ($_POST['gender'] == "male") ? "nam.jpg" : "nữ.jpg";
        $maquyen = '2';

        addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD,$soDT, $email,$gioiTinh, $diaChi, $anhTaiKhoan,$maquyen);
        echo "OK";
    }
    include '../View/client/partials/header.php';
    include '../View/admin/partials/slider.php';
    if(isset($_GET['act'])){
        echo $_GET['act'];

        switch($_GET['act']){
            //case 'userinfo':

            case 'thoat':
                if(isset($_SESSION['maquyen'])) unset($_SESSION['maquyen']);
                if(isset($_SESSION['hoTen'])) unset($_SESSION['hoTen']);
                header("location: http://localhost/Web_QLTHUVIEN/index.php");
                break;
        }      
    }
?>

