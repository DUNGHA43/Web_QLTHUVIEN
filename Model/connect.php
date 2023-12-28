<?php

        function connectSQL()
        {
            $sever = 'localhost';
            $user = 'root';
            $pass = '';
            $database = 'web_qlthuvien';
            global $conn;
            $conn = new mysqli($sever, $user, $pass, $database);
            if (!$conn)
            {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }
            mysqli_set_charset($conn, "utf8mb4");
            return $conn;
        }
?>
