<html>

<body bgcolor="#52C7F0" align="left">
<header >
	<div align="left" >
		<font size=10 color="FFFAF0" > FULL COMPLAIN DETAILS: </font>
</div>
</header>
<?php 
  
$id= $_GET["id"];
$location=$_GET["crimelocation"];

$con=mysqli_connect("localhost","root","");
if(mysqli_select_db($con, "socialcomplainer"))
echo"<p style='color:white; height:10px;'>Connected !";
else
echo"<p style='color:white; height:20px;'>Failed";
echo"<br>";
echo "<p style='color:white; height:20px;'>ID No: $id  GotLOCATION: $location ";

$sql= "SELECT * FROM complains where id='$id'";
$result= mysqli_query($con, $sql);


while($row=mysqli_fetch_row($result)) {
	echo  "<p style='color:white; height:30px;'> COMPLAIN NO: " . $row[2]. "</p>";
echo  "<p style='color:white; height:30px;'> CRIME LOCATION NO: " . $row[6]. "</p>";             
echo  "<p style='color:white; height:30px;'> COMPLAINER MAIL: " . $row[5]. "</p>";
echo  "<p style='color:white; height:30px;'> COMPLAIN TIME/DATE: " . $row[4]. "</p>";	
 echo "<p style='color:white; height:30px;'>COMPLAINER PHONE NO: " . $row[0]. "</p> <p style='color:white; height:20px;'>COMPLAIN TIME/DATE: " . $row[4]. "</p>";
echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row[3] ).'" height="400" width="500" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
echo  "<p style='color:white; height:30px;'> COMPLAIN: " . $row[1]. "</p>";
echo "<a href=\"dismissed.php?id=".$row[2]."\">dismissied</a><br />";
echo "<br> <br> <br>";
echo "<br> <br> <br>";

}
if ($location=="Dhaka" || $location=="dhaka") {
$location="23.6943,90.3444";   
   
} elseif ($location=="Chittagong" || $location=="chittagong") {
$location="22.341900,91.815536";  
} else {
 echo "<script> myMap(); </script>"; 
}

?>


<div id="map" style="width:100%;height:500px"></div>
<script>
function myMap() {
  var myCenter = new google.maps.LatLng(<?php echo $location ?>);
  var mapCanvas = document.getElementById("map");

  var mapOptions = {center: myCenter, zoom: 7, panControl: true,
    zoomControl: true,
    mapTypeControl: true,
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true,
    rotateControl: true };
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  
}


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPcYEm8YAwDh0hCBrvmZj6LbmUA3bwvKo&callback=myMap"></script>

</body>
 <div align="center" ><ul><font size="13"><A HREF="admin_page.php">BACK TO COMPLAIN PAGE</A></font size> </ul></div>
</html>