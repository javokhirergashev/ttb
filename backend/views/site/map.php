<!DOCTYPE html>
<html>
<head>
    <title>Leaflet Map Example</title>
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>
<body>
<h1>Leaflet Map Example</h1>

<div id="map"></div>

<script src="/js/map.js"></script>
<script>
   var map = L.map('map').setView([41.2972855, 69.2262816], 13);
   var locations = <?php echo $locations; ?>;
   // console.log(locations);
   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18
   }).addTo(map);


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
   var customIcon = L.icon({
      iconUrl: '/sites/marker-icon.png',
      iconSize: [50, 50], // Set the width and height of the icon
      iconAnchor: [50, 50] // Set the anchor point of the icon
   });


</script>
</body>
</html>

