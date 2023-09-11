<?php
/**
 * @var $data []
 * @var $defaultLocation []
 */
$locations = json_encode($data);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Leaflet Map Example</title>
    <style>
        #map {
            height: 80vh;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
<h1>Joylashuvlarni ko'rish</h1>

<div id="map"></div>

<script src="/js/map.js"></script>
<script>
    var map = L.map('map').setView([41.0059344, 71.6397762], 11);
    var locations = <?php echo $locations;?>;
    for (var i = 0; i < locations.length; i++) {
        marker = new L.marker([locations[i].lat, locations[i].lon])
            .addTo(map);

        marker.bindPopup(locations[i].fullname);
        marker.on('mouseover', function () {
            this.openPopup();
        });

        marker.on('mouseout', function () {
            this.closePopup();
        });
    }

    // console.log(locations);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        zoom: 15,
    }).addTo(map);


    var customIcon = L.icon({
        iconUrl: '/sites/marker-icon.png',
        iconSize: [50, 50], // Set the width and height of the icon
        iconAnchor: [50, 50] // Set the anchor point of the icon
    });


</script>
</body>
</html>

