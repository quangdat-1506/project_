<?php
    $sql_sua_sp = "SELECT * FROM tbl_product WHERE product_id='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($conn,$sql_sua_sp);
    
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
            <div class="panel-heading">Sửa Sản phẩm</div>
            <div class="panel-body">
                <?php
                    while($row = mysqli_fetch_array($query_sua_sp)){
                ?>
                    <form method="post" action="modules/product_management/handle.php?idsanpham=<?php echo $row['product_id'] ?>" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                            <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" value="<?php echo $row['ten_sp']; ?>" name="ten_sp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required type="text" value="<?php echo $row['gia_sp']; ?>" name="gia_sp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input required id="img" type="file" name="anh_sp" >
                                    <input type="hidden" name='anh_sp' value="<?php echo $row['anh_sp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input required type="text" value="<?php echo $row['phu_kien']; ?>" name="phu_kien" value="Hộp, sạc, tai nghe"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input required type="text" value="<?php echo $row['bao_hanh']; ?>" name="bao_hanh" value="12 Tháng" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input required type="text" value="<?php echo $row['khuyen_mai']; ?>" name="khuyen_mai" value="Dán màn hình 3 lớp"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required type="text" value="<?php echo $row['tinh_trang']; ?>" name="tinh_trang" value="Máy mới 100%" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select required name="trang_thai" value="<?php echo $row['trang_thai']; ?>" class="form-control">
                                    <option <?php
                                        if($row['trang_thai'] == "Còn hàng"){
                                            echo 'selected="select"';
                                        }
                                            ?> >Còn hàng</option>
                                            <option <?php
                                        if($row['trang_thai'] == "Hết hàng"){
                                            echo 'selected="select"';
                                        }
						            ?> >Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <textarea rows="5" class="form-control" required name="chi_tiet_sp"><?php if(isset($_POST['chi_tiet_sp'])){
                                        echo $_POST['chi_tiet_sp'];}else echo $row['chi_tiet_sp']; ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select required name="category_id" class="form-control">
                                        <option value="unselect">Lựa chọn nhà cung cấp</option>
                                        <?php
                                            while($rowDm = mysqli_fetch_array($queryDm)){
                                            ?>
                                                <option <?php
                                            if($row['category_id'] == $rowDm['category_id']){
                                                echo 'selected="select"';
                                            }
                                                ?> value="<?php echo $rowDm['category_id']; ?>"><?php echo $rowDm['tendanhmuc']; ?> </option>
                                                <?php
                                            }
						                ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label><br>
                                    Có : <input type="radio" name="dac_biet" <?php
                                    if($row['dac_biet'] == 1){
                                        echo 'checked';
                                    }
                                        ?> value="1">
                                    <br>
                                    Không : <input type="radio" name="dac_biet" <?php
                                    if($row['dac_biet'] == 0){
                                        echo 'checked';
                                    }
                                        ?> value="0">
                                </div>

                                <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                                <a href="index.php?action=quanlysanpham&query=them" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                <?php
                    }
                ?>
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
        height: 60px; color: #fff; 
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

<!-- 
    thêm phần more.php
    sửa sua&category_id thành them&category_id
 -->