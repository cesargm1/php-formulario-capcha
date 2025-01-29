<?php
include 'connection.php';
class Professor extends Person
{
    public $trienios;
    public function __construct($dni, $name, $phone, $trienios, $conn)
    {

        parent::__construct($dni, $name, $phone);
        $this->$trienios;

        $dni = $_REQUEST['dni'] ?? '';
        $name = $_REQUEST['name'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $months = $_REQUEST['months'] ?? '';
        $trienios = $_REQUEST['trienios'] ?? '';

        $sql__insert_employe = "INSERT INTO profesores (dni, nombre, telefono, trienios) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql__insert_employe);
        $stmt->bind_param('ssss', $dni, $name, $phone, $trienios);

        $stmt->execute();

        echo "Empresa creada correctamente";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button><a href="index.html">>volver al formulario</a>
</body>

</html>