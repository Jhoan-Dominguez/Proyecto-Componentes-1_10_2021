<?php
class servicio_reservaDAO {
    
private $id_servicio_reserva;
private $id_reserva;
private $id_servicio;
private $precio_servicio_reserva;
    
public function servicio_reservaDAO( $id_servicio_reserva="",$id_reserva="",$id_servicio="",$precio_servicio_reserva="" ) {
    
$this -> id_servicio_reserva = $id_servicio_reserva;
$this -> id_reserva = $id_reserva;
$this -> id_servicio = $id_servicio;
$this -> precio_servicio_reserva = $precio_servicio_reserva;
}

public function crear() {
return "
insert into servicio_reserva (id_reserva,id_servicio,precio_servicio_reserva)
values (
 '" .$this -> id_reserva. "', 
 '" .$this -> id_servicio. "', 
 '" .$this -> precio_servicio_reserva. "'

)";
}
    
public function consultarTodos() {
    return "select * from servicio_reserva order by servicio_reserva.id_servicio_reserva asc ";
}

public function consultarTotalFilas() {
    return "select count(id_servicio_reserva) from servicio_reserva";
}

}
?>