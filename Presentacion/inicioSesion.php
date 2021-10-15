<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";

$correo = '';
$password = '';

if(isset($_POST['usuario']) && isset($_POST['password'])){

    $correo = $_POST['usuario'];
    $password = $_POST['password'];

    $usuario = new usuario();
    $usuario = $usuario->iniciarSesion($correo, $password);

    if($usuario){
        $id_usuario = $usuario[0] -> getid_usuario();
        echo $id_usuario;
    }else{
        echo "ERROR 2";
    }

}else{
    echo "ERROR 1";
}

?>