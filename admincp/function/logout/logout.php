<?php
session_start();

// Xóa session
unset($_SESSION['dangky']);

// Chuyển hướng người dùng đến trang chủ
header("location: login.php");
?>