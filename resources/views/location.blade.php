<!-- resources/views/location.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>{{ $location->name }}</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <script>
        function initMap() {
            var map = L.map('map').setView([{{ $location->latitude }}, {{ $location->longitude }}], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            L.marker([{{ $location->latitude }}, {{ $location->longitude }}]).addTo(map)
                .bindPopup("{{ $location->name }}")
                .openPopup();
        }
    </script>
</head>
<body onload="initMap()" style="font-family: Kantumruy Pro">
    <div class="container">
        <h1 class="mt-4 mb-2">{{ $location->name }}</h1>
    <div id="map" class="mb-2"></div>
    <p>Latitude: {{ $location->latitude }}</p>
    <p>Longitude: {{ $location->longitude }}</p>

        <a href="{{ route('map.index') }}" class="btn btn-danger">ចាកចេញ</a>
    </div>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
    