<?php

include_once 'Person.php';

class Tecnician extends Person
{
    public $months;

    public function __construct($dni, $name, $phone, $months, $conn)
    {
        parent::__construct($dni, $name, $phone, $conn);

        $this->months = $months;
    }

    public function create()
    {
        $this->createPerson();

        $sql__insert_employe = "INSERT INTO technicians (dni,months) VALUES (?,?)";

        $stmt = $this->conn->prepare($sql__insert_employe);
        $stmt->bind_param('ss', $this->dni, $this->months);

        $stmt->execute();
    }
}
