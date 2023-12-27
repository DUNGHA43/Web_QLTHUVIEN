<?php 
    include "../Model/connect.php";
    function addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD, $soDT, $email, $gioiTinh, $diaChi, $maquyen){
        $conn = connectSQL();
        $sql = "INSERT INTO tbltaikhoan VALUES ('$taiKhoan', '$matKhau', '$maSV', '$hoTen', '$ngaySinh',
                                                                '$soCCCD','$soDT', '$email', '$gioiTinh', '$diaChi', '$maquyen')";
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }
?>