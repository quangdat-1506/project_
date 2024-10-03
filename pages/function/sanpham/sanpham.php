<?php
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
      
        // Fetch category details (optional, for display purposes)
        $sqlDm = "select * from tbl_category where category_id = '$category_id'";
        $queryDm = mysqli_query($conn, $sqlDm);
        $rowDm = mysqli_fetch_array($queryDm);
      
        // Fetch products for the category
        $sql = "select * from tbl_product where category_id='$category_id' order by product_id DESC ";
        $query = mysqli_query($conn, $sql);
    } else {
        // Display products from a default category (replace with your actual logic)
        $sql = "select * from tbl_product order by product_id DESC ";
        $query = mysqli_query($conn, $sql);
    }
?>
<nav class="wrap-inner">
    <div class="product">
            <!-- <h1>smart technology</h1>
            <h5>Technology is the closest thing to magic <br> that exists in this world</h5> -->
            <div class="banner_1">
                <a href="#"><img src="images/bannerr.png" alt=""></a>
            </div>
            <div class="product_list row">
                <?php
                    while ($row_pro = mysqli_fetch_array($query)){
                ?>
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row_pro['product_id'];?>">
                            <img src="admincp/modules/product_management/img/<?php echo $row_pro['anh_sp'];?>" class="img-thumbnail">
                        </a>
                        <p class="#"><?php echo $row_pro ['ten_sp']?></p>
                        <p class="price"><b><?php echo $row_pro['gia_sp'];?></b>
                        <!-- <div class="marsk">
                            <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row_pro['product_id'];?>">Learn more</a>
                        </div> -->
                    </div>
                <?php
                    }
                ?>
            </div>
            <div class="banner_2">
                <a href="#"><img src="images/anh1.png" alt=""></a>
                <a href="#"><img src="images/anh2.png" alt=""></a>
            </div>
            <div class="product_list row">
                <?php
                    while ($row_pro = mysqli_fetch_array($query)){
                ?>
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row_pro['product_id'];?>">
                            <img src="admincp/modules/product_management/img/<?php echo $row_pro['anh_sp'];?>" class="img-thumbnail">
                        </a>
                        <p class="#"><?php echo $row_pro ['ten_sp']?></p>
                        <p class="price"><b><?php echo $row_pro['gia_sp'];?></b>
                        <!-- <div class="marsk">
                            <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row_pro['product_id'];?>">Learn more</a>
                        </div> -->
                    </div>
                <?php
                    }
                ?>
            </div>
            <div class="session">
                <div class="service">
                    <img src="images/shipping.png" alt="">
                    <img src="images/money.png" alt="">
                    <img src="images/support.png" alt="">
                    <img src="images/payment.png" alt="">
                </div>
            </div>
    </div>
</nav>