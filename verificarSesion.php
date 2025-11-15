<?php
header("Access-Control-Allow-Origin: http://localhost:5501");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();

if (isset($_SESSION["Autenticado"]) && $_SESSION["Autenticado"] === true) {
    echo json_encode([
        "logueado" => true,
        "usuario"  => $_SESSION["Nombre"] ?? null
    ]);
} else {
    echo json_encode(["logueado" => false]);
}
?>


 














