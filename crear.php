<?php

include_once 'class/Connection.php';
include_once 'class/Janitor.php';
include_once 'class/Professor.php';
include_once 'class/Departaments.php';
include_once 'class/Tecnician.php';

// capcha
session_start();

// Obtener el valor del CAPTCHA desde la sesión
$codeVerify = isset($_SESSION['code_verify']) ? $_SESSION['code_verify'] : '';

// Obtener el valor ingresado por el usuario
$capcha = isset($_POST['capcha']) ? $_POST['capcha'] : '';

// Verificar si el campo CAPTCHA está vacío
if ($capcha == '') {
    echo 'Por favor, ingresa el código CAPTCHA.';
    exit;
}

// Hashear el valor ingresado para la comparación
$capchaHashed = sha1($capcha);

// Comparar el valor ingresado con el de la sesión
if ($codeVerify != $capchaHashed) {
    $_SESSION['code_verify'] = ''; // Borrar el valor de la sesión si el código es incorrecto
    echo 'El código de verificación es incorrecto.';
    exit;
}



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Forbidden, require data');
}

$type = $_POST['type'] ?? null;

$conn = Connection::conn();

if ($type === 'conserje') {
    $person = new Janitor($_POST['dni'], $_POST['nombre'], $_POST['telefono'], $_POST['categoria'], $conn);

    $person->create();
} else if ($type === 'profesor') {
    $person = new Professor($_POST['dni'], $_POST['nombre'], $_POST['telefono'], $_POST['trienniums'], $conn);

    $person->create();
} else if ($type === 'tecnician') {

    $person = new Tecnician($_POST['dni'], $_POST['nombre'], $_POST['telefono'], $_POST['months'], $conn);
    $person->create();
} else if ($type == 'departamens') {

    $departamento = new Departaments($_POST['nombre'], $_POST['id'], $conn);
    $departamento->create();
} else {
    die('Forbidden');
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