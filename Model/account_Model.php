<?php 
include 'connect.php';
function addAccount($taiKhoan, $matKhau, $maSV, $hoTen, $ngaySinh, $soCCCD, $soDT, $email, $diaChi, $maquyen){
    $sql = "INSERT INTO tbltaikhoan VALUES ('$taiKhoan', '$matKhau', '$maSV', '$hoTen', '$ngaySinh',
                                                             '$soCCCD','$soDT', '$email', '$diaChi', '2')";
    $result = mysqli_query($conn,$sql);
}
?>