<?php
// Thanh phân trang
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=4;
$perRow=$page*$rowsPerPage - $rowsPerPage;

//nhan tu khoa tim kiem
if (isset($_POST['stext'])) {
    $stext = $_POST['stext'];
} elseif (isset($_GET['stext'])) {
    $stext = $_GET['stext'];
} else {
    $stext = ''; // Hoặc một giá trị mặc định khác phù hợp với logic của bạn
}


$stextNew = trim($stext); //loai bo cac khoang trang dau va cuoi chuoi tu khoa
$arr_stextNew = explode(' ',$stextNew);// ngat 1 chuoi thanh 1 mang cac ki tu
$stextNew = implode('%',$arr_stextNew); // noi phan tu mang voi 1 chuoi
$stextNew='%'.$stextNew.'%';

$sql="select * from tbl_product where ten_sp like ('$stextNew') order by product_id limit $perRow,$rowsPerPage ";
$query = mysqli_query($conn,$sql);

// tong so ban ghi
$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from tbl_product where ten_sp like ('$stextNew')"));
//tong so trang
$totalPages=ceil($totalRows/$rowsPerPage);
//xay dung thanh phan trang
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="index.php?action=quanlydanhmucsanpham&query=them='.$stext.'&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="index.php?action=quanlydanhmucsanpham&query=them='.$stext.'&page='.$i.'">'.$i.'</a></li>';
}
?>
<div id="wrap-inner">
    <div class="products">
        <!-- <h3>Tìm kiếm với từ khóa: <span><?php echo $stext; ?></span></h3> -->
        <div class="product-list row">
            <?php
                while($row = mysqli_fetch_array($query)){
            ?>
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row['product_id'];?>">
                    <img src="admincp/modules/product_management/img/<?php echo $row['anh_sp'];?>" class="img-thumbnail">
                </a>
                <p class="#"><?php echo $row['ten_sp']?></p>
                <p class="price"><b><?php echo $row['gia_sp'];?></b>
                <!-- <div class="marsk">
                    <a href="index.php?page_layout=chitietsp&product_id=<?php echo $row_pro['product_id'];?>">Learn more</a>
                </div> -->
            </div>
            <?php
            }
            ?>

        </div>
    </div>

    <ul class="pagination" style="float: right">
        <li><a href="#"><<</a></li>
        <?php echo $listPage; ?>
        <li><a href="#">>></a></li>
    </ul>
</div>