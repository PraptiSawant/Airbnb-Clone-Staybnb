<?php
include('dbconn.php');
session_start();
$query="SELECT * From `home` where `hloc` LIKE '%{$_SESSION['loc']}%'";
$result=mysqli_query($conn,$query);
if(isset($_POST['view']))
{
    $id=$_GET['id'];
    $_SESSION['hid']=$id;
    header('location:hotel_details.php');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <title> Staybnb | Hyderbad-Holiday</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/210dec6054.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header2">
        <div class="logo2">           
            <img src="./images/staybnb (1).png" >
        </div> 
        <div class="search_bar">
            <div class="stay"><?php echo $_SESSION['loc'] ?></div>
            <div class="span"><?php echo number_format(date('d',strtotime($_SESSION['cin']))) ?>-<?php echo number_format(date('d',strtotime($_SESSION['cout']))) ?> <?php echo date('M',strtotime($_SESSION['cout'])) ?></div>
            <div class="add_guests"><?php echo $_SESSION['no']?> Guests</div>
            <div class="bu"><button class="button" type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button></div>
        </div>
        <div class="host2">
            <a herf="#">Switch To Hosting</a>
                <div class="sign" >
                    <a href="C:\Users\shrusti\Desktop\signin.html">
                    <img src="./images/menu.png" >
                    <img src="./images/human.png " ></a>
                </div>   
        </div>
    </div>
    <div class="filter">
        <select id="price_list">
            <option value="price">Price</option>
          </select>
          <select id="type_of_place">
            <option >Type of place</option>
            <option value="Entire_place">Entire place</option>
            <option >Private room</option>
            <option >Shared room</option>   
          </select>
    </div>
    <div class="listofhomes">
        <p>300+ stays in Hyderabad</p>
        <?php
          while($row=mysqli_fetch_assoc($result))
          {
            $q="SELECT * From `images` where `HID`='{$row['home_ID']}'";
            $res=mysqli_query($conn,$q);
            $r=mysqli_num_rows($res);
            $ro=mysqli_fetch_assoc($res);
    ?>
     <form action="list_homes.php?action=add&id=<?php echo $row['home_ID'] ?>" method="post">
        <div class="home" >
            <div class="image">
            <?php
             echo "<button name='view' class='butt1'><img src ='{$ro['imgname']}' ></button>";
            ?>
            </div>
            <div class="details">
                <div class="subtitle"><?php echo $row['hloc']; ?></div>
                <div class="title"><?php echo $row['hname']; ?></div>
                <div class="line">
                </div>
                    <ul class="facilities">
                        <li>2 guests</li>
                        <li>Studio</li>
                        <li>2 beds</li>
                        <li>1 bathroom</li>
                        <li>Wifi</li>
                        <li>Air conditioning</li>
                        <li>kitchen</li>
                        <li>Washing machine</li>
                    </ul>
                    <div class="price">
                    <?php echo $row['hprice']; ?> / night
                    </div>
                    <div class="last">
                        <div class="review">
                            <i class="fa-solid fa-star" style="color:rgb(255, 56, 92); font-size: 14px; "></i>
                            5.0( 4 reviews)
                        </div>
                        <div class="total">
                            $9,295 total
                        </div>
                    </div>
            </div>
        </div>
        </form>
        <?php }?>
         
    </div>

</body>
</html>