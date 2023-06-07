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
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([41.2972855, 69.2262816],15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);
</script>
</body>
</html>

