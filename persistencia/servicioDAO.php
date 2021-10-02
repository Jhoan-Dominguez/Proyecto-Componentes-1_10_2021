<?php
class servicioDAO {
    
private $id_servicio;
private $nombre_servicio;
private $precio_servicio;
    
public function servicioDAO( $id_servicio="",$nombre_servicio="",$precio_servicio="" ) {
    
$this -> id_servicio = $id_servicio;
$this -> nombre_servicio = $nombre_servicio;
$this -> precio_servicio = $precio_servicio;
}

public function crear() {
return "
insert into servicio (nombre_servicio,precio_servicio)
values (
 '" .$this -> nombre_servicio. "', 
 '" .$this -> precio_servicio. "'

)";
}
    
public function consultarTodos() {
    return "select * from servicio order by servicio.id_servicio asc ";
}

public function consultarTotalFilas() {
    return "select count(id_servicio) from servicio";
}

}
?>
