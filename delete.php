<?php
 
session_start();
 $ID=$_GET['id'];

$con= mysqli_connect("localhost", "root", "root","DB1");
if(!$con)
 {
   echo "Connection failed";

 }
 else
 {
 	echo "Successful";
 }


$sql="delete from student where ID='$ID'";
$result=mysqli_query($con,$sql);
if ($result) 
{
	echo "Deleted";
	 header('Location:Home.php');

}

else{
	
	echo "Not deleted";
}
?>



