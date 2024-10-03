<div class="main">
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        if($tam =='quanlydanhmucsanpham' && $query=='them'){
            include("modules/category_management/more.php");
            include("modules/category_management/listed.php");
        }elseif($tam =='quanlydanhmucsanpham' && $query=='sua') {
            include("modules/category_management/fix.php");
        }elseif($tam =='quanlysanpham' && $query=='them') {
            include("modules/product_management/listed.php");
        }elseif($tam =='quanlysanpham' && $query=='themsp'){
            include("modules/product_management/more.php");
        }elseif($tam =='quanlysanpham' && $query=='sua'){
            include("modules/product_management/fix.php");
        }elseif($tam == 'giohang' && $query=='xoa'){
            include("pages/function/giohang/xoasp.php");
        }elseif($tam =='dangnhap' && $query=='dangnhap'){
            include("function/register/register.php");
        }else{
            include("modules/introduce.php");
        }
    ?>
</div>