<?php

class Car
{
    private $conn;
    private $table = 'cars';

    // Car properties
    public $id;
    public $newOrUsed;
    public $mileage;
    public $gearbox;
    public $make;
    public $doors;
    public $numberOfSeats;
    public $brand;
    public $model;
    public $year;
    public $price;
    public $ban_model;
    public $color;
    public $engine_volume;
    public $engine_power;
    public $fuel_type;
    public $status;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Cars
    public function getCars()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE status=1 ORDER BY id DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function getSingleCar() {
        // Create Query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=:id AND status=1';

        // Prepare Statement
        $stmt = $this->prepareStatement($query);

        // Execute query
        if($stmt->execute([':id' => $this->id])) {
            if($stmt->rowCount() > 0) {
                return $stmt;
            }
        }
        return false;
    }

    public function insertCar()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET brand=:brand, model=:model, year=:year, price=:price, ban_model=:ban_model, color=:color, engine_volume=:engine_volume, engine_power=:engine_power, fuel_type=:fuel_type';

        // Prepare statement
        $stmt = $this->prepareStatement($query);
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Execute query
        if ($this->brand && $this->model && $this->year && $this->price && $this->ban_model && $this->color && $this->engine_volume && $this->engine_power && $this->fuel_type) {
            // Execute takes array as argument and places the values into the query
            if ($stmt->execute([':brand' => $this->brand, ':model' => $this->model, ':year' => $this->year, ':price' => $this->price, ':ban_model' => $this->ban_model, ':color' => $this->color, ':engine_volume' => $this->engine_volume, ':engine_power' => $this->engine_power, ':fuel_type' => $this->fuel_type])) {
                return true;
            }
            // Print error if something goes wrong
            printf("Error: Fields not filled");
            return false;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function deleteCar()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . ' SET status=0 WHERE id=:id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if (!$this->id) {
            return false;
        }
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function updateCar()
    {
        // Create Query
        $query = 'UPDATE ' . $this->table . ' SET brand=:brand, model=:model, year=:year, price=:price, ban_model=:ban_model, color=:color, engine_volume=:engine_volume, engine_power=:engine_power, fuel_type=:fuel_type WHERE id=:id';

        // Prepare statement
        $stmt = $this->prepareStatement($query);
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Execute query
        if ($stmt->execute([":id" => $this->id, ":brand" => $this->brand, ":model" => $this->model, ":year" => $this->year, ":price" => $this->price, ":ban_model" => $this->ban_model, ":color" => $this->color, ":engine_volume" => $this->engine_volume, ":engine_power" => $this->engine_power, ":fuel_type" => $this->fuel_type])) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: Fields not filled");
        return false;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function prepareStatement($query)
    {
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->brand = htmlspecialchars(strip_tags($this->brand));
        $this->model = htmlspecialchars(strip_tags($this->model));
        $this->year = htmlspecialchars(strip_tags($this->year));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->ban_model = htmlspecialchars(strip_tags($this->ban_model));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->engine_volume = htmlspecialchars(strip_tags($this->engine_volume));
        $this->engine_power = htmlspecialchars(strip_tags($this->engine_power));
        $this->fuel_type = htmlspecialchars(strip_tags($this->fuel_type));
        return $stmt;
    }
}