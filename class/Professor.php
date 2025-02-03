<?php

include_once 'Person.php';

class Professor extends Person
{
    public $trienniums;

    public function __construct($dni, $name, $phone, $trienniums, $conn)
    {
        parent::__construct($dni, $name, $phone, $conn);

        $this->trienniums = $trienniums;
    }

    public function create()
    {
        $this->createPerson();

        $sql__insert_employe = "INSERT INTO teachers (dni, trienniums) VALUES (?, ?)";

        $stmt = $this->conn->prepare($sql__insert_employe);
        $stmt->bind_param('ss', $this->dni, $this->trienniums);

        $stmt->execute();
    }
}
