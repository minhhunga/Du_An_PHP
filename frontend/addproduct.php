<?php 
session_start();
include 'connectbai1.php';
$a = $b = $c =  ""; 

if (isset($_POST['Add'])){
    $id = $_SESSION['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $img = $_FILES['image']['name'];
    
    $x=1;
   
    if (empty($title)){
         $a="vui lòng nhập tên";
         $x=2;
    } else {
        $a="";
    }
    
    if (empty($price)){
         $b="vui lòng nhập giá";
         $x=2;
    } else {
        $b="";
    }
    if (empty($img)){
         $c="vui lòng nhập ảnh";
         $x=2;
    } else {
        $c="";
    }
         
 
    if ( $x==1) {
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "uploadphp/".$_FILES['image']["name"])) {
            header ("Location: my-product.php");
        } else {
            echo "file upload bị lỗi";
        }

        $sql = "INSERT INTO `products` 
                ( title, price, image, user_id) 
                VALUES ('".$title."','".$price."','".$img."','".$id."');";
                
        // Chạy câu SQL
        if ($result = $con->query($sql)) {
            header("Location: my-product.php");
        } else {
            echo "<h1>Có lỗi xảy ra Click vào <a href='my-product.php'>đây</a> để về trang danh sách</h1>";
        }
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <label for="">Tên Sản Phẩm</label><br>
     <input type="text" name="title"><br>
     <?php echo $a; ?><br><br>
     <label for="">Giá Sản Phẩm</label><br>
     <input type="text" name="price"><br>
     <?php echo $b; ?><br><br>
     <label for="">Ảnh Sản Phẩm</label><br>
     <input type="file" name="image"><br><br>
     <?php echo $c; ?><br>
    <input type="submit" value="Add" name="Add">
</form>
