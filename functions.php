<?php
function __autoload($class){
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require_once __DIR__.DIRECTORY_SEPARATOR.$class.'.php';
}

function getDbDriver(){
    return new PdoDb();
}

function getRouteSegmentsFromUri($uri) {
    return array_slice( explode('/', $uri), 0, 2);
}

function removeRouteSegments($uriArgs) {
    array_shift($uriArgs);
    array_shift($uriArgs);
    return $uriArgs;
}
