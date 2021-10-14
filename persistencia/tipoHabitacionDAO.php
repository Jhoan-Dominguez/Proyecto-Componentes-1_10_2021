<?php
class tipoHabitacionDAO {
    
private $id_tipoHabitacion;
private $categoria_tipoHabitacion;
    
public function tipoHabitacionDAO( $id_tipoHabitacion="",$categoria_tipoHabitacion="" ) {
    
$this -> id_tipoHabitacion = $id_tipoHabitacion;
$this -> categoria_tipoHabitacion = $categoria_tipoHabitacion;
}

public function crear() {
return "
insert into tipoHabitacion (categoria_tipoHabitacion)
values (
 '" .$this -> categoria_tipoHabitacion. "'

)";
}
    
public function consultartipoHabitacion( $id_tipoHabitacion ){
    return "select * from tipoHabitacion where id_tipoHabitacion = ". $id_tipoHabitacion;
}    
    
public function consultarTodos() {
    return "select * from tipoHabitacion order by tipoHabitacion.id_tipoHabitacion asc ";
}

public function consultarTotalFilas() {
    return "select count(id_tipoHabitacion) from tipoHabitacion";
}

}
?>
