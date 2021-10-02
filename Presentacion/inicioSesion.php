<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";

$correo = '';
$password = '';

if(isset($_POST['usuario']) && isset($_POST['password'])){

    $correo = $_POST['usuario'];
    $password = $_POST['password'];

}

if( isset($correo) && isset($password)){
    $usuario = new usuario();
    $usuario = $usuario->buscarUsuario($correo, $password);
    $usuario_name = $usuario[0] -> getid_usuario();
    if($usuario){
        echo json_encode($usuario_name,JSON_UNESCAPED_UNICODE);
    }else{
        echo "ERROR 2";
    }
}else{
    echo "ERROR 1";
}

?>