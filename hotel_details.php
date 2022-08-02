<?php
include('dbconn.php');
session_start();
$que="SELECT * From `home` where `home_ID`='{$_SESSION['hid']}'";
$result=mysqli_query($conn,$que);
$data=mysqli_fetch_assoc($result);

$q="SELECT * From `images` where `HID`='{$_SESSION['hid']}'";
$res=mysqli_query($conn,$q);
$r=mysqli_num_rows($res);
$ro=mysqli_fetch_assoc($res);

$querry="SELECT * From `user`,`home` where `home_ID`='{$_SESSION['hid']}' and `UID` =`User_ID`";
$resul=mysqli_query($conn,$querry);
$data1=mysqli_fetch_assoc($resul);

$date=strtotime($_SESSION['cin']);
$d1=number_format(date('d',$date));
$date=strtotime($_SESSION['cout']);
$d2=date('dd-mm-yyyy',$date);

if(isset($_POST['reserve']))
{
    $chi=$_POST['cin'];
    $cho=$_POST['cout'];
    $no=$_POST['ng'];
    $_SESSION['cin']=$chi;
    $_SESSION['cout']=$cho;
    $_SESSION['no']=$no;
    $tot = $data['hprice']+600+579;
    $_SESSION['tot']=$tot;
    header('location:booking.php');
}
?>
<html>
<head>
    <title>Room Details</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/210dec6054.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header2" style="box-shadow: 0px 10px 10px -13px grey; height:100px;">
        <div class="logo2" style="margin-left: 110px;">           
            <img src="./images/staybnb (1).png" >
        </div> 
        <div class="search_bar" style="width:280px; margin-left: 280px;">
            <div class="stay1"><input type="text" placeholder="Start Your Search"></div>
            <div class="bu"><button class="button" type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button></div>
        </div>
        <div class="host2" style="margin-right: 110px;">
            <a herf="#">Switch To Hosting</a>
                <div class="sign" >
                    <a href="C:\Users\shrusti\Desktop\signin.html">
                    <img src="./images/menu.png" >
                    <img src="./images/human.png " ></a>
                </div>   
        </div>
    </div>
    <h1 style="margin-left: 110px; margin-top:29px;font-size:26px; font-weight:600; line-height:30px;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"><?php echo $data['hname']; ?></h1>
    <ul class="link_list">
        <li><i class="fa-solid fa-star" style="color:rgb(255, 56, 92); font-size: 14px; "></i>4.60</li>
        <li><a href="#">5 reviews</a></li>
        <li><a href="#" style="color: rgb(113,113,113);"><?php echo $data['hloc']; ?></a></li>
    </ul>
    <div class="hotel_images">
            <div class="img1"><img src="<?php echo $ro['imgname']; ?>"></div>
            <?php 
                        for($i=1;$i<$r;$i++)
                        {
                            $row=mysqli_fetch_assoc($res)
            ?>
            <div><img src="<?php echo $row['imgname']; ?>"></div>
            <?php } ?>
        </div>
    </div>
    <div class="cont">
        <div class="left">
            <h2 style="margin-left:0px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 22px; font-weight: 600 ; color:rgb(34, 34, 34);line-height: 26px; ">Room in hotel hosted by <?php echo $data1['username']; ?><ul class="" style=" display:flex; margin-top:0px; margin-left: 0px; color: rgb(34,34,34); font-size: 16px; font-weight: 400; line-height: 20px;">
                <li style="margin-left: 20px;">2 guests</li>
                <li style="margin-left: 25px;">1 bedroom</li>
                <li style="margin-left: 25px;">1 bed</li>
                <li style="margin-left: 25px;">1 private bathroom</li>      
            </ul></h2>
            <div class="owner"><img src="./images/owner.webp" style="width:60px; height:50px; border-radius: 25px; "></div>
            <hr class="line">
            <ul class="details_list">
                <li><i class="fa-solid fa-bookmark"></i>Wifi<span>Guests often search for this popular amenity</span></li>
                <li><i class="fa-solid fa-star"></i>Experianced host<span>Gazi has 155 reviews for other places<span></li>
                <li><i class="fa-solid fa-message"></i>Great communication<span>90% of recent gust rated Gazi 5-star in commmunication</span></li>
            </ul>
            <hr class="line">
            <p class="hotel_desc">><?php echo $data['hdesc']; ?><br><br>
                <b>Other things to note</b><br>
                - Strictly no smoking.</p>
                <hr class="line">
                <div class="map">
                    <h3>Where you'll be</h3>
                    <p><?php echo $data['hloc']; ?></p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.7610080971886!2d78.41418061402604!3d17.327076509104373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbbdb4f16e718b%3A0xd434ff7dcdc03fe!2sROOM!5e0!3m2!1sen!2sin!4v1649510603310!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <hr class="line">
                <table  class="Extra">
                    <tr><th>House rules</th>
                        <th>Health & safety</th>
                        <th>Cancellation policy</th></tr>
                    <tr><td><i class="fa-solid fa-clock"></i>Check-in: 12:00 pm -2:00 am</td>
                        <td><i class="fa-solid fa-industry"></i>Committed to Airbnb's enhanced cleaning process.</td>
                    <td>Cancel before 12:00 pm on 14 Apr and get a 50% refund, minus the first night and service fee.</td></tr>
                     <tr>
                         <td><i class="fa-solid fa-ban"></i>
                            No pets
                         </td>
                         <td><i class="fa-solid fa-mask-face"></i>
                            Airbnb's social distancing and other COVID-19-related guidelines apply
                         </td>
                     </tr>
                     <tr>
                         <td><i class="fa-solid fa-ban"></i>No parties or events</td>
                         <td><i class="fa-solid fa-circle-exclamation"></i>No carbon monoxide alarm</td>
                     </tr>
                     <tr>
                        <td><i class="fa-solid fa-smoking"></i>Smoking is allowed</td>
                        <td><i class="fa-solid fa-circle-exclamation"></i>No smoke alarm</td>
                     </tr>
                </table>
               
        </div>
        <div id="popup-3">
            <label>Guests</label>
            <button id="g" onclick="decfung()" class="incb">-</button>
            <span id="ip1">0</span>
            <button id="g" onclick="incfung()" class="decb">+</button>
            <hr style="border:0.4px solid rgb(230, 227, 227)">
            <label>Children</label>
            <button onclick="decfunc()" class="incb">-</button>
            <span id="ip2">0</span>
            <button onclick="incfunc()" class="decb">+</button>
            <hr style="border:0.4px solid rgb(230, 227, 227)">
            <label>Infants</label>
            <button id="g" onclick="decfuni()" class="incb">-</button>
            <span id="ip3">0</span>
            <button id="g" onclick="incfuni()" class="decb">+</button>
            <hr style="border:0.4px solid rgb(230, 227, 227)">
            <label>Pets</label>
            <button id="g" onclick="decfunp()" class="incb">-</button>
            <span id="ip4">0</span>
            <button id="g" onclick="incfunp()" class="decb">+</button>
        </div>
        <div class="right">
                <div class="box1">
                    <div class="pr">$<?php echo $data['hprice']; ?> night</div>
                    <div class="re"><i class="fa-solid fa-star" style="color:rgb(255, 56, 92); font-size: 12px; "></i>4.60 . 5 reviews</div>
                </div>
                    <form action="hotel_details.php" method="post">
                        <div class="dates">
                            <div class="dl">
                                <label style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">CHECK-IN</label>
                                <input type="date" name="cin">
                            </div>
                            <div class="dr">
                                <label>CHECK-OUT</label>
                                <input type="date" name="cout">
                            </div>
                            <div class="dr1">
                                <label  onclick="document.getElementById('popup-3').style.display='none'">GUESTS</label>
                                <br><br><input   type="text" id="no_g" name="ng" onclick="document.getElementById('popup-3').style.display='block'">
                            </div>
                            <button name="reserve">Reserve</button>
                            </div>     
                    </form>
                    <table border="1" class="fee">
                        <tr><td>$<?php echo $data['hprice']; ?> X 1 night</td><td style="text-align: right;">$3,500</td></tr>
                        <tr><td>Cleaning fee</td><td style="text-align: right;">$600</td></tr>
                        <tr><td>Service fee</td><td style="text-align: right;">$579</td></tr>
                        <tr style="border-top: 1px solid grey;"><td style="font-weight: 600; font-size: 18px;">Total before taxes</td><td style="font-weight: 600; font-size: 18px; text-align: right;">$<?php echo $data['hprice']+600+579; ?></td></tr>
                    </table>
        </div>

    </div>
    <div class="footer" style="margin-top:750px">
        <ul class="o_list">
           <li style="font-weight: bold;">Support</li>
            <li><a href="#">Help Centre</a></li>
            <li><a href="#">Safety information</a></li>
            <li><a href="#">Cancellation options</a></li>
            <li><a href="#">Our COVID-19 Response</a></li>
            <li><a href="#">Supporting people with disabilities</a></li>
            <li><a href="#">Report a neighbourhood concern</a></li>
        </ul>
        <ul class="o_list">
           <li style="font-weight: bold;">Commmunity</li>
            <li><a href="#">Airbnb.org:disaster relief housing</a></li>
            <li><a href="#">Support Afghan refugees</a></li>
            <li><a href="#">Comabting discrimination</a></li>
        </ul>
        <ul class="o_list">
           <li style="font-weight: bold;">Hosting</li>
            <li><a href="#">Try hosting</a></li>
            <li><a href="#">AirCover: protection for Hosts</a></li>
            <li><a href="#">Explore hosting resources</a></li>
            <li><a href="#">Visit our commmunity forum</a></li>
            <li><a href="#">How to host  responsibly</a></li>
        </ul>
        <ul class="o_list">
           <li style="font-weight: bold;">About</li>
            <li><a href="#">Newsroom</a></li>
            <li><a href="#">Learn about new features</a></li>
            <li><a href="#">Letter from our founder</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Investors</a></li>
            <li><a href="#">Airbnb Luxe</a></li>
        </ul>
        <div class="end">
           <span>© 2022 Airbnb, Inc.</span>
           <a href="#" class="fa fa-twitter"></a>
           <a href="#" class="fa fa-facebook"></a>
           <a href="#" class="fa fa-instagram"></a>
        </div>
   </div>
   <script src="index.js">
       </script>
</body>
</html>