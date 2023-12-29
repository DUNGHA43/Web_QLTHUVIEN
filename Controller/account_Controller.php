<?php 
    include '../Model/account_Model.php';
    if(isset($_POST['btn-login'])){
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
        $maquyen = '2';
        $gioiTinh = $_POST['gender'];
        if(checkUser($taiKhoan, $matKhau)){
            header("location: http://localhost/Web_QLTHUVIEN/admin.php");
        }
        //addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD,$soDT, $email,$gioiTinh, $diaChi, $maquyen);
    }
?>

