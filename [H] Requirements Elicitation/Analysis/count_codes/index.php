<?php

//$codes = [['code1', 'code2', 'code3'], ['code4', 'code5', 'code6', 'code6'], ['code6', 'code7', 'code8'], ['code1', 'code1']];


// Read the CSV file
$csvFile = 'Codes nav_distraction_1-5 (B) Streaming.csv';
$csvData = file_get_contents($csvFile);

// Parse the CSV data
$rows = explode(PHP_EOL, $csvData);
$codes = [];
foreach ($rows as $row) {
    $columns = str_getcsv($row);
    $codes[] = $columns;
}

// Remove any empty rows or columns
$codes = array_filter($codes);
$codes = array_map('array_filter', $codes);
$results = count_unique_codes(transpose($codes));


$csv = "";
$i = 1;
foreach($results as $column) {
    $csv .= "codes$i,counts$i\n";
    foreach($column as $code => $count) {
        $csv .= $code . "," . $count . "\n";
    }
    $i++;
}


// The string you want to write to the text file
$stringToWrite = $csv;

// The path to the text file
$filePath = "Codes nav_distraction_1-5 (B) Streaming Counts.csv";

// Open the file in write mode (creates a new file if it doesn't exist)
$fileHandle = fopen($filePath, "w");

// Write the string to the file
fwrite($fileHandle, $stringToWrite);

// Close the file handle
fclose($fileHandle);

echo "String written to the file successfully.";


function transpose($matrix) { // Deze functie zorgt dat kolomkoppen indexen worden voor getransponeerde CSV
    $t = [];
    $i = 0;
    foreach ($matrix as $row) {
        foreach ($row as $key => $value) {
            $t[$key][$i] = $value;
        }
        $i++;
    }
    return $t;
}
function transpose_back($matrix) { // Deze functie transponeert matrixen weer terug, na transponering door transpose()
    $t = [];
    foreach($matrix as $key => $column) {
        $i = 0;
        foreach($column as $value) {
            $t[$i][$key] = $value;
            $i++;
        }
    }
    return $t;
}


function count_unique_codes($codes) {
    $counts = [];

    // Get totals for each code per column
    foreach($codes as $column) {
        $column_counts = [];

        foreach($column as $code) {
            if (!isset($column_counts[$code])) {
                $column_counts[$code] = 0;
            }
            $column_counts[$code] = $column_counts[$code] + 1;

        }
        $counts[] = $column_counts;

    }

    // Now get a total count of each code to put into a new column
    foreach($counts as $column) {

        foreach($column as $code => $count) {

            if (!isset($totals[$code])) {
                $totals[$code] = 0;
            }
            $totals[$code] = $totals[$code] + $count;
        }

    }
    array_push($counts, $totals);

    return $counts;
}
