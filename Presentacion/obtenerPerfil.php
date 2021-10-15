<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";


if(isset($_GET['id'])){
    
    $id_usuario = $_GET['id'];

    $usuario = new usuario();
    $datos = $usuario->buscarCliente(intval($id_usuario));
    
    echo json_encode($datos[0]);
}else{
    echo "vaciooooo";
}

?>