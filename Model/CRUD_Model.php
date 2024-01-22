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
    
    function add_theloai($maTL, $tenTL)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tbltheloai VALUES ('$maTL','$tenTL')";
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

    function UpdateTL($maTL, $tenTL){
        $conn = connectSQL();
        $sql = "UPDATE `tbltheloai` SET `maTL`='$maTL',`tenTL`='$tenTL' where `maTL`='$maTL'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function show_Info_All($ten)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM $ten ";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }
    function show_Infor_ByName($value,$name,$row)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM `$name` WHERE `$row` LIKE '%$value%'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function generateNew($ten, $kc)
    {
        $addTG = show_Info_All($ten);
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

    function getMaByTen($ma, $tentb, $dk, $ten){
        $conn = connectSQL();
        $sql = "SELECT $ma FROM $tentb WHERE $dk ='".$ten."'";
        $rs = mysqli_query($conn, $sql);
        $kq = $rs->fetch_array();
        return $kq[$ma];
    }
    

    function Delete($ten,$kc, $maTG){
        $conn = connectSQL();
        $sql = "DELETE FROM $ten WHERE $kc ='$maTG'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function addDocument($maTL, $tenTL, $soLuong, $theLoai, $maTG, $maNCC, $hinhAnh, $ngayThem, $moTa)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tbltailieu VALUES ('$maTL','$tenTL','$soLuong','$theLoai','$maTG','$maNCC','$hinhAnh','$ngayThem','$moTa')";
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

    function UpdateDocument($maTL, $tenTL, $soLuong, $theLoai, $maTG, $maNCC, $hinhAnh, $ngayThem, $moTa){
        $conn = connectSQL();
        $sql = "UPDATE tbltailieu SET tenTaiLieu = '$tenTL', soLuong = '$soLuong', maTL = '$theLoai', maTG = '$maTG', maNCC = '$maNCC', hinhAnh = '$hinhAnh', ngayThem = '$ngayThem', moTa = '$moTa' WHERE maTaiLieu = '$maTL'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function addLibraryCard($maTTV, $taiKhoan, $ngayHH, $soLanVP, $trangThai, $ghiChu)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tblthethuvien VALUES ('$maTTV','$taiKhoan','$ngayHH','$soLanVP','$trangThai','$ghiChu')";
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

    function updateLibraryCard($maTTV, $ngayHH, $soLanVP, $trangThai, $ghiChu)
    {
        $conn = connectSQL();
        $sql = "UPDATE tblthethuvien SET ngayHetHan = '$ngayHH', soLanVP = '$soLanVP', trangThai = '$trangThai', ghiChu = '$ghiChu' WHERE maTheTV = '$maTTV'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function getNameOrCodeDCM($tb, $cot, $dk, $value)
    {
        $conn = connectSQL();
        $sql = "SELECT $tb FROM tbltailieu WHERE $cot = '$dk'";
        $rs = mysqli_query($conn, $sql);
        $kq = mysqli_fetch_array($rs);
        return strval($kq[$value]);
    }
    function addMuonTra($maTTV, $ngayNhan, $ngayHenTra, $ngayHoanTra, $maTL, $soLuong, $trangThai, $ghiChu)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tblqlmuontra VALUES ('$ngayNhan','$ngayHenTra','$ngayHoanTra','$maTTV','$maTL','$soLuong','$trangThai','$ghiChu')";
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
    function updateSLDCM($soLuong, $maTL){
        $conn = connectSQL();
        $sql = "UPDATE tbltailieu SET soLuong = '$soLuong'  WHERE maTaiLieu = '$maTL'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function updateXNMuonTra($ngay, $vluengay, $vlueTrangThai, $maTL, $maTTV){
        $conn = connectSQL();
        $sql = "UPDATE tblqlmuontra SET $ngay = '$vluengay', trangThai = '$vlueTrangThai'  WHERE maTaiLieu = '$maTL' AND maTheTV = '$maTTV'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function DeleteTwoConditions($tb, $con1, $con2, $vlueCon1, $vlueCon2)
    {
        $conn = connectSQL();
        $sql = "DELETE FROM $tb WHERE $con1 ='$vlueCon1' AND $con2 = '$vlueCon2'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function show_Info_Borrow_Return($ten)
    {
        $conn = connectSQL();
        $sql = "SELECT * FROM $ten WHERE ngayHoanTra > ngayHenTra AND ghiChu != 'Đã xử lý'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function updateViolationLibraryCard($maTTV, $cl, $value)
    {
        $conn = connectSQL();
        $sql = "UPDATE tblthethuvien SET $cl = '$value' WHERE maTheTV = '$maTTV'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function updateNoteMtra($maTTV, $maTL, $value){
        $conn = connectSQL();
        $sql = "UPDATE tblqlmuontra SET ghiChu = '$value'  WHERE maTaiLieu = '$maTL' AND maTheTV = '$maTTV'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    function addViolation($maXLVP, $maTheTV, $lyDo, $hinhThuc, $ngayXL)
    {
        $conn = connectSQL();
        $sql = "INSERT INTO tblxulyvipham VALUES ('$maXLVP','$maTheTV','$lyDo','$hinhThuc','$ngayXL')";
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


    function ThongKeKho(){
        $conn = connectSQL();
        $sql = "SELECT tl.`maTaiLieu`, tl.`tenTaiLieu`, tl.`hinhAnh`, tl.`soLuong` AS 'SoLuongCon',
         COUNT(CASE WHEN mt.`trangThai` = 'Đã nhận' THEN mt.`maTaiLieu` END) AS 'SoLuongMuon',
          (tl.`soLuong` - COUNT(CASE WHEN mt.`trangThai` = 'Đã nhận' THEN mt.`maTaiLieu` END)) AS 'SoLuongTong' FROM tbltailieu tl LEFT JOIN tblqlmuontra mt ON tl.`maTaiLieu` = mt.`maTaiLieu` GROUP BY tl.`maTaiLieu`, tl.`tenTaiLieu`, tl.`soLuong`";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }

    function MuonTaiLieu(){
        $conn = connectSQL();
        $sql = "SELECT tblthethuvien.`maTheTV`, tblthethuvien.`taiKhoan`, tbltailieu.`tenTaiLieu`, tblqlmuontra.`trangThai` from tblqlmuontra right join tblthethuvien on tblqlmuontra.`maTheTV` = tblthethuvien.`maTheTV` left join tbltailieu on tblqlmuontra.`maTaiLieu` = tbltailieu.`maTaiLieu` where tblqlmuontra.`trangThai` = 'Đã nhận'";
        $rs = mysqli_query($conn, $sql);
        return $rs;
    }
?>