<?php 
    require_once "../logica/habitacion.php";
    
    $habitacion = new habitacion();
    $habitacion = $habitacion -> consultarTodos();

    if($habitacion){
        echo json_encode(array("Habitacion" => $habitacion));
    }
?>