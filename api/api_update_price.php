<?php

header('Access-Control-Allow-Methods: PUT, PATCH');
header('Content-Type: application/json');

include('../config/config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    parse_str(file_get_contents('php://input'), $_UPDATE);

    $res = $config->update_price($_UPDATE['price'], $_UPDATE['id']);

    if ($res == 1) {
        $arr['data'] = 'Price updated successfully...';
    } else {
        $arr['data'] = 'Price updation failed...';
    }
} else {
    $arr['data'] = 'Only PUT or PATCH request methods are allowed...';
}

echo json_encode($arr);
