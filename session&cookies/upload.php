<?php require 'koneksi.php'; ?>
<?php 
session_start();
    
    if (!isset($_SESSION['status'])) {
        echo"Login dahulu bang, kalau mau upload gambar lagi <a href='login.php'>Login dulu</a>";
      }
      ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Upload File</label>
    <?php if (isset($_SESSION['status'])) { ?>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" name="upload">
    <?php } ?>
    </form>

</body>
</html>



<?php


if(isset($_POST["upload"])) {
$target_dir = "uploadfile/";
$file = basename($_FILES["fileToUpload"]["name"]);
$nama_file = $_FILES["fileToUpload"]["tmp_name"];
$uploadd = $target_dir.$file;
$uploadmasuk = move_uploaded_file($nama_file,$uploadd);
$uploadOk = 1;
$imagetypefile = pathinfo($uploadd,PATHINFO_EXTENSION);

  if ($imagetypefile != "jpg" && $imagetypefile != "png" && $imagetypefile != "gif") {
 echo "Sorry, only JPG,PNG, and GIF";
  }
    
    if($uploadmasuk !== false) {
        echo "File is an image - " . $uploadmasuk["mime"] . ".";
        $uploadOk = 1;
        echo"<br><img src='".$target_dir.$file."' width=50%><br>";
        session_unset();
        session_destroy();
        echo"Login dahulu bang, kalau mau upload gambar lagi <a href='login.php'>Login dulu</a>";
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

    ?>