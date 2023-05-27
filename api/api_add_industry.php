<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $ind_name = $_POST['industry_name'];
        
        $res = $config->insert_industry($ind_name);

        if($res) {
            $arr['data'] = "Industry inserted successfully...";
            http_response_code(201);
        } else {
            $arr['data'] = "Industry insertion failed...";
        }

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);
