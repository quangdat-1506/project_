<?php
    session_start();
    include("../../../configuration/connect.php");

    if(isset($_POST['submit'])) {
        // session_destroy();
        $id=$_GET['product_id'];
        $soluong=1;
        $sql="SELECT * FROM tbl_product WHERE product_id='".$id."' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        if($row) {
            $new_product=array(array('ten_sp'=>$row['ten_sp'],'id'=>$id,'soluong'=>$soluong,'gia_sp'=>$row['gia_sp'],
            'anh_sp'=>$row['anh_sp']));

            if(isset($_SESSION['cart'])) {
                $found = false;
                foreach($_SESSION['cart'] as $cart_item) {
                    if($cart_item['id']==$id) {
                        $product[] = array('ten_sp'=>$cart_item['ten_sp'],'id'=>$cart_item['id'],'soluong'=>$soluong,
                        'gia_sp'=>$cart_item['gia_sp'],'anh_sp'=>$cart_item['anh_sp']);
                        $found = true;
                    }else{
                        // neu du lieu khong trung
                        $product[] = array('ten_sp'=>$cart_item['ten_sp'],'id'=>$cart_item['id'],'soluong'=>$soluong,
                        'gia_sp'=>$cart_item['gia_sp'],'anh_sp'=>$cart_item['anh_sp']);
                    }
                }
                // lien ket du lieu new_product và product
                if($found == false) {
                    $_SESSION['cart'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cart'] = $product;                
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header("location: ../../../index.php?page_layout=giohang");
    }
?>


