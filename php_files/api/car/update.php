<?php

// This does not work correctly
// Bug fixes needed
// TODO: Fix this

    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

    include_once '../../config/Database.php';
    include_once '../../models/Car.php';

// Instantiate DB & connect
    $database = new Database();
    $db = $database->dbConnection();

// Instantiate car object
    $car = new Car($db);

    $data = json_decode(file_get_contents("php://input"));

    $car->id = $data->id;

extracted($data, $car);

if($car->updateCar()) {
    echo json_encode(
        array('message' => 'Car Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Car Not Updated')
    );
}