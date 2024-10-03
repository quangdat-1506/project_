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
        <div class="product row">
            <h1>smart technology</h1>
            <h5>Technology is the closest thing to magic <br> that exists in this world</h5>
            <div class="banner">
                <img src="images/banner.png">
            </div>
            <div class="product_list">
                <?php
                    while ($row_pro = mysqli_fetch_array($query)){
                ?>
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <h6 class="title_product"><?php echo $row_pro ['ten_sp']?></h6>
                        <img src="admincp/modules/product_management/img/<?php echo $row_pro['anh_sp'];?>" class="img-thumbnail">
                        <h6 class="price"><?php echo $row_pro['gia_sp'];?></h6>
                        <div class="marsk">
                            <!-- <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_pro['id_sp'];?>">Xem chi tiết</a> -->
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</nav>