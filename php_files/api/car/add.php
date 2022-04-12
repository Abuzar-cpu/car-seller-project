<?php

// Headers
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->dbConnection();

// Instantiate car object
$car = new Car($db);

$data = json_decode(file_get_contents("php://input"));

$car->brand = $data->brand;
$car->model = $data->model;
$car->year = $data->year;
$car->color = $data->color;
$car->ban_model = $data->ban_model;
$car->engine_volume = $data->engine_volume;
$car->engine_power = $data->engine_power;
$car->fuel_type = $data->fuel_type;
$car->price = $data->price;


if ($car->insertCar()) {
    echo json_encode(
        array('message' => 'Car added')
    );
} else {
    echo json_encode(
        array('message' => 'Car not added')
    );
}