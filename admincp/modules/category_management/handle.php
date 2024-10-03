<?php
    include('../../../configuration/connect.php');
    $tenloaisp = $_POST['tendanhmuc'];
    if(isset($_POST['themdanhmuc'])){
        $sql1="insert into tbl_category(tendanhmuc) values('$tenloaisp')";
        $sql2="ALTER TABLE tbl_category DROP category_id"; 
        $sql3="ALTER TABLE tbl_category AUTO_INCREMENT = 1"; 
        $sql4="ALTER TABLE tbl_category ADD category_id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"; 
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
        mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql4);
        header('location: ../../index.php?action=quanlydanhmucsanpham&query=them');
    }elseif(isset($_POST['suadanhmuc'])){
        // sua
        $sql_update = "UPDATE tbl_category SET tendanhmuc='".$tenloaisp."' WHERE category_id='$_GET[category_id]'";
        mysqli_query($conn,$sql_update);
        header('location: ../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{
        // xoa
        $id = $_GET['category_id'];
        $sql_xoa = "DELETE FROM tbl_category WHERE category_id = '".$id."'";
        mysqli_query($conn,$sql_xoa);
        header('location: ../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>