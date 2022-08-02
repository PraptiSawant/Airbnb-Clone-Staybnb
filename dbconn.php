<?php
   $conn=mysqli_connect('localhost','root','','todolistdb');
   // check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}
?>