<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";


if(isset($_GET['id'])){
    
    $id_usuario = $_GET['id'];

    $usuario = new usuario();
    $usuario = $usuario->datosUsuarioCliente($id_usuario);

    echo json_encode($usuario);
}else{
    echo "vaciooooo";
}

?>