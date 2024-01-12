<?php
session_start();
ob_start();
include '../Model/connect.php';
include '../Model/account_Model.php';

if (isset($_POST['btn-login']) && ($_POST['btn-login'])) {
    $_SESSION['slide_admin'] = 0;
    setcookie("slide_admin", 0, time() + (86400 * 7), "/");
    $_SESSION['slide_client'] = 0;
    setcookie("slide_client", 0, time() + (86400 * 7), "/");
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
    header("location: http://localhost/Web_QLTHUVIEN/index.php");
}

if(isset($_POST['btn-capnhat']))
{
    $taiKhoan = $_SESSION['taikhoan'];
    $maSV = $_POST['masv'];
    $hoTen = $_POST['hoten'];
    $_SESSION['hoTen'] = $hoTen;
    $ngaySinh = $_POST['ngaysinh'];
    $soCCCD = $_POST['cancuoc'];
    $soDT = $_POST['sodt'];
    $email = $_POST['email'];
    $diaChi = $_POST['diachi'];
    $gioiTinh = $_POST['gender'];
    $anhTaiKhoan = $_SESSION['img'];
    if(isset($_SESSION['update_img']))
    {
        $anhTaiKhoan = $_SESSION['update_img'];
    }
    $_SESSION['img'] = $anhTaiKhoan;
    if (isset($_SESSION['update_img'])) unset($_SESSION['update_img']);
    setcookie("hoTen", $hoTen, time() + (86400 * 7), "/");
    setcookie("img", $anhTaiKhoan, time() + (86400 * 7), "/");
    updateAccount($maSV, $hoTen, $ngaySinh, $gioiTinh, $soDT, $email, $soCCCD, $diaChi, $anhTaiKhoan, $taiKhoan);
    $_SESSION['slide_client'] = 0;
    header("location: http://localhost/Web_QLTHUVIEN/index.php");
}

if(isset($_POST['btn-doimatkhau'])){
    $row = mysqli_fetch_array(showUser($_SESSION['taikhoan']));
    $message;
    if($rows['matKhau'] = $_POST['mkCu'])
    {
        $kq = changePass($_SESSION['taikhoan'], $_POST['mkMoi']);
        ($kq > 0) ? $message = "Thay mật khẩu thành công!" : "Thay mật khẩu không thành công!";
    }
    $_SESSION['slide_client'] = 0;
    header("location: http://localhost/Web_QLTHUVIEN/index.php");
}


include '../View/client/partials/header.php';
include '../View/admin/partials/slider.php';
if (isset($_GET['act'])) {
    echo $_GET['act'];

    switch ($_GET['act']) {
        case 'thongtinnguoidung' :
            $_SESSION['slide_client'] = 1;
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
        case 'trangchuclient' :
            $_SESSION['slide_client'] = 0;
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
        case 'trangchu':
            $_SESSION['slide_admin'] = 0;
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
        case 'tacgia':
            $_SESSION['slide_admin'] = 1;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
            break;
        case 'nhacungcap':
            $_SESSION['slide_admin'] = 3;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
            break;
        case 'tailieu':
            $_SESSION['slide_admin'] = 5;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
            break;
        case 'theloai':
            $_SESSION['slide_admin'] = 7;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
            break;
        case 'taikhoan':
            $_SESSION['slide_admin'] = 9;
            header("location: http://localhost/Web_QLTHUVIEN/index.php?value");
            break;
        case 'thoat':
            if (isset($_SESSION['maquyen'])) unset($_SESSION['maquyen']);
            if (isset($_SESSION['hoTen'])) unset($_SESSION['hoTen']);
            if (isset($_SESSION['img'])) unset($_SESSION['img']);
            if (isset($_SESSION['slide_admin'])) unset($_SESSION['slide_admin']);
            if (isset($_SESSION['slide_client'])) unset($_SESSION['slide_client']);
            if (isset($_SESSION['taikhoan'])) unset($_SESSION['taikhoan']);
            if (isset($_SESSION['update_img'])) unset($_SESSION['update_img']);
            setcookie("maquyen", "", time() + (86400 * 7), "/");
            setcookie("hoTen", "", time() + (86400 * 7), "/");
            setcookie("img", "", time() + (86400 * 7), "/");
            setcookie("slide_admin", "", time() + (86400 * 7), "/"); 
            setcookie("taikhoan", $taiKhoan, time() + (86400 * 7), "/");
            setcookie("slide_client", 0, time() + (86400 * 7), "/");
            header("location: http://localhost/Web_QLTHUVIEN/index.php");
            break;
    }
}
