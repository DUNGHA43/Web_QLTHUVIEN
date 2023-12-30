<?php
    function connectSQLPDO()
    {
        $sever = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'web_qlthuvien';
        $conn = new PDO("mysql:host=$sever;dbname=$database", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    
    function connectSQL()
    {
        $sever = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'web_qlthuvien';
        $conn = new mysqli($sever, $user, $pass, $database);
        
        if (!$conn)
        {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }else
        mysqli_set_charset($conn, "utf8mb4");
        return $conn;
    }
    
    
?>
