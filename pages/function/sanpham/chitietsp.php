<?php
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM tbl_product WHERE product_id='$product_id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<div class="wrap-inner">
    <div class="product-info">
        <h3><?php echo $row['ten_sp'] ?></h3>
        <div class="row">
            <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                <img src="admincp/modules/product_management/img/<?php echo $row['anh_sp'];?>" class="img-thumbnail">
            </div>
            <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                <p>Giá: <span class="price"><?php echo $row['gia_sp'];?></span></p>
                <p>Bảo hành: <?php echo $row['bao_hanh'];?></span></p>
                <p>Phụ kiện: <?php echo $row['phu_kien'];?></p>
                <p>Tình trạng: <?php echo $row['tinh_trang'];?></p>
                <p>Khuyến mãi: <?php echo $row['khuyen_mai'];?></p>
                <p>Trạng thái: <?php echo $row['trang_thai'];?></p>
                <div class="quantity">
                    <button class="minus" aria-label="Decrease">&minus;</button>
                    <input type="number" class="input-box" value="1" min="1" max="100">
                    <button class="plus" aria-label="Increase">&plus;</button>
                </div>
                <form method="POST" action="pages/function/giohang/themgiohang.php?product_id=<?php echo $row['product_id'] ?>">
                    <a href="../giohang/ <?php echo $row['product_id'];?>"><button type="button" 
                    class="btn btn-danger">Đặt mua</button></a>
                    <!-- <a href="pages/function/giohang/themgiohang.php?product_id= <?php echo $row['product_id'];?>"><button name="themgiohang" type="button"
                    class="btn btn-danger">Thêm giỏ hàng</button></a> -->
                    <!-- <p><input class="themgiohang" type="submit" name="submit" value="Thêm giỏ hàng"></input></p> -->
                    <a><input class="themgiohang" type="submit" name="submit" value="Thêm giỏ hàng"></input></a>
                </form>
            </div>
        </div>
    </div>
    <div id="product-detail">
        <h3>Chi tiết sản phẩm</h3>
        <div id="cpsContent" class="cps-block-content">
            <pre id="content"><?php echo $row['chi_tiet_sp'];?></pre>
        </div>
        <!-- <pre><?php echo $row['chi_tiet_sp'];?></pre> -->
    </div>
</div>

<script>
    (function () {
        const quantityContainers = document.querySelectorAll(".quantity");

        quantityContainers.forEach((container) => {
            const minusBtn = container.querySelector(".minus");
            const plusBtn = container.querySelector(".plus");
            const inputBox = container.querySelector(".input-box");

            updateButtonStates(inputBox);

            container.addEventListener("click", (event) => handleButtonClick(event, inputBox));
            inputBox.addEventListener("input", () => handleQuantityChange(inputBox));
        });

        function updateButtonStates(inputBox) {
            const value = parseInt(inputBox.value);
            const minusBtn = inputBox.parentNode.querySelector(".minus");
            const plusBtn = inputBox.parentNode.querySelector(".plus");
            minusBtn.disabled = value <= 1;
            plusBtn.disabled = value >= parseInt(inputBox.max);
        }

        function handleButtonClick(event, inputBox) {
            if (event.target.classList.contains("minus")) {
            decreaseValue(inputBox);
            } else if (event.target.classList.contains("plus")) {
            increaseValue(inputBox);
            }
        }

        function decreaseValue(inputBox) {
            let value = parseInt(inputBox.value);
            value = isNaN(value) ? 1 : Math.max(value - 1, 1);
            inputBox.value = value;
            updateButtonStates(inputBox);
            handleQuantityChange(inputBox);
        }

        function increaseValue(inputBox) {
            let value = parseInt(inputBox.value);
            value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
            inputBox.value = value;
            updateButtonStates(inputBox);
            handleQuantityChange(inputBox);
        }

        function handleQuantityChange(inputBox) {
            let value = parseInt(inputBox.value);
            value = isNaN(value) ? 1 : value;

            // Execute your code here based on the updated quantity value
            console.log("Quantity changed:", value);
        }
    })();
</script>
