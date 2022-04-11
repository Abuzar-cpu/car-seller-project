<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Car.php';

$database = new Database();
$db = $database->dbConnection();

$category = new Car($db);
$result = $category->getCars();

$num = $result->rowCount();

if($num) {
    // Car array
    $cars_arr = array();
    $cars_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $cars_item = array(
            'id' => $id,
            'brand' => $brand,
            'price' => $price,
            'model' => $model,
            'year' => $year,
            'ban_model' => $ban_model,
            'color' => $color,
            'engine_volume' => $engine_volume,
            'engine_power' => $engine_power,
            'fuel' => $fuel_type
        );
        // Push to "data"
        $cars_arr['data'][] = $cars_item;
    }
    echo json_encode($cars_arr);
} else {
    // No cars
    echo json_encode(
        array('message' => 'No cars found')
    );
}