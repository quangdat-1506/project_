<?php
    $category_id = $_GET['category_id'];
    $sqlDm = "SELECT * FROM tbl_category WHERE category_id='$category_id'";
    $queryDm = mysqli_query($conn, $sqlDm);
    $rowDm = mysqli_fetch_array($queryDm);
    
    $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id' ORDER BY product_id DESC";
    $query = mysqli_query($conn, $sql);
?>

<div class=""wrap-inner>
    <div class="products_list">
        <h3><?php echo $rowDm['tendanhmuc'];?></h3>
        <div class="product-list row">
            <?php
                while($row = mysqli_fetch_array($query)) {
            ?>
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row['product_id'];?>">
                    <img src="admincp/modules/product_management/img/<?php echo $row['anh_sp'];?>"class="img-thumbnail">
                </a>
                <p class="#"><?php echo $row['ten_sp'];?></a></p>
                <p class="price"><b><?php echo $row['gia_sp'];?></a></b>
                <!-- <div class="marsk">
                    <a href="<?php echo $row['product_id'];?>">Learn more</a>
                </div> -->
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    
</div>