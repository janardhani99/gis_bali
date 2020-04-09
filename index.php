<!DOCTYPE html>
<html>
<head>
	<title>Tugas GIS</title>

	<style> html, body, #map { height: 100%; width: 100%; padding: 0; margin: 0; } </style>
	<!-- Leaflet (JS/CSS) -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
	<!-- Leaflet-KMZ -->
	<script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
</head>

<body>
	<h2>Batas Wilayah Kabupaten di Bali</h2>
	<div id="map"></div>
	<script type="text/javascript">
	
		var map = L.map('map').setView([-8.655924, 115.216934], 13);

  		var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    	maxZoom: 12,
    	attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a 	href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
   	 	opacity: 0.90
  		});
  		OpenTopoMap.addTo(map);

            // var map = L.map('map').setView([-8.655924, 115.216934], 13);
    //   L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    //             attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //             maxZoom: 20,
    //             id: 'mapbox/streets-v11',
    //             tileSize: 512,
    //             zoomOffset: -1,
    //             accessToken: 'pk.eyJ1Ijoid2lkaWFuYXB3IiwiYSI6ImNrNm95c2pydjFnbWczbHBibGNtMDNoZzMifQ.kHoE5-gMwNgEDCrJQ3fqkQ'
    //         }).addTo(map);

 	// Instantiate KMZ parser (async)
  		var kmzParser = new L.KMZParser({
    		onKMZLoaded: function(layer, name) {
      		control.addOverlay(layer, name);
      		layer.addTo(map);
    		}
 		 	});
  	// Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
  		kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/regions.kmz');
  		kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/capitals.kmz');
  		kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');
      kmzParser.load('kabupaten-bali.kmz');

  		var control = L.control.layers(null, null, { collapsed:false }).addTo(map);

	</script>
</body>


</html>
