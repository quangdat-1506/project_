<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'web_mysqli') or die('Không kết nối được với cơ sở dữ liệu');
mysqli_query($conn, 'SET NAMES UTF8');

if($id=$_GET['ten_sp']){
    $sql = "SELECT * FROM tbl_product WHERE ten_sp = '$id' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('img/'.$row['anh_sp']);
    }
    $sql_xoa = "DELETE FROM tbl_product WHERE ten_sp='".$id."'";
    mysqli_query($conn,$sql_xoa);
    header('location: ../../../index.php?action=giohang&query=xoa'); 
} else {
    header('location: index.php');
}
?>


