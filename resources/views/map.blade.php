<!-- resources/views/map.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>View Locations</title>
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
            var map = L.map('map').setView([10.627298715385743, 103.54863166809083], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            @foreach($locations as $location)
            L.marker([{{ $location->latitude }}, {{ $location->longitude }}]).addTo(map)
                .bindPopup("{{ $location->name }}")
                .openPopup();
            @endforeach
        }
    </script>
</head>
<body onload="initMap()" style="font-family: Kantumruy Pro">
    <div class="container">
    <a class="btn btn-success mt-4" href="{{ route('pin.location') }}">កំណត់ទីតាំងថ្មី</a>
    
    <div class="mb-4"></div>
        
            
            <table class="table mb-4">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ឈ្មោះទីតាំង</th>
                    <th>រយៈទទឹង</th>
                    <th>រយៈបណ្តោយ</th>
                    <th>ចូលមើល</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($locations as $index => $location)
                  <tr>
                    <td >{{ ($locations->currentPage() - 1) * $locations->perPage() + $loop->index + 1 }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->latitude }}</td>
                    <td>{{ $location->longitude }}</td>
                    <td><a class="btn btn-primary" href="{{ route('locations.show', $location->id) }}">បង្ហាញ</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- <div class="my-6 p-6">
                {{ $locations->links() }}
            </div> --}}

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                {{ $locations->links('pagination::bootstrap-4') }}
            </nav>
            
         
      <div class="mt-4" id="map"></div>
      <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
