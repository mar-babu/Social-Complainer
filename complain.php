<html>

<body background="c.jpg">
<header >
    <div align="left" >
        <font size=6 color="#FFFAF0" > YOUR COMPLAIN! </font>
    </div>
</header>
<?php

$phoneno= $_POST["phoneno"];
$complain= $_POST["complain"];
$mail= $_POST["mail"];
$crimelocation= $_POST["location"];
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
date_default_timezone_set("Asia/Dhaka");
$time= date('Y/m/d H:i:s');
$tag=0;

echo "<p style='color:white; height:20px;'>Your phone No: $phoneno";
echo "<br>";
echo "<p style='color:white; height:20px;'>$complain";
echo "<br>";

$con=mysqli_connect("localhost","root","");
if(mysqli_select_db($con, "socialcomplainer"))
    echo"<p style='color:white; height:20px;'>Connected !";
else
    echo"<p style='color:white; height:20px;'>Failed";
echo"<br>";


$sql="INSERT INTO complains(phoneno, complains,name,time,mail,crimelocation,tag) VALUES('$phoneno','$complain','$file','$time','$mail','$crimelocation','$tag')";

if(mysqli_query($con, $sql))
    echo '<script>alert("COMPLAIN Inserted into Database")</script>';
else
    echo"<p style='color:white; height:20px;'>COMPLAIN Sent failed";
echo"<br>";
echo"<br>";
?>


</body>
<div align="center" ><ul><font size="13"><A HREF="homepage.html">COMPLAIN AGAIN</A></font size> </ul></div>
</html>