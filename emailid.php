<?php
session_start();

$con= mysqli_connect("localhost", "root", "root","DB1");

 if(!$con)
 {
   echo "Connection failed";

 }
 else
 {
 }

 if(isset($_POST['user_email']))
 {
 	$emailId=$_POST['user_email'];
 	$sql="Select Email from student where Email='$emailId' ";
 	 $query=mysqli_query($con,$sql);
 	 if(($row=mysqli_num_rows($query))>0)
 	 {
 	 	echo "Email already exists";
 	 }
 	 else
 	 {
 	 	echo "OK";
 	 }
 	 exit();
 }
 ?>
 