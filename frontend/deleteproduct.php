<?php 
include 'connectbai1.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM `products` WHERE `id`='".$id."'";
    if ($con->query($sql)) {
        echo "<h1>Xóa sản phẩm thành công Click vào <a href='my-product.php'>đây</a> để về trang danh sách</h1>";
    }else{
        echo "<h1>Có lỗi xảy ra Click vào <a href='my-product.php'>đây</a> để về trang danh sách</h1>";
    }
} else {
    echo "<h1>ID sản phẩm không tồn tại. Click vào <a href='my-product.php'>đây</a> để về trang danh sách</h1>";
}
 ?>
