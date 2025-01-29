<?php
include 'connection.php';
class Person
{
    protected  $dni;
    protected $name;
    protected $phone;

    protected function __construct($dni, $name, $phone, $conn)
    {
        $this->dni = $dni;
        $this->name = $name;
        $this->phone = $phone;

        $sql__insert_employe = "INSERT INTO persons (dni, name, phone) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql__insert_employe);
        $stmt->bind_param('ssss', $dni, $name, $phone);

        $stmt->execute();

        echo "tecnico creado correctamente";
    }
}
