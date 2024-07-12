<!-- resources/views/pin_location.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Pin Location</title>
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
</head>
<body style="font-family: Kantumruy Pro">
    <br>
    <div class="container ">
        <form class="row gap-2" action="{{ route('locations.store') }}" method="POST">
            @csrf
            
            <input class="form-control col" type="text" name="name" placeholder="កំណត់ឈ្មោះទីតាំង" required>
            <input class="form-control col" type="text" id="latitude" name="latitude">
            <input class="form-control col" type="text" id="longitude" name="longitude">
            <button class="btn btn-success col-1" type="submit">រក្សាទុក</button>
            <a href="{{ route('map.index') }}" class="btn btn-danger col-1">ចាកចេញ</a>
        </form>
    </div>
    <br>
    <div class="mb-4" id="map"></div>
    

    <script>
        var map = L.map('map').setView([10.627298715385743, 103.54863166809083], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker;

        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
