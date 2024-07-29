<?php 
session_start();
include "connectbai1.php";

if (isset($_POST['xx'])) {
    $id = $_POST['xx'];

    $sql = "SELECT * FROM `products` WHERE `id`='".$id."'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra sản phẩm đã có  chưa
        if (isset($_SESSION['products'][$id])) {
            // Nếu có thò tăng số lượng
            $_SESSION['products'][$id]['qty'] += 1;
            echo "đã mua thành công";
        } else {
            // Nếu không thì thêm sản phẩm vào  với số lượng là 1
            $row['qty'] = 1;
            $_SESSION['products'][$id] = $row;
            echo "mua không thành công";
        }
       

    }
}
?>
