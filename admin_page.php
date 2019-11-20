<html>
<header >
    <div align="center" style="background-color:green;color:white;" >
        <font size="40" >ADMIN ACTION PAGE</font size>
</header>
<div align="right" style="font-size:15pt;background-color:red;color:white;"  ><A HREF="homepage.html">BACK TO HOME</A> </div> <div align="left" style="font-size:15pt;background-color:red;color:white;"><A HREF="login.html">LOGOUT</A> </div>
</div>
<body bgcolor="#3EE415" align="center" >

<?php   session_start();
$user_mail=$_SESSION['login_user'];
?>
<?php
if(!isset($_SESSION['login_user']))  {
    header("Location:login.html");
}
$con=mysqli_connect("localhost","root","");
if(mysqli_select_db($con, "socialcomplainer"))
    echo"<br> Welcome Sir!";
$sql= "SELECT * FROM complains where tag=0 ORDER BY time DESC";
$result= mysqli_query($con, $sql);

echo "<table width='95%' border='2' height='36' align='center'>
<tr  style=\"font-size: 22px;\"   align='center' >
<th>COMPLAIN TIME/DATE</th>
<th>COMPLAIN NO</th>
<th>CRIME LOCATION</th>
<th>ACTION-1</th>
<th>ACTION-2</th>
</tr>";

while($row=mysqli_fetch_row($result))
{
    echo "<tr align='center' height='36'>";
    echo "<td style=\"font-size: 24px;\" width='25%' >" . $row[4] . "</td>";
    echo "<td style=\"font-size: 26px;\" width='15%'>" . $row[2] . "</td>";
    echo "<td style=\"font-size: 24px;\" width='15%'>"  . $row[6] . "</td>";
    echo "<td style=\"font-size: 24px;\" width='20%'> <a href=\"view.php?id=". $row[2] ."&crimelocation=". $row[6] ."\">VIEW DETAILS</a></td>";
    echo "<td style=\"font-size: 24px;\" width='15%'> <a href=\"dismissed.php?id=". $row[2] ."\">DISMISS</a></td>";
    echo "</tr>";
}
echo "</table>";
/* {
echo  "<p style='color:white; height:20px;'> COMPLAIN TIME/DATE: " . $row[4]. "</p>";
echo  "<p style='color:white; height:20px;'> COMPLAIN NO: " . $row[2]. "</p>";
echo  "<p style='color:white; height:20px;'> CRIME LOCATION: " . $row[6]. "</p>";  
echo "<a href=\"dismissed.php?id=".$row[2]."\">DISMISSED</a><br />"; //getting id from database and goto dismiss page, receive the id by _GET['id']
echo "<a href=\"view.php?id=".$row[2]."\">VIEW DETAILS</a><br />";  
echo "<br> <br> <br>";
echo "<br> <br> <br>"; */




/* echo  "<p style='color:white; height:20px;'> COMPLAINER MAIL: " . $row[5]. "</p>";	
 echo "<p style='color:white; height:20px;'>COMPLAINER PHONE NO: " . $row[0]. "</p> <p style='color:white; height:20px;'>COMPLAIN TIME/DATE: " . $row[4]. "</p>";
echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row[3] ).'" height="400" width="500" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

echo  "<p style='color:white; height:20px;'> COMPLAIN: " . $row[1]. "</p>"; */



?>
<marquee style="color:white;" direction="right" scrollamount="5"  > social issues </marquee>
<marquee style="color:white;" scrollamount="7"  > corrupton </marquee>
<marquee style="color:white;" direction="right" scrollamount="4"  > misleading </marquee>
<marquee style="color:white;" scrollamount="5"  > misjudgement </marquee>
<marquee style="color:white;" direction="right" scrollamount="12"  > inJustice </marquee>
<marquee style="color:white;" scrollamount="8"  > Brive </marquee>
<marquee style="color:white;" direction="right" scrollamount="5"  > Dowry </marquee>
<marquee style="color:white;" scrollamount="3"  > Thefts </marquee>
</body>
</html>