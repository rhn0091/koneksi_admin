<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

$db = mysqli_connect("localhost", "root", "", "ukk_amri");

$NIS = $_POST["NIS"];
    $password = $_POST["password"];

    $sql=("SELECT * FROM login WHERE 
            NIS = '".$NIS."' AND password = '".$password."'");
    $result = mysqli_query($db, $sql);

    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        echo json_encode("Success");
        } else {
            echo json_encode("Error");
        }
?>