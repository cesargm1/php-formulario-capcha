<?php

// descomentar en php.ini esta linea

// iniciamos la sesion
session_start();

// La función str_shuffle() baraja aleatoriamente todos los caracteres de una cadena.

// cortamos la cadena de todas las letras y numeros con  substr a 5 carateres

$codeCapcha = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 5);

// echo $codeCapcha;

// dimensiones de la imagen y la ruta de la fuente

$height  = 50;
$width  = 100;
$font = '../font/Consolas.ttf';
$fontSize = 20;


// verificamos si el codigo de la sesion es igual al capcha code_verify sera el codigo de la sesion 

$_SESSION['code_verify'] = sha1($codeCapcha);

if (!file_exists($font)) {
    die('Error: No se encontró la fuente en');
}

$image = imagecreatetruecolor($width, $height);

// aplicamos un color al texto color de fondo y un color secundario primer parametro segundo tercero 

$colorText = imagecolorallocate($image, 109, 179, 196);

$colorSecunday = imagecolorallocate($image, 0, 23, 196);

$badgroundImage = imagecolorallocate($image, 255, 255, 255);

// creamos las lineas 

for ($i = 0; $i < 7; $i++) {
    imageline($image, 0, rand(0, $height), $width, rand(0, $height), $colorSecunday);
}

// Creando puntos 
for ($i = 0; $i < 500; $i++) {
    imagesetpixel($image, rand(0, $width),  rand(0, $height),  $colorSecunday);
}

imagefill($image, 0, 0, $badgroundImage);

// comvertir imagen ttf a texto

imagettftext($image, $fontSize, -10, 10, 30, $colorText, $font, $codeCapcha);

header('content-Type:image/png');

// convertimos la imagen a png
imagepng($image);
imagedestroy($image);
