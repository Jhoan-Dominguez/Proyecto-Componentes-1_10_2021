<?php
class habitacionReservaDAO {
    
private $id_habitacionReserva;
private $id_reserva;
private $id_habitacion;
    
public function habitacionReservaDAO( $id_habitacionReserva="",$id_reserva="",$id_habitacion="" ) {
    
$this -> id_habitacionReserva = $id_habitacionReserva;
$this -> id_reserva = $id_reserva;
$this -> id_habitacion = $id_habitacion;
}

public function crear() {
return "
insert into habitacionReserva (id_reserva,id_habitacion)
values (
 " .$this -> id_reserva. ", 
 " .$this -> id_habitacion. "

)";
}
    
public function consultarhabitacionReserva( $id_habitacionReserva ){
    return "select * from habitacionReserva where id_habitacionReserva = ". $id_habitacionReserva;
}    
    
public function consultarTodos() {
    return "select * from habitacionReserva order by habitacionReserva.id_habitacionReserva asc ";
}

public function consultarTotalFilas() {
    return "select count(id_habitacionReserva) from habitacionReserva";
}

}
?>
