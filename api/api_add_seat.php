<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $seat = $_POST['seat'];
        
        $res = $config->insert_seat($seat);

        if($res) {
            $arr['data'] = "Seat inserted successfully...";
            http_response_code(201);
        } else {
            $arr['data'] = "Seat insertion failed...";
        }

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);
