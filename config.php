<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['ID']=$_POST['username'];
     


 $con= mysqli_connect("localhost", "root", "root","DB1");

 if(!$con)
 {
   echo "Connection failed";

 }
 else
 {

 

   $sql="Select * from tbl_test where username='$username' and password='$password'";
    	$query=mysqli_query($con,$sql);

     $row=mysqli_num_rows($query);
     if($row==1)
     {   $_SESSION['ID']=$_POST['username'];
         header('Location:Home.php');


     }
    else
      header('Location:login.html');
    

     	
}
      
?>
