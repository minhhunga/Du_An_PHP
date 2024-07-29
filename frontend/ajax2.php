<?php
session_start();

// Kiểm tra xem item_id có được đặt trong yêu cầu POST không
if(isset($_POST['xx'])) {
    $id = $_POST['xx'];

    if(isset($_SESSION['products'][$id]['qty']) && $_SESSION['products'][$id]['qty'] > 1) {
        $_SESSION['products'][$id]['qty'] -= 1;
        echo "giảm thành công";
    }else {
        echo "giảm không thành công";
    } 
} else if(isset($_POST['delete'])) {
        // Yêu cầu xóa ID
    $id = $_POST['delete'];
        unset($_SESSION['products'][$id]);
        echo " xóa sản phẩm thành công";
    }
?>
