<?php

// Pull in configuration
include_once("config.php");

// Which file to process?
if(!empty($argv[1]) and is_file($argv[1])){
    // The user has supplied a valid filename
    $importFilename = $argv[1];
} else {
    // Tell them about their mistake
    die("Invalid input file provided.");
}

// Set the export file name and use a default if none is supplied by the user
$outputFilename = (!empty($argv[2]) ? $argv[2] : "export.json");

// Load the input file
$rawData = file_get_contents($importFilename);

// Parse each line of data and associate titles with values
// This is what makes this difficult: Different headings for each sleep recording
$rawData = explode("\n", $rawData);

// For each recording, there are three lines stored
// Line 1: Headings and definitions of the values
// Line 2: Sleep events
// Line 3: currently unknown
// Parse out slices of three lines to work with
$currentSlice = [];
$slicedData = [];
foreach($rawData as $key => $value){
    // Parse the csv of each line directly
    // Also strip irritating quotation marks from the lines
    $currentSlice[] = explode(",", str_replace('"', "", $value));
    // Three lines per slice
    if(count($currentSlice) === 3){
        // Save the slice
        $slicedData[] = $currentSlice;
        // Reset the current slice to start over
        $currentSlice = [];
    }
}

// Prepare the final parsing
$parsedData = [];

// Associate the corresponding lines of a slice
foreach($slicedData as $slice){
    $data = [];
    $titles = $slice[0];
    foreach($titles as $titleKey => $title){
        // We're dealing with one of the direct values, just save them
        if(in_array($title, ONE_VALUE_COLUMNS)){
            $data[$title] = $slice[1][$titleKey];
        } elseif($title === "Event") {
            // Handle things differently as we have an event with more data
            // TODO
            $data["events"][] = $slice[1][$titleKey];
        } else {
            // Working with sensor readings from a given time
            $data["readings"][$title] = [
                $slice[1][$titleKey],
                $slice[2][$titleKey]
            ];
        }
    }

    // Add the parsed data of the slice to the final result
    $parsedData[] = $data;
}

// Reverse the array if the user requested to do to
if(ASCENDING_ORDER){
    $parsedData = array_reverse($parsedData);
}

// Write result to a file
echo "Writing to ".$outputFilename."\n";
file_put_contents($outputFilename, json_encode($parsedData, JSON_PRETTY_PRINT));

?>