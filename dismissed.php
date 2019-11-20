<html>

<body background="c.jpg">
<header >
	<div align="left" >
		<font size=6 color="FFFAF0" > YOUR COMPLAIN! </font>
</div>
</header>
<?php 
  
$id= $_GET["id"];
 $tag=1;

echo "<p style='color:white; height:20px;'>Your phone No: $id";


$con=mysqli_connect("localhost","root","");
if(mysqli_select_db($con, "socialcomplainer"))
echo"<p style='color:white; height:20px;'>Connected !";
else
echo"<p style='color:white; height:20px;'>Failed";
echo"<br>";


$sql="UPDATE complains SET tag =1 WHERE id = '$id'";
if(mysqli_query($con, $sql)) 
echo '<script>alert("COMPLAIN DISMISSED")</script>';
else
echo"<p style='color:white; height:20px;'>COMPLAIN Sent failed";
echo"<br>";
echo"<br>";
?>


</body>
 <div align="center" ><ul><font size="13"><A HREF="admin_page.php">BACK TO COMPLAIN PAGE</A></font size> </ul></div>
</html>