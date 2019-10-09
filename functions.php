<?php

function getRouteSegmentsFromUri($uri) {
    return array_slice( explode('/', $uri), 0, 2);
}

function removeRouteSegments($uriArgs) {
    array_shift($uriArgs);
    array_shift($uriArgs);
    return $uriArgs;
}
