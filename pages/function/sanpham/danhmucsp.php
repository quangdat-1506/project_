<?php
    $conn = new mysqli('localhost','root','','web_mysqli') or die('Không kết nối được với cơ sở dữ liệu');
    mysqli_query($conn, 'SET NAMES UTF8');

    $sql="SELECT * FROM tbl_category";
    $query = mysqli_query($conn, $sql);
?>

<nav class="navbar navbar-inverse">
    <div class="">
        <ul id="nav" class="nav navbar-nav">
            <li><a href="index.php">Trang Chủ</a></li>
            <?php
                while($row = mysqli_fetch_array($query)){
            ?>
            <li><a href="index.php?page_layout=danhsachsp&category_id=<?php echo $row['category_id'];?>"><?php echo $row['tendanhmuc'];?></a></li>
            <?php
                }
            ?>
            <li id="search" class="col-md-2 col-sm-12 col-xs-12" style="display: table-row">
                <?php
                    include_once './pages/function/timkiem/tiemkiem.php';
                ?>
            </li>
            <li id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <a href="index.php?page_layout=giohang" style="color: #000; text-decoration: none; padding: 0">
                    <!-- <img src="img/home/cart.png" style="width:100px;"> -->
                    <i class="fas fa-shopping-bag"></i>
                </a>
                <a href="index.php?page_layout=giohang" style="color: #000; text-decoration: none; padding: 0">
                    <span>
                        <?php 
                            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            } else {
                                // echo 0;
                            }
                        ?>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
