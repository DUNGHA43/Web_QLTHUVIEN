<?php 
include 'connect.php';
    $conn = connectSQL();
    $sql = 'SELECT * FROM tbltailieu';
    $result = mysqli_query($conn,$sql);
?>