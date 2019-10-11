<?php

require 'functions.php';
error_reporting(E_ALL);
ini_set('display_errors', true);

$requestUri = !empty($_GET['route']) ? $_GET['route'] : ltrim($_SERVER["REQUEST_URI"], '/');
$firstTwoSegs = getRouteSegmentsFromUri($requestUri);

$uriArgs = removeRouteSegments(explode('/', $requestUri));




if (count($firstTwoSegs) > 1) {
    $activeController = ucfirst($firstTwoSegs[0]) . 'Controller';
    $second_seg = explode('?', $firstTwoSegs[1]);
    $activeMethod = array_shift($second_seg);
    $path = __DIR__ . '/controllers/' . $activeController . '.php';
    require_once $path;

    $controllerObj = new $activeController;
    $controllerObj->$activeMethod($uriArgs);
}