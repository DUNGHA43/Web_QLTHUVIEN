<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/account_Model.php';

if (isset($_POST['btn-login']) && ($_POST['btn-login'])) {
    $_SESSION['slide_admin'] = 0;
    setcookie("slide_admin", 0, time() + (86400 * 7), "/");
    $taiKhoan = $_POST['username'];
    $_SESSION['taikhoan'] = $taiKhoan;
    setcookie("taikhoan", $taiKhoan, time() + (86400 * 7), "/");
    $matKhau = $_POST['password'];
    $kq = checkUser($taiKhoan, $matKhau);
    $rows = mysqli_fetch_array(getUserInfo($taiKhoan, $matKhau));

    $role = $kq[0]['maQuyen'];
    if ($role == "1") {
        $_SESSION["maquyen"] = $role;
        if (isset($_POST['checksave'])) {
            setcookie("maquyen", $role, time() + (86400 * 7), "/");
        }
        header("location: http://localhost/Web_QLTHUVIEN/index.php");
    } else if ($role == "2") {
        $_SESSION['maquyen'] = $role;
        $_SESSION['hoTen'] = $kq[0]['hoTen'];
        $_SESSION['img'] = $rows['anhTaiKhoan'];
        if (isset($_POST['checksave'])) {
            setcookie("maquyen", $role, time() + (86400 * 7), "/");
            setcookie("hoTen", $kq[0]['hoTen'], time() + (86400 * 7), "/");
            setcookie("img", $rows['anhTaiKhoan'], time() + (86400 * 7), "/");
        }
        header("location: http://localhost/Web_QLTHUVIEN/index.php");
    } else {

        header("location: http://localhost/Web_QLTHUVIEN/View/client/pages/products/dangnhap.php");
    }
}

if (isset($_POST['btn-reg']) && ($_POST['btn-reg'])) {
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

    addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD, $soDT, $email, $gioiTinh, $diaChi, $anhTaiKhoan, $maquyen);
}
include '../View/client/partials/header.php';
include '../View/admin/partials/slider.php';
if (isset($_GET['act'])) {
    echo $_GET['act'];

    switch ($_GET['act']) {
            //case 'userinfo':
        case 'trangchu':
            $_SESSION['slide_admin'] = 0;
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
        case 'tacgia':
            $_SESSION['slide_admin'] = 1;
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
        case 'thoat':
            if (isset($_SESSION['maquyen'])) unset($_SESSION['maquyen']);
            if (isset($_SESSION['hoTen'])) unset($_SESSION['hoTen']);
            if (isset($_SESSION['img'])) unset($_SESSION['img']);
            if (isset($_SESSION['slide_admin'])) unset($_SESSION['slide_admin']);
            setcookie("maquyen", "", time() + (86400 * 7), "/");
            setcookie("hoTen", "", time() + (86400 * 7), "/");
            setcookie("img", "", time() + (86400 * 7), "/");
            setcookie("slide_admin", "", time() + (86400 * 7), "/");
            if (isset($_SESSION['taikhoan'])) unset($_SESSION['taikhoan']);
            setcookie("taikhoan", $taiKhoan, time() + (86400 * 7), "/");
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
    }
}
