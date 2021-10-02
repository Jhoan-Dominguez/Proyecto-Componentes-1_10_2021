<?php
class huespedDAO {

private $id_huesped;
private $id_reserva;
private $nombre_huesped;
private $apellido_huesped;

public function huespedDAO( $id_huesped="",$id_reserva="",$nombre_huesped="",$apellido_huesped="" ) {

$this -> id_huesped = $id_huesped;
$this -> id_reserva = $id_reserva;
$this -> nombre_huesped = $nombre_huesped;
$this -> apellido_huesped = $apellido_huesped;
}

public function crear() {
return "
insert into huesped (id_reserva,nombre_huesped,apellido_huesped)
values (
 '" .$this -> id_reserva. "',
 '" .$this -> nombre_huesped. "',
 '" .$this -> apellido_huesped. "' 

)";
}

public function consultarTodos() {
    return "select * from huesped order by huesped.id_huesped asc ";
}

public function consultarTotalFilas() {
    return "select count(id_huesped) from huesped";
}

}
?>
