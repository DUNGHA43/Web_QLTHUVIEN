<?php 
    include_once "connect.php";
    function add_Author($maTG, $tenTG, $ngaySinh, $noiSinh, $soDT, $gioiTinh)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tbltacgia VALUES ('$maTG','$tenTG','$ngaySinh','$noiSinh','$soDT','$gioiTinh')";
        $rs = mysqli_query($conn, $sql);
        if($rs > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function show_Author()
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM tbltacgia";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }
    function generateNewAuthor()
    {
        $addTG = show_Author();
        $maTG = array();
        $arrMaTG = array();
        while($rows = $addTG->fetch_array())
        {
            $maTG[] = $rows['maTG'];
        }
        foreach ($maTG as $TG) {
            $ma = substr($TG,0,2);
            $stt = substr($TG,2);
            $arrMaTG[] = array('ma' => $ma , 'stt' => $stt);
        }
        for($i = 0; $i < count($arrMaTG) - 1; $i++)
        {
            if($arrMaTG[$i + 1]['stt'] - $arrMaTG[$i]['stt'] != 1)
            {
                return $arrMaTG[$i]['stt'] + 1;
            }
        }
        
        return count($arrMaTG) + 1;
    }
?>