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


 
if(isset($_POST['Submit']))
{  
	



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


			   
			if (empty($_POST['Address'])) {

				

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
			 {  	 $sql="INSERT INTO student (Name,Email,Mobile,Address,DOB) 
					 VALUES ('$name','$email','$mobile','$address','$dob')"; 
					 $query=mysqli_query($con,$sql);
					  
			   if($query)
			   {
			    echo "successfully inserted";
			    header('Location: Home.php');
			   }
			   else{ 
			   			echo "failed to insert";
			   		}
			 } 



?>

<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>


</head>
<body>
<caption>Student Registeration</caption>
<form name="registration" action="create.php" method="post" enctype="multipart/form-data" >

	Name:<input type="text" name="Name"> <span class="error"> <?php echo $nameErr;?> </span><br>
    Email:<input type="text" name="Email"><span class="error"> <?php echo $emailErr;?> </span><br>
    Mobile:<input type="text" name="Mobile" maxlength="10" minlength="10" ><span class="error"><?php echo $mobileErr;?> </span><br>
    Address:<input type="text" name="Address"><span class="error"> <?php echo $addErr;?> </span><br>
    DOB:<input type="text" id="datepicker" name="Date"><span class="error"> <?php echo $dobErr;?> </span><br>
    Submit:<input type="submit" name="Submit" value="Submit">

</form>

</body>
</html>












	








