<?php
$user_name= $_POST["user_name"];
$password= $_POST["password"];

$con=mysqli_connect("localhost","root","");
if(mysqli_select_db($con, "socialcomplainer")) 
echo"Connected with IdeaON";
else
echo"Failed";
echo "<br>";


if (isset($_POST['submit']))
        {     
    session_start();
    $user_name= $_POST["user_name"];
$password= $_POST["password"];
    $_SESSION['login_user']=$user_name; 
	$sql="SELECT username FROM admins WHERE username='$user_name' and password='$password'";
    $run=mysqli_query($con,$sql);
     if (mysqli_num_rows($run))
    {
		
      header("location: admin_page.php");
      }
      else
      {
    echo "Invalid";
    }
		}
?>