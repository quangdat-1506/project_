<?php
    $conn = new mysqli('localhost','root','','web_mysqli') or die('Không kết nối được với cơ sở dữ liệu');
    mysqli_query($conn, 'SET NAMES UTF8');

    $sql="SELECT * FROM tbl_category";
    $query = mysqli_query($conn, $sql);
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul id="nav" class="nav navbar-nav">
            <li><a href="index.php">Trang Chủ</a></li>
            <?php
                while($row = mysqli_fetch_array($query)){
            ?>
            <li><a href="index.php?page_layout=danhsachsp&category_id=<?php echo $row['category_id'];?>"><?php echo $row['tendanhmuc'];?></a></li>
            <?php
                }
            ?>
                <a href="index.php?page_layout=giohang">
                    <img src="img/home/cart.png" style="width:100px;">
                </a>
                <a href="index.php?page_layout=giohang">
                    <span>
                        <?php 
                        if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
                            echo count($_SESSION['giohang']);
                        } else {
                            echo 0;
                        }
                        ?>
                    </span>
                </a>
            
            <!-- <li><a href="index.php?page_layout=giohang?">Giỏ Hàng</li> -->
            <!-- <li><a href="index.php?quanly=tintuc">Tin Tức</li>
            <li><a href="index.php?quanly=lienhe">Liên Hệ</li> -->
        </ul>
    </div>
</nav>