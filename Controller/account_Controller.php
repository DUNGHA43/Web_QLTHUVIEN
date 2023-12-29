<?php 
    include '../Model/account_Model.php';
    session_start();
    ob_start();
    if(isset($_POST['btn-login']) && ($_POST['btn-login'])){
        echo "<pre>";
        $taiKhoan = $_POST['username'];
        $matKhau = $_POST['password'];
        $role = checkUser($taiKhoan, $matKhau);
        $_SESSION['maquyen'] = $role;
        if($role == "1"){
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
        }else if($role == "2"){
            header("location: http://localhost/Web_QLTHUVIEN/admin.php");
        }else {
            header("location: http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php");   
        }
    }

    if(isset($_POST['btn-reg']) && ($_POST['btn-reg'])){
        echo "<pre>";
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
?>

