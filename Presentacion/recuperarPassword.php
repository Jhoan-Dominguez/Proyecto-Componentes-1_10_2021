<?php 
require_once "../logica/usuario.php";
require_once "../logica/cliente.php";


if(isset($_POST['id']) && isset($_POST['correo']) && isset($_POST['newPass']) ){
    
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $newPass = $_POST['newPass'];

    $usuario = new usuario();
    $nuevo_usuario = $usuario->restablecerPassword($id, $correo, $newPass);
    
    echo $id."Password Update";
}

?>