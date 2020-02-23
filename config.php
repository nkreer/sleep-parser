<?php

// Configuration for the parser

// Ignore certain events in the export
define("IGNORE_EVENTS", [
    "DHA"
]);

// Newest recordings are saved last
define("ASCENDING_ORDER", true);


// Convert timestamps into unix time while converting?
define("ENABLE_TIMESTAMP_CONVERSION", true);
// If true, for which fields?
define("TIMESTAMP_CONVERSION_FIELDS", [
    "From",
    "To",
    "Sched"
]);
// Format of the strings to convert?
// The default here is how dates are expressed by SaA when the timezone is Europe/Berlin
define("TIME_STRING_FORMAT", "d. m. Y H:i");
// Retain a human-readble version of the time?
define("RETAIN_HUMAN_READABLE_TIME", true);
// Human readble time format
define("HUMAN_READABLE_TIME_FORMAT", DATE_ATOM);

// -- TECHNICAL --
// Normally, there is no need to change these options

// Which columns only have one value?
define("ONE_VALUE_COLUMNS", [
    "Id",
    "Tz",
    "From",
    "To",
    "Sched",
    "Hours",
    "Rating",
    "Comment",
    "Framerate",
    "Snore",
    "Noise",
    "Cycles",
    "DeepSleep",
    "LenAdjust",
    "Geo"
]);

?>