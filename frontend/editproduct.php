<?php 
include 'connectbai1.php';

$id=$_GET['id'];
$sql= "SELECT * FROM `products` WHERE id='".$id."' ";
$result=$con->query($sql);
if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $data=$row;
    $id=$data["id"];
    $title=$data["title"];
    $price=$data["price"];
    $img=$data["image"];
    
} 
if(isset($_POST["Edit"])){
    $title=$_POST['title'];
    if($_FILES['image']['name']==""){
        $img=$data["image"];
    }else{
        $img=$_FILES['image']['name'];
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploadphp/".$img);
    }
    $price=$_POST['price'];
    $sql="UPDATE `products` SET `title`='$title', `price`='$price', `image`='$img' WHERE `id`='".$id."'";
    if ($con->query($sql)) {
        header("Location: my-product.php");
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="ID_SẢN_PHẨM"> <!-- Thay 'ID_SẢN_PHẨM' bằng ID thực của sản phẩm -->
    <label for="">Tên Sản Phẩm</label><br>
    <input type="text" name="title" value="<?php echo $title; ?>" ><br><br>
    <label for="">Giá Sản Phẩm</label><br>
    <input type="text" name="price" value="<?php echo $price; ?>"><br><br>
    <label for="">Ảnh Sản Phẩm</label><br>
    <input type="file" name="image" value="<?php echo $img; ?>"><br><br>
    <input type="submit" value="Edit" name="Edit">
</form>
