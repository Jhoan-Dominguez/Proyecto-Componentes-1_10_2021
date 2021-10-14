<?php
class reservaDAO {
    
private $id_reserva;
private $fecha_reserva;
private $fechaInicio_reserva;
private $fechaFinal_reserva;
private $Vhabitaciones_reserva;
private $Vservicios_reserva;
private $id_usuario;
private $id_hotel;
    
public function reservaDAO( $id_reserva="",$fecha_reserva="",$fechaInicio_reserva="",$fechaFinal_reserva="",$Vhabitaciones_reserva="",$Vservicios_reserva="",$id_usuario="",$id_hotel="" ) {
    
    $this -> id_reserva = $id_reserva;
    $this -> fecha_reserva = $fecha_reserva;
    $this -> fechaInicio_reserva = $fechaInicio_reserva;
    $this -> fechaFinal_reserva = $fechaFinal_reserva;
    $this -> Vhabitaciones_reserva = $Vhabitaciones_reserva;
    $this -> Vservicios_reserva = $Vservicios_reserva;
    $this -> id_usuario = $id_usuario;
    $this -> id_hotel = $id_hotel;
}

public function crear() {
return "
insert into reserva (fecha_reserva,fechaInicio_reserva,fechaFinal_reserva,Vhabitaciones_reserva,Vservicios_reserva,id_usuario,id_hotel)
values (
 '" .$this -> fecha_reserva. "', 
 '" .$this -> fechaInicio_reserva. "', 
 '" .$this -> fechaFinal_reserva. "', 
 '" .$this -> Vhabitaciones_reserva. "', 
 '" .$this -> Vservicios_reserva. "', 
 '" .$this -> id_usuario. "', 
 '" .$this -> id_hotel. "'

)";
}
    
public function consultarreserva( $id_reserva ){
    return "select * from reserva where id_reserva = ". $id_reserva;
}    
    
public function consultarTodos() {
    return "select * from reserva order by reserva.id_reserva asc ";
}

public function consultarTotalFilas() {
    return "select count(id_reserva) from reserva";
}

}
?>