<?php
class tipo_habitacionDAO {
    
private $id_tipo_habitacion;
private $categoria_tipo_habitacion;
    
public function tipo_habitacionDAO( $id_tipo_habitacion="",$categoria_tipo_habitacion="" ) {
    
$this -> id_tipo_habitacion = $id_tipo_habitacion;
$this -> categoria_tipo_habitacion = $categoria_tipo_habitacion;
}

public function crear() {
return "
insert into tipo_habitacion (categoria_tipo_habitacion)
values (
 '" .$this -> categoria_tipo_habitacion. "'

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