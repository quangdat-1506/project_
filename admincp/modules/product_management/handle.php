<?php
include('../../../configuration/connect.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST["submit"])){
    $ten_sp = mysqli_real_escape_string($conn, $_POST["ten_sp"]);
    $gia_sp = mysqli_real_escape_string($conn, $_POST["gia_sp"]);
    $bao_hanh = mysqli_real_escape_string($conn, $_POST["bao_hanh"]);
    $phu_kien = mysqli_real_escape_string($conn, $_POST["phu_kien"]);
    $tinh_trang = mysqli_real_escape_string($conn, $_POST["tinh_trang"]);
    $khuyen_mai = mysqli_real_escape_string($conn, $_POST["khuyen_mai"]);
    $trang_thai = mysqli_real_escape_string($conn, $_POST["trang_thai"]);
    $chi_tiet_sp = mysqli_real_escape_string($conn, $_POST["chi_tiet_sp"]);
    $dac_biet = mysqli_real_escape_string($conn, $_POST['dac_biet']);

    if($_FILES['anh_sp']['name'] ==''){
        $error_anh_sp='<span style="color: red;">(*)</span>';
    }
    else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp_name = $_FILES['anh_sp']['tmp_name'];
    }

    if($_POST["category_id"] == "unselect"){
        $error_id_dm='<span style="color: red;">(*)</span>';
    }
    else {
        $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    }

    if(isset($ten_sp) && isset($gia_sp) && isset($phu_kien) && isset($bao_hanh) && isset($khuyen_mai) &&
        isset($tinh_trang) && isset($trang_thai) && isset($chi_tiet_sp) && 
        isset($category_id) && isset($anh_sp) && isset($dac_biet)){
        
        move_uploaded_file($tmp_name, "img/".$anh_sp);

        $sql = "INSERT INTO tbl_product (ten_sp, gia_sp, phu_kien, bao_hanh, khuyen_mai, tinh_trang, trang_thai, chi_tiet_sp, category_id, anh_sp, dac_biet) 
        VALUES ('$ten_sp', '$gia_sp', '$phu_kien', '$bao_hanh', '$khuyen_mai', '$tinh_trang', '$trang_thai', '$chi_tiet_sp', '$category_id', '$anh_sp', '$dac_biet')";

        if (mysqli_query($conn, $sql)) {
            echo "Thêm sản phẩm thành công";
            header('location: ../../index.php?action=quanlysanpham&query=them');
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
    if($id=$_GET['idsanpham']){
        $sql = "SELECT * FROM tbl_product WHERE product_id = '$id' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('img/'.$row['anh_sp']);
        }
        $sql_xoa = "DELETE FROM tbl_product WHERE product_id='".$id."'";
        mysqli_query($conn,$sql_xoa);
        header('location: ../../index.php?action=quanlysanpham&query=them');
    }elseif(isset($_POST['suasanpham'])){
        if($_POST['anhsp']){
            $sql_update = "UPDATE tbl_product SET ten_sp = '$ten_sp',gia_sp = '$gia_sp',phu_kien = '$phu_kien',bao_hanh = '$bao_hanh',
            khuyen_mai ='$khuyen_mai',tinh_trang ='$tinh_trang',trang_thai='$trang_thai',
            chi_tiet_sp ='$chi_tiet_sp',category_id='$category_id',anh_sp ='$anh_sp',dac_biet='$dac_biet'
            WHERE product_id = '$_GET[idsanpham]'";
            mysqli_query($conn,$sql_update);
            header('location: ../../index.php?action=quanlysanpham&query=them');
        }else{
            $sql_update = "UPDATE tbl_product SET ten_sp = '$ten_sp',gia_sp = '$gia_sp',phu_kien = '$phu_kien',bao_hanh = '$bao_hanh',
            khuyen_mai ='$khuyen_mai',tinh_trang ='$tinh_trang',trang_thai='$trang_thai',
            chi_tiet_sp ='$chi_tiet_sp',category_id='$category_id',dac_biet='$dac_biet'
            WHERE product_id = '$_GET[idsanpham]'";
        }
        mysqli_query($conn,$sql_update);
        header('location: ../../index.php?action=quanlysanpham&query=them');
    }
?>

