<?php

class User
{
    private $conn;
    private $table = 'users';

    // User Properties
    public $email;
    public $fullname;
    public $status;

    // Constructor with DB
    /**
     * @var string
     */
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Register User
    public function addUser() {
        // Create Query
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, password = md5(:password), fullname = :fullname, status = 1';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean Data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Bind Data
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':status', $this->status);     

        // Execute Query
        if($stmt->execute()) {
            return true;
        }

        // Print Error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}