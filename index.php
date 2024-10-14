<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ Nội Thất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
    <!-- <link href="./css/main.css" rel="stylesheet"> -->
</head>
<body>
    <div id="header">
        <div class="container-fluid">
            <div class="row">
                <?php
                // include("pages/menu.php");
                ?>
                <?php
                // include("pages/function/giohang/giohang.php");
                ?>
                <?php
                include("pages/function/sanpham/danhmucsp.php");
                ?>
                
            </div>
        </div>
    </div>

    <?php
        include('configuration/connect.php');
    ?>

    <section id="body">
        <div class="container">
            <div class="row">

                <div id="main" class="col-md-12" style="margin-top: 60px">
                    <!-- main -->
                    <?php
                    //  master page
                    if(isset($_GET["page_layout"])){
                    switch ($_GET["page_layout"]) {
                    case 'danhsachtimkiem':include_once './pages/function/timkiem/danhsachtimkiem.php';
                    break;
                    case 'danhsachsp':include_once './pages/function/sanpham/danhsachsp.php';
                    break;
                    case 'chitietsp':include_once './pages/function/sanpham/chitietsp.php';
                    break;
                    case 'giohang':include_once './pages/function/giohang/giohang.php';
                    break;
                    case 'muahang':include_once './pages/function/giohang/muahang.php';
                    break;
                    case 'hoanthanh':include_once './pages/function/giohang/hoanthanh.php';
                    break;

                    }
                    }
                    else include_once './pages/function/sanpham/sanpham.php';
                    ?>
    <!-- end main -->
                </div>
            </div>
        </div>
    </section>

    <?php
        include('pages/footer.php');
    ?>

    <!-- <footer id="footer">
        <div id="footer-t">
            <div class="container-fluid">
                <div class="row">
                    <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                        <img>
                    </div>
                    <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Hotline</h3>
                        <p><i class="fa fa-phone" aria-hidden="true"></i>(+84) 0862705235</p>
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i>admin123@gmail.com</p>
                    </div>
                    <div id="contact" class="col-md-6 col-sm-12 col-xs-12">
                        <h3>Contact US</h3>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>459 Tôn Đức Thắng - Hòa Khánh Nam - Liên Chiểu - Đà Nẵng</p>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
</body>
</html>

<!-- https://www.behance.net/gallery/91982645/E-commerce -->