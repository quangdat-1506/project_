<?php
session_start();
if($_SESSION['email']== "admin123@gmail.com" && $_SESSION['pass'] == "admin123"){
    $id_sp=$_GET['id_sp'];
    include_once './ketnoi.php';
    $sql = "delete from sanpham where id_sp='$id_sp'";
    $query = mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=danhsachsp');
}
else header('location:index.php');
?>