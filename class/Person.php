<?php

abstract class Person
{
    protected  $dni;
    protected $name;
    protected $phone;
    protected $conn;

    abstract public function create();

    public function __construct($dni, $name, $phone, $conn)
    {
        $this->dni = $dni;
        $this->name = $name;
        $this->phone = $phone;
        $this->conn = $conn;
    }

    public function createPerson()
    {
        $sql__insert_employe = "INSERT INTO persons (dni, name, phone) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql__insert_employe);
        $stmt->bind_param('sss', $this->dni, $this->name, $this->phone);

        $stmt->execute();
    }
}
