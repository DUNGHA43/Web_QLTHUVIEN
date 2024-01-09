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

    function add_NCC($maNCC, $tenNCC, $soDT, $diaChi)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tblnhacungcap VALUES ('$maNCC','$tenNCC','$soDT','$diaChi')";
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

    function UpdateNCC($maNCC, $tenNCC, $soDT, $diaChi){
        $conn = connectSQL();
        $sql = "UPDATE `tblnhacungcap` SET `maNCC`='$maNCC',`tenNCC`='$tenNCC',`soDT`='$soDT',
        `diaChi`='$diaChi' where `maNCC`='$maNCC'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function show_Author_All($ten)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM $ten ";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function show_Author()
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM tbl ";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function show_Author_ByName($value)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM `tbltacgia` WHERE `tenTG` LIKE '%$value%'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function generateNewAuthor($ten, $kc)
    {
        $addTG = show_Author_All($ten);
        $maTG = array();
        $arrMaTG = array();
        while($rows = $addTG->fetch_array())
        {
            $maTG[] = $rows[$kc];
        }
        foreach ($maTG as $TG) {
            $stt = preg_replace("/[^0-9]/", "", $TG);
            echo $stt;
            array_push($arrMaTG, $stt);
        }
        for($i = 0; $i < count($arrMaTG) - 1; $i++)
        {
            if($arrMaTG[$i+1] - $arrMaTG[$i] != 1)
            {
                return $arrMaTG[$i] + 1;
            }
        }
        
        return count($arrMaTG) + 1;
    }

    function getTG($ten,$kc, $maTG){
        $conn = connectSQL();
        $sql = "SELECT * FROM $ten WHERE $kc='".$maTG."'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function UpdateTacGia($maTG, $tenTG, $ngaySinh, $noiSinh, $soDT, $gioiTinh){
        $conn = connectSQL();
        $sql = "UPDATE `tbltacgia` SET `maTG`='$maTG',`tenTG`='$tenTG',`ngaySinh`='$ngaySinh',
        `noiSinh`='$noiSinh',`soDT`='$soDT',`gioiTinh`='$gioiTinh' WHERE `maTG`='$maTG'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    

    function DeleteTacgia($ten,$kc, $maTG){
        $conn = connectSQL();
        $sql = "DELETE FROM $ten WHERE $kc ='$maTG'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>