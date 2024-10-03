<?php
    session_start();
?>
<p>Giỏ hàng</p>
<?php
    if(isset($_SESSION['cart'])){

    }
?>
<table class="table table-bordered table-responsive">
    <tr>
        <!-- <th>Id</th> -->
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Thao tác</th>
    </tr>
    <?php
    if(isset($_SESSION['cart'])) {
        $i = 0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = number_format(floatval($cart_item['gia_sp']) * $cart_item['soluong'], 6, '.', '.') . 'đ';    
        $i++;
    ?>
    <tr>
        <!-- <td><?php echo $i;?></td> -->
        <td><?php echo $cart_item['ten_sp']; ?></td>
        <td><img class="img-responsive" src="admincp/modules/product_management/img/<?php echo $cart_item['anh_sp']; ?>" width="120px"></td>
        <td>
            <div class="quantity">
                <button class="minus" aria-label="Decrease">&minus;</button>
                <input type="number" class="input-box" value="1" min="1" max="100">
                <button class="plus" aria-label="Increase">&plus;</button>
            </div>
        </td>
        <td><?php echo $cart_item['gia_sp']; ?></td>
        <td><?php echo $thanhtien; ?></td>
        <td>
            <!-- <a onclick="return xoaSanPham();" href="modules/product_management/handle.php?idsanpham=<?php echo $row['product_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Xóa</a> -->
            <a href="pages/function/giohang/xoasp.php?ten_sp=<?php echo $cart_item['ten_sp']; ?>" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
    <?php
        }
    }else{
    ?>
    <tr>
        <td colspan="6"><p>Hiện tại giỏ hàng trống</p></td>
    </tr>
    <?php
    }
    ?>
</table>
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

        // function handleQuantityChange(inputBox) {
        //     let value = parseInt(inputBox.value);
        //     value = isNaN(value) ? 1 : value;

        //     console.log("Quantity changed:", value);
        // }
    })();
</script>