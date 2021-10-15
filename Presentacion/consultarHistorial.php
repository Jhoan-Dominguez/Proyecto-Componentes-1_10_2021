<?php 
require_once "../logica/reserva.php";


if(isset($_GET['id'])){
    
    $id_usuario = $_GET['id'];

    $reserva = new reserva();
    $datos = $reserva->buscarReservas(intval($id_usuario));

    echo json_encode(array("Historial" => $datos));
    
}else{
    echo "vaciooooo";
}

?>