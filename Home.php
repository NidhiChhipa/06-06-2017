
<?php
session_start();
if(!array_key_exists('ID', $_SESSION))
{
	header("Location:login.html");


}

$con= mysqli_connect("localhost", "root", "root","DB1");

 if(!$con)
 {
   echo "Connection failed";

 }
 else
 {
 }

?>




<!DOCTYPE html>
<html>
<h2> Home</h2> 
<head>
	<style >
		table, th,td {
			font-family:arial,sans-serif;
			    

			
		}
	</style>
</head>

<body>

<div align="right"> <a href="logout.php">Logout</a>
</div>
<hr>
<div >

<a href="create.php">CREATE</a>
<p>Student Details</p>

</div>

<?php
  $sql="Select * from student";
  $query=mysqli_query($con,$sql);
 ?>
   
  <table border="1">
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Mobile</th>
	<th>DOB</th>
	<th>Address</th>
    <th>Update</th>
   <th> Delete</th>


	</tr>

 <?php
 while ($row=mysqli_fetch_assoc($query) )
  {
 ?>
<tr>
<td> <?php echo $row['ID'] ?> </td>
<td> <?php echo $row['Name'] ?> </td>
<td> <?php echo $row['Email'] ?> </td>
<td> <?php echo $row['Mobile'] ?> </td>
<td> <?php echo $row['DOB'] ?> </td>
<td> <?php echo $row['Address'] ?> </td>
<td><a href="edit.php?id=<?php echo $row['ID']?>">Edit </a></td>
<td><a href="delete.php?id=<?php echo $row['ID']?>">Delete </a></td>
</tr>

 <?php
 }
 ?>
</table>


























