<?php
include('dbconn.php');
session_start();
$q="SELECT * From `images` where `HID`='{$_SESSION['hid']}'";
$res=mysqli_query($conn,$q);
$ro=mysqli_fetch_assoc($res);
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/210dec6054.js" crossorigin="anonymous"></script>
</head>
<body background="<?php echo $ro['imgname']; ?>" class="ty">
<div class="header2" style="box-shadow: 0px 10px 10px -13px grey; height:80px; background-color:white;">
        <div class="logo2" style="margin-left: 110px;">           
            <a href="index.php" ><img src="./images/staybnb (1).png" ></a>
        </div> 
        <div class="host2" style="margin-left: 710px;">
            <a herf="#">Switch To Hosting</a>
                <div class="sign" >
                    <a href="C:\Users\shrusti\Desktop\signin.html">
                    <img src="./images/menu.png" >
                    <img src="./images/human.png " ></a>
                </div>   
        </div>
    </div>
    <div class="thank">
        <h2>Thank You!</h2>
        <p>Hoping to provide you the best holiday rental. Start Your Packing ! </p>
    </div>
    
</body>
</html>