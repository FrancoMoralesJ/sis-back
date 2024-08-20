<?php

//const base_url = "/sis-venta/";
// const base_url = "http://sisventas.crackti.com/sis-venta/";
const base_url = "http://localhost:81/back/";
// const host = "DESKTOP-995T8L9";
const host = "localhost";
const user = "root";
const pass = "";
// const db = "sistemas";
const db = "ventasfm";
const charset = "";


function convertirWebP($fotoTemp, $rutaIMG, $compresion ) {
    $img = false;

    // vamos Verificar el tipo MIME de la imagen
    $mimeType = mime_content_type($fotoTemp);

    switch ($mimeType) {
        case 'image/jpeg':
            $img = imagecreatefromjpeg($fotoTemp);
            break;
        case 'image/png':
            $img = imagecreatefrompng($fotoTemp);
            break;
        case 'image/gif':
            $img = imagecreatefromgif($fotoTemp);
            break;
        case 'image/webp':
            move_uploaded_file($fotoTemp,$rutaIMG);
            break;
        // Agrega más casos si es necesario para otros formatos
        default:
            return false; // Formato no soportado finalizaa
    }

    if ($img === false) {
        return false;
    }

    $resultado = imagewebp($img, $rutaIMG, $compresion);
    imagedestroy($img);

    return $resultado ? $rutaIMG : false;
}