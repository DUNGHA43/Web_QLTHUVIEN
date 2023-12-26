<?php 
    include "../Model/connect.php";
    function addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD, $soDT, $email, $diaChi, $maquyen, $gioiTinh){
        $conn = connectSQL();
        $sql = "INSERT INTO tbltaikhoan VALUES ('$taiKhoan', '$matKhau', '$maSV', '$hoTen', '$ngaySinh',
                                                                '$soCCCD','$soDT', '$email', '$diaChi', '$maquyen', '$gioiTinh')";
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }
?>