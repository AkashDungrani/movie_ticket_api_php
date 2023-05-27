<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $language = $_POST['language'];
        
        $res = $config->insert_language($language);

        if($res) {
            $arr['data'] = "Language inserted successfully...";
            http_response_code(201);
        } else {
            $arr['data'] = "Language insertion failed...";
        }

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);
