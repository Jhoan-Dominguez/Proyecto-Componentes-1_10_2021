<?php
class habitacionDAO {

private $id_habitacion;
private $numero_camas_habitacion;
private $numero_baños;
private $estado_habitacion;
private $precio_habitacion;
private $id_tipo_habitacion;

public function habitacionDAO( $id_habitacion="",$numero_camas_habitacion="",$numero_baños="",$estado_habitacion="",$precio_habitacion="",$id_tipo_habitacion="" ) {

$this -> id_habitacion = $id_habitacion;
$this -> numero_camas_habitacion = $numero_camas_habitacion;
$this -> numero_baños = $numero_baños;
$this -> estado_habitacion = $estado_habitacion;
$this -> precio_habitacion = $precio_habitacion;
$this -> id_tipo_habitacion = $id_tipo_habitacion;
}

public function crear() {
return "
insert into habitacion (numero_camas_habitacion,numero_baños,estado_habitacion,precio_habitacion,id_tipo_habitacion)
values (
 '" .$this -> numero_camas_habitacion. "',
 '" .$this -> numero_baños. "',
 '" .$this -> estado_habitacion. "',
 '" .$this -> precio_habitacion. "',
 '" .$this -> id_tipo_habitacion. "'

)";
}

public function consultarTodos() {
    return "select * from habitacion order by habitacion.id_habitacion asc ";
}

public function consultarTotalFilas() {
    return "select count(id_habitacion) from habitacion";
}

}
?>
