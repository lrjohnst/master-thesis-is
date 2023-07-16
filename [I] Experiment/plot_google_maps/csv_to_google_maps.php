<?php

function snapToRoads($points) {
    $base_url = "https://roads.googleapis.com/v1/snapToRoads";
    $params = array(
        "path" => implode("|", $points),
        "interpolate" => "true",
        "key" => ""  // Replace with your own Google API key
    );
    $url = $base_url . "?" . http_build_query($params);

    $response = file_get_contents($url);

    $data = json_decode($response, true);

    if (isset($data["snappedPoints"])) {
        return array_column($data["snappedPoints"], "location");
    } else {
        return array();
    }
}

// Read CSV file
$data = array_map("str_getcsv", file("input.csv"));

// Extract latitude and longitude columns
$latitudes = array_column($data, 0);
$longitudes = array_column($data, 1);

// Prepare points for snap-to-road API
$points = array();
foreach ($latitudes as $index => $latitude) {
    $longitude = $longitudes[$index];
    $points[] = "$latitude,$longitude";
}

// Call the snap-to-road API
$snapped_points = snapToRoads($points);

// Create a map centered on the first coordinate
$map_center = $snapped_points[0];
$map_html = "<html>
<head>
    <script src='https://maps.googleapis.com/maps/api/js?key='></script>
    <style>
        #map {
            height: 100%;
        }
    </style>
</head>
<body>
    <div id='map'></div>
    <script>
        function initMap() {
            var mapCenter = { lat: {$map_center["latitude"]}, lng: {$map_center["longitude"]} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: mapCenter
            });
";

// Create an array of LatLng objects for the snapped points
$snappedLatLngs = [];
foreach ($snapped_points as $point) {
    $latitude = $point["latitude"];
    $longitude = $point["longitude"];
    $snappedLatLngs[] = "{ lat: $latitude, lng: $longitude }";
}

// Create a Polyline using the snapped LatLng objects
$map_html .= "
            var polyline = new google.maps.Polyline({
                path: [" . implode(",", $snappedLatLngs) . "],
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 4
            });

            polyline.setMap(map);
";



// Read the CSV file with marker data
$marker_csv_file = 'markers.csv';

if (($handle = fopen($marker_csv_file, "r")) !== false) {
    // Skip the header row
    fgetcsv($handle);

    // Loop through the CSV data and create markers
    while (($data = fgetcsv($handle)) !== false) {
        $lat = $data[0];
        $lon = $data[1];
        $text = $data[2];

        // Output JavaScript code to create a marker with a text balloon
        $map_html .= "
            var marker = new google.maps.Marker({
                position: { lat: $lat, lng: $lon },
                map: map
            });

            var infoWindow = new google.maps.InfoWindow({
                content: '$text'
            });

            infoWindow.open(map, marker);
        ";
    }

    fclose($handle);
}




$map_html .= "
        }
        initMap();
    </script>
</body>
</html>";

// Save the map to an HTML file
file_put_contents("map.html", $map_html);

?>
