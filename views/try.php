<!DOCTYPE html>
<html>
<head>
  <title>Tracking GPS Pengemudi</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <style>
    #mapid { height: 500px; width: 100%; }
  </style>
</head>
<body>
  <h1>Tracking GPS Pengemudi</h1>
  <div id="mapid"></div>

  <script>
    // Inisialisasi peta
    var map = L.map('mapid').setView([0, 0], 13); // Set view awal

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    // Fungsi untuk memperbarui lokasi
    function updateLocation(position) {
      var lat = position.coords.latitude;
      var lon = position.coords.longitude;

      if (!marker) {
        marker = L.marker([lat, lon]).addTo(map);
      } else {
        marker.setLatLng([lat, lon]);
      }

      map.setView([lat, lon], 13);

      // Mengirim lokasi ke server
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "/update-location", true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(JSON.stringify({
        latitude: lat,
        longitude: lon
      }));
    }

    // Mengambil lokasi pengemudi
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(updateLocation, function(error) {
        console.error("Error obtaining location: " + error.message);
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  </script>
</body>
</html>
