<?php

header('content-type: application/json;');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

$method = $_SERVER['REQUEST_METHOD'];

$imgDir = "images/";
$images = scandir($imgDir);

$imagesList = [];
$imageTypes = ['jpg', 'jpeg'];

foreach ($images as $image) {

    $path = $imgDir . $image;

    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    if (in_array($ext, $imageTypes)) {
        $imagesList[] = $path;
    }
}

echo json_encode([
    'images' => $imagesList,
]);
