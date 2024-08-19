<?php

require_once 'connection.php';

if(isset($_POST["submit"])){
  $productname = $_POST["productname"];
  $price = $_POST["price"];
  

 
  
if($_FILES["imageUpload"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["imageUpload"]["name"];
    $fileSize = $_FILES["imageUpload"]["size"];
    $tmpName = $_FILES["imageUpload"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '..img/' . $newImageName);
      $query = "INSERT INTO product(Name,Price,Image) VALUES('$productname',$price,'$newImageName')";
      mysqli_query($con, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'product.php';
      </script>
      ";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>

    <section id="upload_container">
        <form action="product.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name="productname" id="productname" placeholder="Product Name" required>
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" onclick="upload();">Choose Image</button>
            <input type="submit"  name="submit">
        </form>
        <a href="productdetails.php"><input type="submit" value="Cancel" name="submit1"></a>
</section>

<script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    </script>
</body>
</html>