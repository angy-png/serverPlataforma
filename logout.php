<?php
header("Access-Control-Allow-Origin: http://localhost:5501");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();
session_unset();//elimina las variables registradas
session_destroy();// Destruir la sesión
echo json_encode(["success"=>true]);
?>
