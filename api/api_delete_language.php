<?php

header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include('../config/config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents('php://input');

    parse_str($input, $_DELETE);

    $res = $config->delete_language($_DELETE['id']);

    if ($res == 1) {
        $arr['data'] = 'Language deleted successfully...';
    } else {
        $arr['data'] = 'Language deletion failed...';
    }
} else {
    $arr['data'] = 'Only DELETE method is allowed...';
}

echo json_encode($arr);
