<?php 
    include '../Model/account_Model.php';
    if(isset($_POST['btn-reg'])){
        echo "<pre>";
        print_r($_POST);
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

        addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD,$soDT, $email, $diaChi, $maquyen);
    }
?>