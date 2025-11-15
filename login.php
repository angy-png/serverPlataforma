<?php
header("Access-Control-Allow-Origin: http://localhost:5501");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

session_start();

if(!empty($_POST["usuario"]) && !empty($_POST["contrasena"])) {

    $parametros = [
        "Usuario" => $_POST["usuario"],
        "Pass" => $_POST["contrasena"]
    ];

    $jsonDatos = json_encode($parametros);

    $urlLogin = "http://192.168.13.133:5000/Sesion/login";

    $curl = curl_init();//inicia uns sesion en cURl(transferir datos en df protocolos)

    //establece una opcion para una transferencia cURL
    curl_setopt($curl, CURLOPT_URL, $urlLogin);//url que se va a obtener
    curl_setopt($curl, CURLOPT_POST, true);//true para hacer uns solicitud HTTP POST
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDatos);//envia los datos a la solicitud post 
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//devolver la tranferencia 

    $resultado = curl_exec($curl);//realizar una sesion cURL

    if (!$resultado) {
        echo json_encode(["resultado"=>-1, "Error"=>curl_error($curl)]);
        exit;
    }

    curl_close($curl);

    $jsonRespuesta = json_decode($resultado, true);

    if ($jsonRespuesta["resultado"] == 1) {   
    $usuario = $jsonRespuesta["datos"]; 
    $_SESSION["Autenticado"] = true;
    $_SESSION["IdUsuario"] = $usuario["id"];
    $_SESSION["Nombre"] = $usuario["nombre"];
    $_SESSION["User"] = $usuario["user"]; 

        echo json_encode(["resultado"=>1, "Mensaje"=>"Login correcto", $_SESSION]);
    } else {
        echo json_encode(["resultado"=>-2, "Error"=>"Usuario o contraseña incorrectos"]);
    }

} else {
    echo json_encode(["resultado"=>-3, "Error"=>"Faltan datos"]);
}
?>
