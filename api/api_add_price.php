<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $price = $_POST['price'];
        
        $res = $config->insert_price($price);

        if($res) {
            $arr['data'] = "Price inserted successfully...";
            http_response_code(201);
        } else {
            $arr['data'] = "Price insertion failed...";
        }

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);
