<?php
    $sqlDm="select * from tbl_category";
    $queryDm = mysqli_query($conn,$sqlDm);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="margin-left: 240px">Sản phẩm</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12" style="width: 1070px; margin-left: 299px;">
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm Sản phẩm</div>
            <div class="panel-body">
                <form action="modules/product_management/handle.php" method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                        <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required type="text" name="ten_sp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required type="text" name="gia_sp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input required id="img" type="file" name="anh_sp" >
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input required type="text" name="phu_kien" value="Dụng cụ vệ sinh sản phẩm"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required type="text" name="bao_hanh" value="12 Tháng" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input required type="text" name="tinh_trang" value="Hàng new" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select required name="trang_thai" class="form-control">
                                    <option value="Còn hàng">Còn hàng</option>
                                    <option value="Hết hàng">Hết hàng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea rows="5" class="form-control" required name="chi_tiet_sp"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select required name="category_id" class="form-control">
                                    <option value="unselect">Lựa chọn nhà cung cấp</option>
                                    <?php
						                while($rowDm = mysqli_fetch_array($queryDm)){
						            ?>
                                    <option value="<?php echo $rowDm['category_id']; ?>"><?php echo $rowDm['tendanhmuc']; ?></option>
                                    <?php
                                        }
						            ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm nổi bật</label><br>
                                Có: <input type="radio" name="dac_biet" value="1">
                                Không: <input type="radio" checked name="dac_biet" value="0">
                            </div>
                            <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                            <a href="index.php?action=quanlysanpham&query=them" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .page-header {
        font-weight: 400;
    }

    .panel-heading {
        background-color: #313a42; 
        height: 60px; 
        color: #fff; 
        line-height: 60px; 
        font-size: 20px; 
        padding-left: 15px;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }

    .panel-body form {
        background-color: #fff; 
        padding: 10px;
    }

    .form-group {
        padding-top: 12px;
    }

    .form-group label {
        font-weight: 600;
    }
</style>
