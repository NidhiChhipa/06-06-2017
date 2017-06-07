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


$id=$_POST['id'];	

$nameErr=$emailErr=$mobileErr=$addErr=$dobErr=$name=$email=$mobile=$dob="";    
       
 if (empty($_POST["Name"])) 
{
 $nameErr="Name is required <br> ";
 }
 else
{
$name = $_POST["Name"]; 
if (!preg_match("/^[a-zA-Z ]*$/",$name))
{
$nameErr = "Only letters and white space allowed <br>";
 }
}


if (empty($_POST["Email"]))
{
$emailErr = "Email is required <br>";
} 
else {
$email = $_POST["Email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
   $emailErr = "Invalid email format <br>";
   }
 }

if(empty($_POST['Mobile']))
 {
 $mobileErr="Enter mobile number <br>";
 }
else
 { 
   $mobile=$_POST['Mobile'];
 if(!preg_match("/^\d{10}$/",$mobile))
 {
   $mobile="Invalid number <br>";
 }
}

         
if (empty($_POST['Address'])) 
{
$addErr="Address is required <br>";
 }
 else
{
 $address = $_POST["Address"]; 
 }


if (empty($_POST['Date']))
{
$dobErr="DOB is required <br>";
}
 else 
{
$dob=$_POST['Date'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) {
$dobErr = "Invalid DOB <br>";
 }
 }

}


if(!empty($nameErr) || !empty($emailErr) || !empty($mobileErr) || !empty($addErr) || !empty($dobErr))
{
        
}

else
{
 $update_query="UPDATE student SET Name ='$name', Email ='$email',
		 Mobile ='$mobile',Address ='$address',DOB='$dob' WHERE ID = '$id'"; 
     $update_query_execute=mysqli_query($con,$update_query);
     if($update_query_execute)
 		 {
 			echo "successfully updated";
 			header('Location: Home.php');
 		 }
 			else
      {
 				echo "Failed to update";
 			}		
}
              	
?>







    









  


