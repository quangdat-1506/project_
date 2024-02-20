<?php
session_start();
include_once '../configuration/connect.php';

if($_SESSION['email']== "admin123@gmail.com" && $_SESSION['pass'] == "admin123"){
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Xin chào Admin!</a>
                <ul class="user-menu" style="line-height: 5px">
                    <li><a href="../index.php"><span>Vào trang web</span></a></li>
                    <li class="dropdown pull-right">
                        <a href="#">Thành Viên</a>
                        <ul class="sub-menu">
                            <li><a title="Đăng nhập" href="./function/login/login.php">Đăng nhập</a></li>
                            <li><a title="Đăng kí" href="./function/register/register.php">Đăng kí</a></li>
                        </ul>
                    </li>
                    <li><a title="Đăng xuất" href="./function/logout/logout.php"><i class="fas fa-sign-out-alt " style="line-height: 5px"></i> Đăng xuất</a></li>
                </ul>
                <?php
                    // Kiểm tra xem nút đăng nhập đã được bấm chưa
                    if (isset($_POST['dangky'])) {
                        // Chuyển hướng tới trang đăng ký
                        header('Location: ./function/register/register.php');
                        exit();
                    }
                    ?>
                    <?php
                    // Kiểm tra xem nút đăng nhập đã được bấm chưa
                    if (isset($_POST['dangnhap'])) {
                        // Chuyển hướng tới trang đăng nhập
                        header('Location: ./function/login/login.php');
                        exit();
                        }
                ?>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div id="sidebar-collapse" class="col-lg-2 sidebar">
                <ul class="menu">
                    <li class="active"><a href="quantri.php"><svg class="glyph stroked dashboard-dial">
                        </svg><i class="fas fa-home"></i> Trang chủ</a>
                    </li>
                    <li><a href="quantri.php?page_layout=danhsachdm"><svg class="glyph stroked calendar">
                        </svg><i class="fas fa-list-alt"></i> Danh mục</a>
                    </li>
                    <li><a href="quantri.php?page_layout=danhsachsp"><svg class="glyph stroked line-graph">
                        </svg><i class="fas fa-box-open"></i> Sản phẩm</a>
                    </li>
                    <li><a href="quantri.php?page_layout=danhsachsp"><svg class="glyph stroked line-graph">
                        </svg><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main">
        <?php
            if(isset($_GET['action'])){
                $tam = $_GET['action'];
            }else{
                $tam = '';
            }if($tam=='danhmuc'){
                include("modules/category_management/more.php");
            }else{
                include("modules/dashboard.php");
            }
        ?>
    </div>
</body>

</html>
<?php
}else
header('location: index.php');
?>