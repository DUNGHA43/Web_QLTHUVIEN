<?php 
include_once "connect.php";
function showDCM()
{
    $conn = connectSQL();
    $sql = 'SELECT * FROM tbltailieu';
    $rs = mysqli_query($conn,$sql);
    return $rs;
}
function showCGR()
{
    $conn = connectSQL();
    $sql = 'SELECT * FROM tbltheloai';
    $rs = mysqli_query($conn,$sql);
    return $rs;
}
function showCGRByCode($maTL)
{
    $conn = connectSQL();
    $sql = "SELECT * FROM tbltheloai WHERE maTL = '$maTL'";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}
function showDCM_BY_CGR($cgrCode)
{
    $conn = connectSQL();
    $sql = "SELECT * FROM tbltailieu WHERE maTL = '$cgrCode'";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}
function show_List_DCMs_New()
{
    $conn = connectSQL();
    $sql = "SELECT * FROM tbltailieu
            ORDER BY ngayThem DESC
            LIMIT 4";
    $rs = mysqli_query($conn,$sql);
    return $rs;
}
?>