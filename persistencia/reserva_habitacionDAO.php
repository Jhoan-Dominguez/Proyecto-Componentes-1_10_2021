<?php
class reserva_habitacionDAO {
    
private $id_habitacion;
private $id_reserva_habitacion;
private $id_reserva;
private $cant_reserva_habitacion;
private $precio_reserva_habitacion;
    
public function reserva_habitacionDAO( $id_habitacion="",$id_reserva_habitacion="",$id_reserva="",$cant_reserva_habitacion="",$precio_reserva_habitacion="" ) {
    
$this -> id_habitacion = $id_habitacion;
$this -> id_reserva_habitacion = $id_reserva_habitacion;
$this -> id_reserva = $id_reserva;
$this -> cant_reserva_habitacion = $cant_reserva_habitacion;
$this -> precio_reserva_habitacion = $precio_reserva_habitacion;
}

public function crear() {
return "
insert into reserva_habitacion (id_reserva_habitacion,id_reserva,cant_reserva_habitacion,precio_reserva_habitacion)
values (
 '" .$this -> id_reserva_habitacion. "', 
 '" .$this -> id_reserva. "', 
 '" .$this -> cant_reserva_habitacion. "', 
 '" .$this -> precio_reserva_habitacion. "'

)";
}
    
public function consultarTodos() {
    return "select * from reserva_habitacion order by reserva_habitacion.id_reserva_habitacion asc ";
}

public function consultarTotalFilas() {
    return "select count(id_reserva_habitacion) from reserva_habitacion";
}

}
?>