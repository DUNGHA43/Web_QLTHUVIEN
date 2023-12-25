<?php>
$host = "localhost";
$username = "root";
$password = "";
$dbname = "  ";

$conn = new msqli($host, $username, $password, $dbname);

if($conn -> connection_error){
    die("kết nối không thành công: ".$conn->connection_error);
}

</php>