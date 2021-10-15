<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";


if(isset($_POST['id_usuario']) && isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono'])
    && isset($_POST['correo']) && isset($_POST['password'])){
    
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $usuario = new usuario();
        $usuario = $usuario -> updateInformation(intval($id_usuario), $correo, $password);

        $cliente = new cliente();
        $cliente = $cliente -> updateInformation(intval($id_usuario), $nombre, $direccion, $telefono);

        echo "Successful Update";
    
}else{
    echo "Error";
}

?>