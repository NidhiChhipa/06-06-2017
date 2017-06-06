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
$query = "select * from student where ID=".$ID;
$query_execute=mysqli_query($con,$query);
$result = mysqli_fetch_assoc($query_execute);

if(!$query)
{
	echo("Error");

}
else
{
$name=$result['Name'];
$email=$result['Email'];
$mobile=$result['Mobile'];
$add=$result['Address'];
$dob=$result['DOB'];
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script> 
<body>
<form action="edit.php" method="post">

	Name:<input type="text" name="Name" value="<?php echo $name; ?>"><br>
    Email:<input type="Email" name="Email" value="<?php echo $email; ?>"><br>
    Mobile:<input type="text" name="Mobile" value="<?php echo $mobile; ?>"><br>
    Address:<input type="text" name="Address" value="<?php echo $add; ?>"><br>
    DOB:<input type="date" name="Date" id="datepicker" value="<?php echo $dob; ?>"><br>
     Update:<input type="submit" name="Update" value="Update">
     <input type="hidden" name="id" value="<?php echo $ID ?>">

   </form>
    <?php

   
    if(isset($_POST['Update']))
    {

$name_submit=$_POST['Name'];
$email_submit=$_POST['Email'];
$mobile_submit=$_POST['Mobile'];
$address_submit=$_POST['Address'];
$dob_submit=$_POST['Date'];
$id=$_POST['id'];	

$update_query="UPDATE student SET Name ='$name_submit', Email ='$email_submit',
		 Mobile ='$mobile_submit',Address ='$address_submit',DOB='$dob_submit' WHERE ID = '$id'"; 
$update_query_execute=mysqli_query($con,$update_query);
if($update_query_execute)
 		{
 			echo "successfully inserted";
 			header('Location: Home.php');
 		}
 			else{
 				echo "Failed to insert";
 			}		
}
              	
?>







    









  


