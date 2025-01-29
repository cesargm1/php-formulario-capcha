<?php

include 'connection.php';
class Tecnician extends Person
{
    public $months;

    public function __construct($dni, $name, $phone, $months, $conn)
    {
        parent::__construct($dni, $name, $phone);
        $this->$months;

        $dni = $_REQUEST['dni'] ?? '';
        $name = $_REQUEST['name'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $months = $_REQUEST['months'] ?? '';

        $sql__insert_employe = "INSERT INTO company (dni, name, phone, months) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql__insert_employe);
        $stmt->bind_param('sss', $dni, $name, $phone, $months);

        $stmt->execute();

        echo "tecnico creado correctamente";
    }
}
