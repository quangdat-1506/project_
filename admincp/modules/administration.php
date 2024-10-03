<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <link href="./css/styles.css" rel="stylesheet">
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
    
                <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                    <ul class="menu">
                        <li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial">
                            </svg><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li><a href="index.php?action=quanlydanhmucsanpham&query=them"><svg class="glyph stroked calendar">
                            </svg><i class="far fa-list-alt"></i> Danh mục sản phẩm</a>
                        </li>
                        <li><a href="index.php?action=quanlysanpham&query=them"><svg class="glyph stroked line-graph">
                            </svg><i class="fas fa-box-open"></i> Sản phẩm</a>
                        </li>
                        <li><a href="index.php?action=quanlydanhmucbaiviet&query=them"><svg class="glyph stroked line-graph">
                            </svg><i class="far fa-list-alt"></i> Danh mục bài viết</a>
                        </li><li><a href="index.php?action=quanlybaiviet&query=them"><svg class="glyph stroked line-graph">
                            </svg><i class="far fa-clipboard"></i> Bài viết</a>
                        </li>
                        <li><a href="index.php?action=quanlygiohang&query=them"><svg class="glyph stroked line-graph">
                            </svg><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        </li>
                    </ul>
                </div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></script> -->
</body>

