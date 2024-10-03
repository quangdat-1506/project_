<?php
	$sql_lietke_danhmucsp = "SELECT * FROM tbl_category ORDER BY tendanhmuc DESC";
	$query_lietke_danhmucsp = mysqli_query($conn, $sql_lietke_danhmucsp);

	// Thêm trang cho phần danh sách danh mục
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	else $page=1;
	$rowsPerPage=5;
	$perRow=$page*$rowsPerPage - $rowsPerPage;
	$sql="select * from tbl_category order by category_id limit $perRow,$rowsPerPage";
	$query = mysqli_query($conn,$sql);
	
	$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from tbl_category"));
	$totalPages=ceil($totalRows/$rowsPerPage);
	$listPage ="";
	for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="index.php?action=quanlydanhmucsanpham&query=them='.$i.'">'.$i.'</a></li>';
		}
       else $listPage .='<li><a href="index.php?action=quanlydanhmucsanpham&query=them='.$i.'">'.$i.'</a></li>';
	}
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header" style="margin-left: 242px"><b>Danh mục sản phẩm</b></h2>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading" style="width: 400px">
                Thêm danh mục
            </div>
            <form class="panel-body" method="post" style="width: 400px;" action="modules/category_management/handle.php">
                <div class="form-group">
                    <div class="name_list">
                        <label><b>Tên danh mục:</b></label>
                        <input type="text" name="tendanhmuc" placeholder="Tên danh mục..." >
                    </div>
                    <!-- <div class="numerical_order">
                        <label>Thứ tự:</label>
                        <input type="text" name="thutu" style="margin-left: 53px">
                    </div> -->
                </div>
                <div class="form-group">
                    <input type="submit" name="themdanhmuc"  class= "btn" value="Thêm mới">
                </div>
            </form>
        </div>
    </div>

    <div class="col-xs-12 col-md-7 col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách danh mục</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th style="width:30%">Tùy chọn</th>
                            </tr>
                        </thead>
                        <?php
                            $i = 0;
                            while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
                            $i++;
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['tendanhmuc']?></td>
                                <td>
                                    <a href="?action=quanlydanhmucsanpham&query=sua&category_id=<?php echo $row['category_id'] ?>" class="btn btn-warning">Sửa</a> 
                                    <a href="modules/category_management/handle.php?category_id=<?php echo $row['category_id'] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                                <!-- <td></td> -->
                            </tr>
                        </tbody>
                        <?php
                            }
                        ?>
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
    h2 {
        margin-left: 242px;
        font-size: 28px;
    }
    .btn {
        background-color: #313a42;
        border: 1px solid #313a42;
        color: #fff;
    }

    .btn:hover {
        background-color: #4b4f52;
        color: #fff;
    }

    .name_list input {
        width: 100%; 
        margin-top: 5px; 
        border: 1px solid #eee;
        padding-left: 10px;
        height: 32px;
        border-radius: 4px;
    }

    .panel-heading {
        color: #fff;
        line-height: 50px;
        padding-left: 20px;
        background: #313a42;
        height: 50px;
        border-top-left-radius: 7px; 
        border-top-right-radius: 7px;
    }

    .panel-body {
        background: white;
        /* margin-top: -20px; */
        padding: 20px;
        border-bottom-left-radius: 7px; 
        border-bottom-right-radius: 7px; 
    }

    .btn-warning {
        background-color: #f0ad4e;
        color: #fff;
        border: 1px solid #f0ad4e;
    }

    .btn-warning:hover {
        background-color: #eea236;
        /* color: #fff; */
    }
    
    .btn-warning:hover {
        background-color: #eea236;
    }

    .btn-danger {
        background-color: #d9534f;
        color: #fff;
        border: 1px solid #d9534f;
    }

    .btn-danger:hover {
        background-color: #d43f3a;
    }
</style>
