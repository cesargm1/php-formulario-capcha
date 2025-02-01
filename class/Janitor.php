<?php

include_once 'Person.php';

class Janitor extends Person
{
    public $category;

    public function __construct($dni, $name, $phone, $category, $conn)
    {
        parent::__construct($dni, $name, $phone, $conn);

        $this->category = $category;
    }

    public function create()
    {
        $this->createPerson();

        $sql__insert_employe = "INSERT INTO janitors (dni, category) VALUES (?, ?)";

        $stmt = $this->conn->prepare($sql__insert_employe);
        $stmt->bind_param('ss', $this->dni, $this->category);

        $stmt->execute();
    }
}
