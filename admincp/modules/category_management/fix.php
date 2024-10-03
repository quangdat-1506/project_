<?php
	$sql_sua_danhmucsp = "SELECT * FROM tbl_category WHERE category_id = '$_GET[category_id]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($conn, $sql_sua_danhmucsp);
?>
<!-- <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh mục sản phẩm</h1>
    </div>
</div> -->

<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sửa danh mục
            </div>
            <form class="panel-body" method="POST" action="modules/category_management/handle.php?category_id=<?php echo $_GET['category_id'] ?>">
                <div class="form-group">
                    <?php 
                        while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
                    ?>
                    <div class="name_list">
                        <label>Tên danh mục:</label>
                        <input type="text" value="<?php echo $dong['tendanhmuc']; ?>" name="tendanhmuc">
                    </div>
                    <!-- <div class="numerical_order">
                        <label>Thứ tự:</label>
                        <input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu" style="margin-left: 53px">
                    </div> -->
                </div>
                <div class="form-group">
                    <input type="submit" name="suadanhmuc"  class= "btn" value="Sửa danh mục">
                </div>
                <?php
                    }
                ?>
            </form>
        </div>
    </div>
</div>

<style>
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

    .panel {
        width: 340px;
        margin-left: 315px;
        margin-top: 35px;
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