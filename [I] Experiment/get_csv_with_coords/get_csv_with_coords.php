<?php

$sourceFolder = 'source';
$targetFolder = 'target';

// Open the folder
$directory = opendir($sourceFolder);

// Loop through all the files in the folder
while (($file = readdir($directory)) !== false) {
    // Exclude . and .. directories
    if ($file != "." && $file != "..") {
        write_target_files($file, $sourceFolder, $targetFolder);
    }
}

// Close the directory handle
closedir($directory);


function write_target_files($filename, $sourceFolder, $targetFolder) {

    $filename_prefix = substr($filename, 0, -4);

    // Read the XML content from a file
    $xml_file = $sourceFolder . "/" . $filename;
    $xml = simplexml_load_file($xml_file);

    $markers_filename = $targetFolder . "/" . $filename_prefix . " markers.csv";
    $markers_csv = fopen($markers_filename, "w");
//    fputcsv($markers_csv, array("lat", "lon", "text", "speed"));

    // Find the LineString coordinates
    foreach($coordinates = $xml->Document->Placemark as $placemark) {
        if($placemark->LineString) {
            $coordinates = $placemark->LineString->coordinates;
        } else {
            $columns = explode(',', $placemark->Point->coordinates);
            fputcsv($markers_csv, array($columns[1], $columns[0], $placemark->name, $columns[2]));
        }
    }

    // Close the CSV file
    fclose($markers_csv);

    // Explode the coordinates string to get individual points
    $points = explode("\n", trim($coordinates));

    // Prepare the original CSV file
    $filename_original = $targetFolder . "/" . $filename_prefix . " original.csv";
    $original_csv_file = fopen($filename_original, "w");
//    fputcsv($original_csv_file, array("lat", "lon", "speed"));

    // Prepare the compacted CSV file
    $filename_compacted = $targetFolder . "/" . $filename_prefix . " compacted.csv";
    $compacted_csv_file = fopen($filename_compacted, "w");
//    fputcsv($compacted_csv_file, array("lat", "lon", "speed"));

    // Loop through each point and extract lat, lon, and speed
    $original_data = array();

    foreach ($points as $point) {
        // Remove leading/trailing whitespaces and split the string by comma
        $point_data = explode(",", trim($point));

        // Extract latitude, longitude, and speed
        $lat = $point_data[1];
        $lon = $point_data[0];
        $speed = $point_data[2];

        // Write to original CSV file
        fputcsv($original_csv_file, array($lat, $lon, $speed));

        // Store the point in the original data array
        $original_data[] = array($lat, $lon, $speed);
    }

//    print_r($original_data);

    // Determine the number of original data points
    $num_original_points = count($original_data);

    // Compact the data to 95 measurements
    $compacted_data = array();
    if ($num_original_points > 95) {
        $spacing = $num_original_points / 95;
        for ($i = 0; $i < $num_original_points; $i += $spacing) {
//            echo "i= " . $i . "\n\n";
            $compacted_data[] = $original_data[floor($i)];
        }
    } else {
        $compacted_data = $original_data;
    }

    // Write the compacted data to the compacted CSV file
    foreach ($compacted_data as $data) {
        fputcsv($compacted_csv_file, $data);
    }

    // Close the CSV files
    fclose($original_csv_file);
    fclose($compacted_csv_file);

    echo "CSV files generated successfully.";


    plot_to_map($targetFolder . "/" . $filename_prefix, $filename_compacted, $markers_filename);

}

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



function plot_to_map($filename_target, $filename_compacted, $markers_filename) {

    // Read CSV file
    $data = array_map("str_getcsv", file($filename_compacted));

    // Extract latitude and longitude columns
    $latitudes = array_column($data, 0);
    $longitudes = array_column($data, 1);

    // Prepare points for snap-to-road API
    $points = array();
    foreach ($latitudes as $index => $latitude) {
        $longitude = $longitudes[$index];
        $points[] = "$latitude,$longitude";
    }

//    print_r($points);
//    die;

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
    $marker_csv_file = $markers_filename;

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
    file_put_contents($filename_target . "map.html", $map_html);

}


?>
