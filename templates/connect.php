<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="tudodb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['signup']))
{	
	 $email = $_POST['email'];
	 $pass = $_POST['password'];
	 $confirmpassword = $_POST['confirmpassword'];


	 $sql_query = "INSERT INTO registration VALUES ('0','$email','$pass','$confirmpassword')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "Registered Successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>