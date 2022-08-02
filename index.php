<?php 
include ('dbconn.php');
session_start();
if(isset($_POST['search']))
{
    $loc=$_POST['loc'];
    $chi=$_POST['chin'];
    $cho=$_POST['chout'];
    $no=$_POST['guest'];
    $_SESSION['cin']=$chi;
    $_SESSION['cout']=$cho;
    $_SESSION['no']=$no;
    $_SESSION['loc']=$loc;
    header('location:list_homes.php');
}
if(isset($_POST['continue']))
{
    $name=$_POST['name'];
$password=$_POST['pass1'];
$pno=$_POST['pno1'];
$reg="INSERT into user (`username`,`phn`,`password`) values ('$name','$pno','$password')";
mysqli_query($conn,$reg);
echo "<script>";
echo 'alert("Registered Successfully")';
echo "</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staybnb : Vacation Rentals</title>
    <script src="https://kit.fontawesome.com/210dec6054.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type=text/javascript src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDdaD9QECmzvD8pcMv4ABDNxK-Fc5v73w&libraries=places"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="suggest" id="s">
    <span id="txtHint">
    </span>
</div>
    <div class="header">
            <div class="logo">           
                    <img src="./images/staybnb.png" >
            </div> 
            <form class="start" action="index.php" method="post">
                <div class="start1">
                    <div class="nav-lists">
                        <div class="palcestostay"><a href="#"> Places to stay</a></div>
                        <div class="exp"><a href="#">Experiences</a></div>
                        <div class="onlineexp"><a href="#"> Online experiences</a></div>
                    </div> 
                    <div class="host-list">
                        <div class="host">
                            <a herf="#"><b> Became a host</b></a></div>
                                <p><?php if(isset($_SESSION['uid']))
{
    $q="SELECT * from `user` where `User_ID`='{$_SESSION['uid']}'";
$res=mysqli_query($conn,$q);
$data=mysqli_fetch_assoc($res);
echo $data['username'];
}?>
                                <div class="sign" onclick="togglePopup()">
                                    <img src="./images/menu.png" >
                                    <img src="./images/human.png " >
                                </div>   
                    </div>
                </div> 
                     <div class="search-box">
                        <div class="box"><label>
                            <div class="location">
                             <div class="l"><div  class="l1">Location</div><div class="places-search"><input type="text" id="location" name="loc" onkeyup="showHint(this.value)" onmouseout="document.getElementById('s').style.display='none'"></div></div>  </div> 
                             <div class="in"> <div class="l"><div class="l1">Check in</div> <div ><input name="chin" type="date" placeholder="Add dates"></div></div></div> 
                             <div class="out"> <div class="l"><div class="l1">Check out</div><div ><input  name="chout" type="date" placeholder="Add dates"></div></div></div> 
                             <div class="guest"><div class="l2"><div class="l1" onclick="popgo()">Guests</div><div class="place" > <input   name="guest" type="text" id="no_g" placeholder="Add guests" onclick="popupg()"></div></div></div> 
                             <div class="bu"><button class="button" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button></div></div>
                        </label> 
         
                    </div>     
            </form>
        </div>
        <div class="search-box2">
            <div class="inner-search">
                <div class="box"><label>
                    <div class="location">
                     <div class="l"><div  class="l1">Location</div><div class="places-search"><input type="text" id="location" onkeyup="showHint(this.value)"></div></div>  </div> 
                     <div class="in"> <div class="l"><div class="l1">Check in</div> <div ><input  type="date" placeholder="Add dates"></div></div></div> 
                     <div class="out"> <div class="l"><div class="l1">Check out</div><div ><input  type="date" placeholder="Add dates"></div></div></div> 
                     <div class="guest"><div class="l2"><div class="l1" onclick="popgo()">Guests</div><div class="place" > <input   type="text" id="no_g" placeholder="Add guests" onclick="popupg()"></div></div></div> 
                     <div class="bu"><button class="button" type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button></div>
                    </div>
                </label> 
            </div>
        </div>   
        <div class="loginpopup" id="popup-2">
            <div class="overlay">
                <div class="content-2">
                    <div class="close-btn" onclick="togglePopup()">
                        &times;
                    </div> 
                    <div class="login1">  
                        <div class="boxc1">
                           <d1v class="boxc2">
                        <h1 id="w">Welcome to Staybnb</h1></d1v>
                        <div class="option1">
                          <div id="btn2"></div>
                          <button type="button" class="toggle1" onclick="signin()">sign up</button>
                          <button type="button" class="toggle1" onclick="login1()">Log in</button>
                        </div>
                        <div class="social1">
                            <img src="./images/fb.png">
                            <img src="./images/tw.png">
                            <img src="./images/ins.png"></div>
                            <div class="infoc1">
                        <form class="input-infoc1" id="login1" action="login.php" method='post'>
                          <table class="table1" >
                              <tr class="tr1" >
                                  <td> <select name='sname' id="code" class="input-fieldc1">
                                <option value="+0" name="sname">country/region</option>
                              <option value="+91" name="sname">+91 INDIA</option>
                              <option value=+971 id="code" name="sname">+971 UAE</option>
                              <option value=+44  id="code" name="sname">+44 UNITED KINGDOMS</option>
                              <option value=+39 id="code" name="sname">+39 ITALY</option>
                              </select> </td>
                              <td>
                                   <input type="tel"  patten="[0-9]{3}-[0-9]{4}-[0-9]{3}" name="pno" class="input-fieldc1" id="no" placeholder="phone-number"> 
</td></tr>
<tr>
     <td id="selectedc1"> <label class="input-fieldc1"><b>Password:-</b></label></td><td>
                            <input type="password" placeholder="password" name="pass" class="input-fieldc1" id="pass"> </td></tr></table>
                                 <button class="submitbtnc1" type="botton" id="botton1"onclick="check()" > continue</button>
                        
                            </form> 
                     
                        <form class="input-infoc1" id="register" action="index.php" method='post'>
                             <p id="errorc1"></p>
                            <table class="table1">
                                <tr class="tr1" >
                                    <td id="selectedc1">
                            <label class="input-fieldc1"> <b>User Name:-</b></label></td>
                           <td ><input type="text" placeholder="user name" name="name" class="input-fieldc1" id="name">
                        </td> </tr>
                         <tr class="tr1" >
                              <td id="selectedc1"> <label class="input-fieldc1"><b>Password:-</b></label></td><td>
                            <input type="password" placeholder="password" name="pass1" class="input-fieldc1" id="pass">
                        </td></tr> 
                        <tr class="tr1" >
                                <td > <select name='sname' id="code1" class="input-fieldc1">
                                <option value="+0" name="sname">country/region</option>
                              <option value="+91" name="sname">+91 INDIA</option>
                              <option value=+971 id="code" name="sname">+971 UAE</option>
                              <option value=+44  id="code" name="sname">+44 UNITED KINGDOMS</option>
                              <option value=+39 id="code" name="sname">+39 ITALY</option>
                              </select> </td><td> <input type="tel"  name="pno1" patten="[0-9]{3}-[0-9]{4}-[0-9]{3}" class="input-fieldc1" id="no1" placeholder="phone-number">
                             </td></tr></table>
                                  
                              
                             <input type="checkbox" class="check-boxc1"><span >i agree to terms and conditions</span>
                              <button class="submitbtnc1"   type="botton" onclick="check1()" name="continue" > continue</button>
                        
                            </form>
                        </div>
                       
                        </div>
                    </div>
            </div>
        </div>
</div>
        <div id="popup-1">
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
        
        <div class="main_image">
            <div class="main_heading">
                    <img src="./images/start.webp" style="width:100%; height:100%;">
                    <h3>Let your curiosity do the booking</h3>
                    <button class="btn">I'm flexible</button>
            </div>
            <div class="main_heading">
                <img src="./images/slid1.webp" style="width:100%;height:100%;">
                <h3>Let your curiosity do the booking</h3>
                <button class="btn">I'm flexible</button>
        </div>
        <div class="main_heading">
            <img src="./images/slide4.jpg" style="width:100%;height:100%;">
            <h3>Let your curiosity do the booking</h3>
            <button class="btn">I'm flexible</button>
    </div>
    <div class="main_heading">
            <img src="./images/slid3.jpg" style="width:100%;height:100%;">
            <h3>Let your curiosity do the booking</h3>
            <button class="btn">I'm flexible</button>
    </div>
        </div>
                  
    <div class="container" >
        <h2>Inspiration for your next trip</h2>
        <div class="card" style="background-color: rgb(204, 45, 74)">
            <div class="imag">
                <img src="./images/Madikeri.webp">
            </div>
            <div class="feature">
                <h3>Madikeri</h3>
                <p>209 kilometers away</p>
            </div>
        </div> 
        <div class="card" style="background-color: rgb(188,26,110)">
            <div class="imag">
                <img src="./images/ooty.webp">
            </div>
            <div class="feature">
                <h3>Ooty</h3>
                <p>209 kilometers away</p>
            </div>
        </div> 
        <div class="card" style="background-color:#D93B30">
            <div class="imag">
                <img src="./images/chikmaglur.webp">
            </div>
            <div class="feature">
                <h3 >Chikmaglur</h3>
                <p>209 kilometers away</p>
            </div>
        </div> 
        <div class="card" style="background-color: #DE3151">
            <div class="imag">
                <img src="./images/Gokarna.webp">
            </div>
            <div class="feature">
                <h3 >Gokarna</h3>
                <p>209 kilometers away</p>
            </div>
        </div> 
    </div>
    <div class="experiances" >
        <h2>Discover Airbnb Experiences</h2>
        <div class="cards" style="background-image: url(./images/mountain.webp);">
            <div class="feature1">
                <h3>Things to do
                    on your trip</h3>
                <button class="btn">Experiances</button>
            </div>
        </div> 
        <div class="cards" style="background-image: url(./images/home.webp);">
            <div class="feature1">
                <h3>Things to do
                    from home</h3>
                <button class="btn">Online Experiances</button>
            </div>
        </div> 
    </div>
    <div class="hosting" >
        <h2>Questions about hosting ?</h2>
        <button class="btn1">Ask a Superhost</button>
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
    <script src="index.js">
     
    </script>
   
</body>
</html>