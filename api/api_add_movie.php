<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    $arr = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $ind_id= $_POST['ind_id'];
        $lang_id = $_POST['lang_id'];
        $view_id = $_POST['view_id'];
    $seat_id = $_POST['seat_id'];
    $price_id = $_POST['price_id'];     // a.array


        if($isFileUpload) {
            $res = $config->insert_movie($name, $ind_id, $lang_id, $view_id,$seat_id,$price_id);

            if($res) {
                $arr['data'] = "Movie inserted successfully...";
                http_response_code(201);
            } else {
                $arr['data'] = "Movie insertion failed...";
            }
        } else {
            $arr['data'] = "Movie insertion failed...";
        }        

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);
