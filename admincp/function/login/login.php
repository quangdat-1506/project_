<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'web_mysqli');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die('Không kết nối được với cơ sở dữ liệu: ' . $conn->connect_error);
}

// Xử lý đăng nhập
session_start();
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sử dụng câu truy vấn chuẩn bị để tránh tấn công SQL injection
    $sql = $conn->prepare("SELECT * FROM register WHERE email=? AND matkhau=? LIMIT 1");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();

    // Lấy kết quả của truy vấn
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Lấy dòng dữ liệu từ kết quả
        $row = $result->fetch_assoc();
        
        // Lưu thông tin đăng nhập vào session
        $_SESSION['dangky'] = $row['tenadmin'];
        header("location: http://localhost:8080/Project_banhang/admincp/");

        exit();
    } else {
        echo '<p style="color:red">Mật khẩu hoặc Email sai, vui lòng nhập lại.</p>';
    }

    // Đóng câu truy vấn chuẩn bị
    $sql->close();

}
// Đóng kết nối
mysqli_close($conn);
?>

<style type="text/css">
    table.dangnhap tr td {
        padding: 10px;
    }

    table.dangnhap {
    border: none;
    background-color: #f2f3f5;
    box-shadow: 0 10px 14px 0 #ddd;
    border-collapse: collapse;
    width: 30%;
    margin-left: 520px;
    margin-top: 50px;
    }

    table.dangnhap tr td input {
        border: none;
        height: 40px;
        width: 100%;
        padding-left: 10px;
        border-radius: 5px;
    }
</style>
<form method="POST" action="" autocomplete="off">
<table class="dangnhap" border="1" style="border-collapse: collapse; width: 30%; margin-left: 520px; margin-top: 50px">
    <tr>
        <td colspan="2" style="font-size: 20px; text-align: center;"><h3>Đăng nhập Admin</h3></td>
    </tr>
    <tr>
        <!-- <td>Tài khoản</td> -->
        <td><input type="text" size="50" name="email" placeholder="Email..." style="width: 100%;height:35px;" ></td>
    </tr>
        <!-- <td>mật khẩu</td> -->
        <td><input type="password" size="50" name="password" placeholder="Mật khẩu..." style="width: 100%;height:35px;"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập" style="height:35px; background-color: #337ab7; color: #fff; cursor:pointer"></td>
    </tr>
</table>
</form>