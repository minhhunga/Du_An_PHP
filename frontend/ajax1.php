<?php 
	session_start();
	if(isset($_POST['xx'])){
		$id=$_POST['xx'];
		if (isset($_SESSION['products'][$id])) {
            // Nếu có thò tăng số lượng
            $_SESSION['products'][$id]['qty'] += 1;
            echo "tăng thành công";
        } else {
            // Nếu không thì thêm sản phẩm vào  với số lượng là 1
            
             
            echo "tăng không thành công";
        }
	}
	
 ?>