<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    header('Access-Control-Allow-Methods: GET');
    header('Content-Type: application/json');

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $res = $config->fetch_all_movie();

        $allmovie = [];

        while($record = mysqli_fetch_assoc($res)) {
            // array_push(array_name, element);
            array_push($allmovie, $record);
        }

        $arr['data'] = $allmovie;

    } else {
        $arr['data'] = 'Only GET method is allowed...'; 
    }

    echo json_encode($arr);
