<?php

// Configuration for the parser

// Should the utility include noise events in the export?
define("INCLUDE_NOISE_EVENTS", false);

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