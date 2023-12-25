<?php
        $sever = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'web_qlthuvien';
    
        $conn = new mysqli($sever, $user, $pass, $database);
    
        if($conn)
        {
            mysqli_query($conn , "SET NAMES 'utf8'");
        }
        else
        {
            echo 'Kết nối không thành công! <br>';
        }
?>
