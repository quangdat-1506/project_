<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'web_mysqli');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die('Không kết nối được với cơ sở dữ liệu: ' . $conn->connect_error);
}

// Đặt bảng mã kết nối
mysqli_query($conn, 'SET NAMES UTF8');

// Xử lý đăng ký
session_start();
if (isset($_POST['dangky'])) {
    $tenadmin = $_POST['hovaten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    $dienthoai = $_POST['dienthoai'];

    // Thực hiện truy vấn với biến kết nối $conn
    $sql_dangky = mysqli_query($conn, "INSERT INTO tbl_register(tenadmin, email, diachi, matkhau, dienthoai) 
        VALUES('".$tenadmin."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");

    if ($sql_dangky) {
        $_SESSION['matkhau'] = $matkhau;
        echo '<p style="color: blue;">Bạn đã đăng ký thành công</p>';
    } else {
        echo '<p style="color: red;">Đăng ký thất bại</p>';
    }
    header("location: ../login/login.php");
}

// Đóng kết nối
mysqli_close($conn);
?>
<!-- <p style="text-align: center; font-size: 30px">Đăng ký thành viên</p> -->
<style type="text/css">
    table.dangky tr td {
        padding: 10px;
    }

    table.dangky {
    border: none;
    background-color: #f2f3f5;
    box-shadow: 0 10px 14px 0 #ddd;
    border-collapse: collapse;
    width: 30%;
    margin-left: 520px;
    margin-top: 50px;
    }

    table.dangky tr td input {
        border: none;
        height: 40px;
        width: 100%;
        padding-left: 10px;
        border-radius: 5px;
    }
</style>
<form method="POST" action="">
<table class="dangky" border="1" style="border-collapse: collapse; width: 30%; margin-left: 520px; margin-top: 50px">
    <tr>
        <td colspan="2" style="font-size: 20px; text-align: center;"><h3>Đăng ký Admin</h3></td>
    </tr>
    <tr>
        <td><input type="text" size="50" name="hovaten" placeholder="Họ và tên..."></td>
    </tr>
    <tr>
        <td><input type="text" size="50" name="email" placeholder="Email..."></td>
    </tr>
    <tr>
        <td><input type="text" size="50" name="dienthoai"placeholder="Điện thoại..."></td>
    </tr>
    <tr>
        <td><input type="text" size="50" name="diachi" placeholder="Địa chỉ..."></td>
    </tr>
    <tr>
        <td><input type="password" size="50" name="matkhau" placeholder="password..."></td>
    </tr>
    <tr>
        <td><input type="submit" name="dangky" value="Đăng ký"  style="height:35px; background-color: #337ab7; color: #fff; cursor:pointer"></td>
    </tr>
</table>
</form>