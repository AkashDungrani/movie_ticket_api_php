<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $type = $_POST['type'];
        
        $res = $config->insert_viewtype($type);

        if($res) {
            $arr['data'] = "Category inserted successfully...";
            http_response_code(201);
        } else {
            $arr['data'] = "Category insertion failed...";
        }

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);
