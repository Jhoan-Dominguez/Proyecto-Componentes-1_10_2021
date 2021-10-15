<?php
class habitacionDAO {
    
private $id_habitacion;
private $camas_habitacion;
private $bath_habitacion;
private $estado_habitacion;
private $precio_habitacion;
private $id_tipoHabitacion;
    
public function habitacionDAO( $id_habitacion="",$camas_habitacion="",$bath_habitacion="",$estado_habitacion="",$precio_habitacion="",$id_tipoHabitacion="" ) {
    
    $this -> id_habitacion = $id_habitacion;
    $this -> camas_habitacion = $camas_habitacion;
    $this -> bath_habitacion = $bath_habitacion;
    $this -> estado_habitacion = $estado_habitacion;
    $this -> precio_habitacion = $precio_habitacion;
    $this -> id_tipoHabitacion = $id_tipoHabitacion;
}

public function crear() {
return "
insert into habitacion (camas_habitacion,bath_habitacion,estado_habitacion,precio_habitacion,id_tipoHabitacion)
values (
 " .$this -> camas_habitacion. ", 
 " .$this -> bath_habitacion. ", 
 " .$this -> estado_habitacion. ", 
 " .$this -> precio_habitacion. ", 
 " .$this -> id_tipoHabitacion. "

)";
}
    
public function consultarhabitacion( $id_habitacion ){
    return "select * from habitacion where id_habitacion = ". $id_habitacion;
}    
    
public function consultarTodos() {
    return "select * from habitacion order by habitacion.id_habitacion asc ";
}

public function consultarTotalFilas() {
    return "select count(id_habitacion) from habitacion";
}

}
?>