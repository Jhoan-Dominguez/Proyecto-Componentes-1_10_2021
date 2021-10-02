<?php 
require_once "logica/usuario.php";
require_once "logica/cliente.php"


$correo = $_POST['usuario'];
$password = $_POST['password'];

$usuario = new usuario();
$usuario = $usuario->buscarUsuario($correo, $password);

if($usuario){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}

?>