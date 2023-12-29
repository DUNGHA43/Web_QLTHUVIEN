<?php 

    include "../Model/connect.php";

    function checkUser($user, $pass){
        $check = "";
        $conn = connectSQLPDO();
        $stmt = $conn->prepare("SELECT * FROM tbltaikhoan WHERE taiKhoan = '".$user."' and matKhau = '".$pass."'");
        $stmt -> execute();
        $rs = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        if ($rs != null) {
            $check = $kq[0]['maQuyen'];
        }
        return $check;
    }

    function addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD, $soDT, $email, $gioiTinh, $diaChi, $anhTaiKhoan,$maquyen){
        $conn = connectSQL();
        $sql = "INSERT INTO tbltaikhoan VALUES ('$taiKhoan', '$matKhau', '$maSV', '$hoTen', '$ngaySinh',
                                                                '$soCCCD','$soDT', '$email', '$gioiTinh', '$diaChi', '$anhTaiKhoan','$maquyen')";
        mysqli_query($conn,$sql);
        $conn = null;
    }
?>