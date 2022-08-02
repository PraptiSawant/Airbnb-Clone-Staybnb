<?php 
session_start();
include ('dbconn.php');
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
header("location:index.php");
}
?>
