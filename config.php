<?php

// Configuration for the parser

// Ignore certain events in the export
define("IGNORE_EVENTS", [
    "DHA"
]);

// Newest recordings are saved last
define("ASCENDING_ORDER", true);

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