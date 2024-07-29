<?php 
    session_start();
    if(isset($_POST['xoa'])) {
        $id = $_POST['xoa'];
        if (isset($_SESSION['products'][$id])){
             unset($_SESSION['products'][$id]);
            echo " xóa sản phẩm thành công";
        }
    }

 ?>