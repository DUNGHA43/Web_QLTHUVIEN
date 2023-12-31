<?php 


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

    function getUserInfo($taiKhoan, $matKhau)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM tbltaikhoan WHERE taiKhoan = '$taiKhoan' && matKhau = '$matKhau'"; 
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }
?>