<?php
include 'connection.php';
class janitors extends Person
{
    public $category;
    public function __construct($dni, $name, $phone, $category, $conn)
    {
        parent::__construct($dni, $name, $phone);
        $this->$category;

        $dni = $_REQUEST['dni'] ?? '';
        $name = $_REQUEST['name'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $months = $_REQUEST['months'] ?? '';

        $sql__insert_employe = "INSERT INTO conserjes (dni, nombre, phone category) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql__insert_employe);
        $stmt->bind_param('sssss', $dni, $name, $phone, $months, $category);

        $stmt->execute();

        echo "tecnico creado correctamente";
    }
}
