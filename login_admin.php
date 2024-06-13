<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

$db = mysqli_connect("localhost", "root", "", "ukk_amri");

$NIP = $_POST["NIP"];
    $password = $_POST["password"];

    $sql=("SELECT * FROM login_admin WHERE 
            NIP = '".$NIP."' AND password = '".$password."'");
    $result = mysqli_query($db, $sql);

    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        echo json_encode("Success");
        } else {
            echo json_encode("Error");
        }
?>