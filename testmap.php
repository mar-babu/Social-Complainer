<?php 
    $location="rajshahi";
?>
<html>
  <head>
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
                    map.setZoom(15);
                } else {
                    console.info('geocoding %s failed with status %d', address, status);
                }
            }
            /* invoke the geocoder service with your location to geocode */
            geocoder.geocode({ 'address':address }, evtcallback );
        }
    </script>
    <script async defer src="//maps.google.com/maps/api/js?key=AIzaSyCPcYEm8YAwDh0hCBrvmZj6LbmUA3bwvKo&callback=myMap"></script>
    <style type="text/css">
        #map {
            width: 100%;
            height: 80vh;
            margin-top: 10px;
        }
    </style>
    </head>
<body>
    <div id="map"></div>
</body>
</html>