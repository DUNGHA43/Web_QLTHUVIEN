<?php 
    include '../Model/account_Model.php';
    if(isset($_POST['btn-reg'])){
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
        
        // if(checkUser($taiKhoan, $matKhau)){
        //     header("location: http://localhost/Web_QLTHUVIEN/admin.php");
        // }
        addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD,$soDT, $email,$gioiTinh, $diaChi, $anhTaiKhoan,$maquyen);
        echo "OK";
    }
?>

