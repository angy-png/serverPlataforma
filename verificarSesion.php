<?php
$allowedOrigins = [
    "http://192.168.13.133", 
    "http://localhost",
    "http://localhost:5501"
];

if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
    header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
}
 
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


 














