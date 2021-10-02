<?php
class tipo_habitacionDAO {

private $id_tipo_habitacion;
private $tipoHabitacion;
private $categoria;

public function tipo_habitacionDAO( $id_tipo_habitacion="",$tipoHabitacion="",$categoria="" ) {

$this -> id_tipo_habitacion = $id_tipo_habitacion;
$this -> tipoHabitacion = $tipoHabitacion;
$this -> categoria = $categoria;
}

public function crear() {
return "
insert into tipo_habitacion (tipoHabitacion,categoria)
values (
 '" .$this -> tipoHabitacion. "',
 '" .$this -> categoria. "'

)";
}

public function consultarTodos() {
    return "select * from tipo_habitacion order by tipo_habitacion.id_tipo_habitacion asc ";
}

public function consultarTotalFilas() {
    return "select count(id_tipo_habitacion) from tipo_habitacion";
}

}
?>
