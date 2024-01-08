<?php 
    include_once "connect.php";
    function checkUser($user, $pass){
        $conn = connectSQLPDO();
        $stmt = $conn->prepare("SELECT * FROM tbltaikhoan WHERE taiKhoan = '".$user."' and matKhau = '".$pass."'");
        $stmt -> execute();
        $rs = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        if ($rs != null) {
            return $kq;
        }
    }

    function addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD, $soDT, $email, $gioiTinh, $diaChi, $anhTaiKhoan,$maquyen){
        $conn = connectSQL();
        $sql = "INSERT INTO tbltaikhoan VALUES ('$taiKhoan', '$matKhau', '$maSV', '$hoTen', '$ngaySinh',
                                                                '$soCCCD','$soDT', '$email', '$gioiTinh', '$diaChi', '$anhTaiKhoan','$maquyen')";
        mysqli_query($conn,$sql);
        $conn = null;
    }

    function updateAccount($maSV, $hoTen, $ngaySinh, $gioiTinh, $soDT, $email, $cccd, $diaChi, $img, $taiKhoan)
    {
        $conn = connectSQL();
        $sql = "UPDATE tbltaikhoan SET maSV = '$maSV' , hoTen = '$hoTen' , ngaySinh = '$ngaySinh', soCCCD = '$cccd' , soDT = '$soDT', email = '$email', gioiTinh = '$gioiTinh', diaChi = '$diaChi', anhTaiKhoan = '$img' WHERE taiKhoan = '$taiKhoan'";
        $rs = mysqli_query($conn, $sql);
        if($rs > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    function getUserInfo($taiKhoan, $matKhau)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM tbltaikhoan WHERE taiKhoan = '$taiKhoan' && matKhau = '$matKhau'"; 
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function showUser($taiKhoan)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM tbltaikhoan WHERE taiKhoan = '$taiKhoan'"; 
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function changePass($taiKhoan, $matKhau)
    {
        $conn = connectSQL();
        $sql = "UPDATE tbltaikhoan SET matKhau = '$matKhau' WHERE taiKhoan = '$taiKhoan'";
        $rs = mysqli_query($conn, $sql);
        if($rs > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>