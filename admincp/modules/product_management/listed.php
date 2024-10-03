<script>
    function xoaSanPham() {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
    }
</script>
<?php
$sql_lietke_sanpham = "SELECT * FROM tbl_product ORDER BY ten_sp DESC";
$query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
// Thanh phân trang
if(isset($_GET['page'])){
    $page=$_GET['page'];
} else {
    $page=1;
}
$rowsPerPage=5;
$perRow=$page * $rowsPerPage - $rowsPerPage;

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_product"));
$totalPages=ceil($totalRows / $rowsPerPage);
$listPage = "";
for($i=1; $i <= $totalPages; $i++){
    if($page == $i){
        $listPage .= '<li class="active"><a href="index.php?action=quanlysanpham&query=them&page='.$i.'">'.$i.'</a></li>';
    } else {
        $listPage .= '<li><a href="index.php?action=quanlysanpham&query=them&page='.$i.'">'.$i.'</a></li>';
    }
}

$sql = "SELECT tbl_product.*, tbl_category.tendanhmuc 
        FROM tbl_product 
        INNER JOIN tbl_category 
        ON tbl_product.category_id = tbl_category.category_id 
        ORDER BY tbl_product.product_id 
        LIMIT $perRow, $rowsPerPage";
$query = mysqli_query($conn, $sql);
?>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header" style="margin-left: 240px">Danh sách sản phẩm</h2>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12" style="margin-left: 240px; width: 82%; margin-top: 30px">
        <a href="?action=quanlysanpham&query=themsp" style="background: #313a42; color: #fff; border: 1px solid #313a42" class="btn btn-primary">Thêm sản phẩm </a>
        <div class="bootstrap-table">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-top:20px;">
                    <thead>
                        <tr class="bg-info">
                            <th>ID</th>
                            <th width="30%">Tên Sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th width="20%">Ảnh sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><?php echo $row['ten_sp']; ?></td>
                            <td><?php echo $row['gia_sp']; ?></td>
                            <td>
                                <img width="100px" src="modules/product_management/img/<?php echo $row['anh_sp']; ?>" class="thumbnail">
                            </td>
                            <td><?php echo $row['tendanhmuc']; ?></td>
                            <td>
                                <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['product_id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Sửa</a>
                                <a onclick="return xoaSanPham();" href="modules/product_management/handle.php?idsanpham=<?php echo $row['product_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Xóa</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right">
                    <li><a href="#"><<</a></li>
                    <?php echo $listPage; ?>
                    <li><a href="#">>></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .page-header {
        font-weight: 600;
    }

    h1 {
        font-weight: 400;
        margin-bottom: 25px;
    }

    .btn-warning {
        background-color: #f0ad4e;
        color: #fff;
    }

    .btn-warning:hover {
        color: #fff;
    }
    
    .btn-warning:hover {
        background-color: #eea236;
    }
</style>
