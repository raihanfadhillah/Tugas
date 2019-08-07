<!DOCTYPE html>
<html lang="en">
<?php include'koneksi.php'; 
session_start();

  
      if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' && password = '$password'");

        $cek = mysqli_num_rows($sql);
        if ($cek == true) {
          
                $_SESSION['status'] = "login";
                $namecookie = "tajoer";
                $isicookie = $_SESSION['status'];
                setcookie($namecookie, $isicookie, time()+ (86400*30),'/');
                header("location:upload.php");

            }
            else {
                echo"gagal";
            }
            
      }
     
     
  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Username</label><br>
        <input type="text" name="user"><br>
        <label for="">Password</label><br>
        <input type="password" name="pass"><br>
       
        <input type="submit" value="submit" name="submit"><br>
        
        <br>
    </form>
    <hr>
  
</body>
</html>