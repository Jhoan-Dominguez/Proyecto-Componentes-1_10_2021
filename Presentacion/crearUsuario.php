<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";


if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['correo'])
    && isset($_POST['password'])){
    
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $estado = 1;
     
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $usuario = new usuario( 0, $correo, $password, $estado );
    $nuevo_usuario = $usuario->crear();
    
    
    $id_usuario = $usuario->consultarTotalFilas();
    
    $cliente = new cliente( 0, $nombre, $direccion, $telefono, $id_usuario);
    $nuevo_cliente = $cliente->crear();
    
    echo "Usuario Registrado con Exito";
}

?>