
<?php
include('dbconn.php');
session_start();
$que="SELECT * From `home` where `home_ID`='{$_SESSION['hid']}'";
$result=mysqli_query($conn,$que);
$data=mysqli_fetch_assoc($result);

$q="SELECT * From `images` where `HID`='{$_SESSION['hid']}'";
$res=mysqli_query($conn,$q);
$ro=mysqli_fetch_assoc($res);
$date=strtotime($_SESSION['cin']);
$d1=number_format(date('d',$date));
$date=strtotime($_SESSION['cout']);
$d2=number_format(date('d',$date));
$night=$d2-$d1;
$_SESSION['night']=$night;
$total=($data['hprice']*$_SESSION['night'])+677.23+57.9;
if(isset($_POST['book']))
{
    $qry="INSERT INTO `rent` (`UID`,`hID`, `checkin`, `checkout`,`guestno`,`tot`) VALUES ('{$_SESSION['uid']}','{$_SESSION['hid']}','{$_SESSION['cin']}','{$_SESSION['cout']}','{$_SESSION['no']}','$total')";
    $r=mysqli_query($conn,$qry);
    header("location:ty.php");

}
?><html>
<head>

<title>staybnb.co.in</title>
<link rel="stylesheet" href="styleb.css">
<script>
  
function check(){
    var payment =document.getElementById("payment").value; 
    var guest =document.getElementById("guest").value; 
    var date =document.getElementById("date").value; 
     confirm("date from to till :"+ date +"\n guest: "+guest+"\n payment method: "+payment);
    alert("booking succesful");  }
     function increase(){
        document.getElementById("image").style.width="120px"; 
        document.getElementById("image").style.height="120px"; 
     }
     function decrease(){
        document.getElementById("image").style.width="80px"; 
        document.getElementById("image").style.height="90px"; 
     }
     function increaseppl(){
        document.getElementById("imageppl").style.width="100px"; 
       
     }
     function decreaseppl(){
        document.getElementById("imageppl").style.width="50px"; 
       
     }
     function increasevisa(){
        document.getElementById("visa").style.width="60px"; 
        document.getElementById("visa").style.height="50px"; 
     }
     function decreasevisa(){
        document.getElementById("visa").style.width="30px"; 
        document.getElementById("visa").style.height="30px";
     }
     function increasevisa(){
        document.getElementById("visa").style.width="60px"; 
        document.getElementById("visa").style.height="50px"; 
     }
     function decreasevisa(){
        document.getElementById("visa").style.width="30px"; 
        document.getElementById("visa").style.height="30px";
     }
     function increasemc(){
        document.getElementById("imagemc").style.width="60px"; 
        document.getElementById("imagemc").style.height="50px"; 
     }
     function decreasemc(){
        document.getElementById("imagemc").style.width="30px"; 
        document.getElementById("imagemc").style.height="30px";
     }
     function increasea(){
        document.getElementById("imagea").style.width="60px"; 
        document.getElementById("imagea").style.height="50px"; 
     }
     function decreasea(){
        document.getElementById("imagea").style.width="30px"; 
        document.getElementById("imagea").style.height="30px";
     }
     </script>
</head>
<body> 
<div class="header">
<nav >
<div class="logo">
<img src="./images/staybnb (1).png " >
</div>
 
</nav>
</div>
<div class="mainbox">
    
<div class="request">
    <a href="#">
    <img src="./images/left.png"></a>
    <label><b>Request to book</b></label>
</div>
<div class="detail">

<div class="subbox1">
<form class="mainform" action="booking.php" method="post">
<label><b>Your trip</b></label>
<div class="your">
    
    <div class="date">
        <div class="box">
        <label><b>Dates</b></label>
        <input type="text" placeholder="" value="<?php echo $_SESSION['cin']." - ".$_SESSION['cout']; ?>" id="date">
    </div>
        <div class="box1">
            <a href="#"><b>Edit</b><input type="date"></a>
        </div>
    </div>
    <div class="guest">
        <div class="box">
        <label><b>Guest</b></label>
        <input type="text" placeholder="1 guest" value="<?php echo $_SESSION['no']; ?>"id="guest">
    </div>
        <div class="box1">
            <a href="#"><b>Edit</b></a>
        </div>
    </div>
</div>
<div class="pay">
    <div class="block">
    <div class="box3">
    <label><b>Pay with</b></label></div>
<div class="box1"><img src="./images/v.png" id="visa" onmouseover="increasevisa()" onmouseout="decreasevisa()">
    <img src="./images/n.jpg" id="imagemc" onmouseover="increasemc()" onmouseout="decreasemc()">
    <img src="./images/a1.png" id="imagea" onmouseover="increasea()" onmouseout="decreasea()"> 
</div>
</div>
<div class="optionchoose">
    <select name='cerdit' id="payment">
        <option value="starting"><img src="./images/fb.png">credit or Debit Card</option>
        <option value="cerdit" > <img src="./images/fb.png">credit</option>
        <option value="cerdit" > <img src="./images/fb.png">Debit</option>
        
        </select></div>
        <div class="coupon">
            <a href="#"><b>Enter a coupon</b></a>
        </div>
</div>
<div class="require">
    <label><b>Require for your trip</b></label>
    <div class="message">
        <label><b>Message the host</b></label>
        <p>let the host know why you're travelling and when you'll check in</p>
    </div>
    <div class="name">
        <div class="box4">
            <img src="./images/home.webp" id="imageppl" onmouseover="increaseppl()" onmouseout="decreaseppl()">
        </div> 
        <div class="text1">
            <p><b>Raju</b><br>joined in 2001</p>
        </div>
    </div>
  
       <textarea row="10" col="100"  ></textarea>
    
</div>
<div class="cancelp">
<label><b> Cancellation policy</b></label>
<p>Cancel before 11:00 an on 9 Apr and get full refund, minus the first night and service fee.<a href="#"> learn more</a></p>
<p>our Extenuating Circumstances policy does not cover travel disruptionscaused by COVID-19.<a href="#"> learn more</a></p>
</div>
<div class="reservation">
    <div class="box4">
        <img src="./images/clock.jpg">
    </div> 
    <div class="text1">
        <p><b>Your reservation won't be confirmed until the host accepts your request(within 24 hrs).</b><br>you won't be charged until then.</p>
    </div>

    </div>
    <div class="agree">
        <p>By selecting the button below,I agree to the <a href="#">Host's House Rules</a>,<a href="#">Staybus's COVID-19 Safety Requirements </a>and the <a herf="#">Guest Refund policy</a>I agree to pay the total amount shown if the host accepts my booking request.</p>
    </div>
    <button class="submitbtn" type="submit" name="book"> Request to book</button>

</form>
</div>
<div class="subbox2">
    
    <div class="priced">
        <div class="info">
            <div class="box5">
                <img id="image" src="<?php echo $ro['imgname']; ?>" onmouseover="increase()" onmouseout="decrease()">
            </div> 
            <div class="text1">
                <p>Room available<br><b><?php echo $data['hname']; ?></b><br><?php echo $data['hloc']; ?></p>  </div>
        
            </div>
    </div>
    <div class="price">
        <label><b>Price details</b></label>
      
        <table class="cal">
            <tr><td class="ti">$<?php echo $data['hprice']; ?> * <?php echo $night; ?> nights   </td><td>$<?php echo $data['hprice']*$night; ?></td></tr>
            <tr><td  class="ti"><a href="#">Service fee  </a></td><td>$677.23</td></tr>
            <tr><td  class="ti"><a href="#">Occupancy taxes and fees</a></td><td>$57.9</td></tr>
        </table>
        <table class="cal2"><tr  class="total"><td><b>Total(INR).</b></td><td>$<?php echo ($data['hprice']*$night)+677.23+57.9; ?></td></tr></table>
    </div>
</div>

</div>
 </div>
 <div class="footer">
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
</body>
</html>

