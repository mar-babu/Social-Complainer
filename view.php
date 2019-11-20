<html>

<body bgcolor="#3EE415" align="left">
<header >
	<div align="center" >
		<u><font color=black font face='verdana' size='13pt'>FULL COMPLAIN DETAILS</font></u>
</div>
</header>
<?php 
  
$id= $_GET["id"];
$location=$_GET["crimelocation"];

$con=mysqli_connect("localhost","root","");
if(mysqli_select_db($con, "socialcomplainer"))
echo"<p align=center><font color=white font face='verdana' size='10pt'></font><br><br>";
else
echo"<p style='color:red; height:20px;'>Failed";
echo"<br>";
/* echo "<p style='color:white; height:20px;'>ID No: $id  GotLOCATION: $location ";
 */
$sql= "SELECT * FROM complains where id='$id'";
$result= mysqli_query($con, $sql);


while($row=mysqli_fetch_row($result)) {
	echo  "<p><font color=black font face='verdana' size='5pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPLAIN NO: </font><font color=red font face='verdana' size='5pt'>" . $row[2]. "</font></p>";
echo  "<p ><font color=black font face='verdana' size='5pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CRIME LOCATION NO: </font><font color=red font face='verdana' size='5pt'>" . $row[6]. "</font></p>";             
echo  "<p ><font color=black font face='verdana' size='5pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPLAINER MAIL: </font><font color=red font face='verdana' size='5pt'>" . $row[5]. "</font></p>";
echo  "<p s><font color=black font face='verdana' size='5pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPLAIN TIME/DATE: </font><font color=red font face='verdana' size='5pt'>" . $row[4]. "</font></p>";	
 echo "<p ><font color=black font face='verdana' size='5pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPLAINER PHONE NO: </font><font color=red font face='verdana' size='5pt'>" . $row[0]. "</font></p>" ;
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row[3] ).'" height="500" width="800" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  

echo  "<p ><font color=black font face='verdana' size='5pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPLAIN: </font>" . $row[1]. "</p>";
echo "<a href=\"dismissed.php?id=".$row[2]."\"><font color=blue font face='verdana' size='5pt'>Dismiss it?</a></font><br/>";
echo "<br> <br> <br>";
echo "<br> <br> <br>";

}


?>


<div id="map" style="width:100%;height:500px"></div>
<script>
        function myMap() {
        <?php
            echo "
            var address='$location';
            ";
        ?>


            var geocoder = new google.maps.Geocoder();
            var infoWindow = new google.maps.InfoWindow();

            var myCenter = new google.maps.LatLng( 23.6943, 90.3444 );
            var mapCanvas = document.getElementById("map");

            var mapOptions = {
                center: myCenter, 
                zoom: 7, 
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true
            };
            var map = new google.maps.Map( mapCanvas, mapOptions );
            var marker = new google.maps.Marker( { position:myCenter } );
                marker.setMap( map );


            /* a callback function to process the response from geocoding */
            var evtcallback=function(results, status){
                if( status == google.maps.GeocoderStatus.OK ){

                    var _address=results[0].formatted_address;
                    var _location=results[0].geometry.location;
                    var _lat=_location.lat();
                    var _lng=_location.lng();

                    console.info( 'Geocoding succeeded for %s and found address %s [ %s,%s ]', address, _address, _lat, _lng );

                    latlng=new google.maps.LatLng( _lat, _lng );
                    marker.setPosition( latlng );
                    marker.setTitle( _address );

                    google.maps.event.addListener( marker, 'click', function(event){
                        infoWindow.setContent( this.title );
                        infoWindow.open( map, this );
                        infoWindow.setPosition( this.position );
                    }.bind( marker ) );

                    map.setCenter( latlng );
                    map.setZoom(13);
                } else {
                    console.info('geocoding %s failed with status %d', address, status);
                }
            }
            /* invoke the geocoder service with your location to geocode */
            geocoder.geocode({ 'address':address }, evtcallback );
        }
    </script>
    <script async defer src="//maps.google.com/maps/api/js?key=AIzaSyCPcYEm8YAwDh0hCBrvmZj6LbmUA3bwvKo&callback=myMap"></script>
</body>
 <div align="center" ><ul><font size="13"><A HREF="admin_page.php">BACK TO COMPLAIN PAGE</A></font size> </ul></div>
</html>