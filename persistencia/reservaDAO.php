<?php
class reservaDAO {

private $id_reserva;
private $id_usuario;
private $id_hotel;
private $fecha_reserva;
private $fecha_inicio;
private $fecha_final;

public function reservaDAO( $id_reserva="",$id_usuario="",$id_hotel="",$fecha_reserva="",$fecha_inicio="",$fecha_final="" ) {

$this -> id_reserva = $id_reserva;
$this -> id_usuario = $id_usuario;
$this -> id_hotel = $id_hotel;
$this -> fecha_reserva = $fecha_reserva;
$this -> fecha_inicio = $fecha_inicio;
$this -> fecha_final = $fecha_final;
}

public function crear() {
return "
insert into reserva (id_usuario,id_hotel,fecha_reserva,fecha_inicio,fecha_final)
values (
 '" .$this -> id_usuario. "',
 '" .$this -> id_hotel. "',
 '" .$this -> fecha_reserva. "',
 '" .$this -> fecha_inicio. "',
 '" .$this -> fecha_final. "' 

)";
}

public function consultarTodos() {
    return "select * from reserva order by reserva.id_reserva asc ";
}

public function consultarTotalFilas() {
    return "select count(id_reserva) from reserva";
}

}
?>
