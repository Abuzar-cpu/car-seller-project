<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Car.php';

$database = new Database();
$db = $database->dbConnection();

$car = new Car($db);
$data = json_decode(file_get_contents("php://input"));
$car->id = $data->id;

$result = $car->getSingleCar();
echo $result -> color;
//echo json_encode($result);
if ($result) {
    $result = $result -> fetch_assoc();
    $car_arr = array(
        "id" => $result['id'],
        "brand" => $result['brand'],
        "model" => $result['model'],
        "year" => $result['year'],
        "color" => $result['color'],
        "price" => $result['price'],
    );
    http_response_code(200);
    echo json_encode($car_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Car does not exist."));
}