<?php

require 'functions.php';
error_reporting(E_ALL);
ini_set('display_errors', true);

$firstTwoSegs = getRouteSegmentsFromUri($_GET['route']);

$uriArgs = removeRouteSegments(explode('/', $_GET['route']));



if (count($firstTwoSegs) > 1) {
    $activeController = ucfirst($firstTwoSegs[0]) . 'Controller';

    $activeMethod = $firstTwoSegs[1];


    $path = __DIR__ . '/controllers/' . $activeController . '.php';
    require $path;

    $controllerObj = new $activeController;
    $controllerObj->$activeMethod($uriArgs);
}