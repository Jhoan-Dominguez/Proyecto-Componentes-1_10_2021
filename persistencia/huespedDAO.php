<?php
class huespedDAO {
    
private $id_huesped;
private $nombre_huesped;
private $id_reserva;
private $id_usuario;
    
public function huespedDAO( $id_huesped="",$nombre_huesped="",$id_reserva="",$id_usuario="" ) {
    
$this -> id_huesped = $id_huesped;
$this -> nombre_huesped = $nombre_huesped;
$this -> id_reserva = $id_reserva;
$this -> id_usuario = $id_usuario;
}

public function crear() {
return "
insert into huesped (nombre_huesped,id_reserva,id_usuario)
values (
 '" .$this -> nombre_huesped. "', 
 '" .$this -> id_reserva. "', 
 '" .$this -> id_usuario. "'

)";
}
    
public function consultarhuesped( $id_huesped ){
    return "select * from huesped where id_huesped = ". $id_huesped;
}    
    
public function consultarTodos() {
    return "select * from huesped order by huesped.id_huesped asc ";
}

public function consultarTotalFilas() {
    return "select count(id_huesped) from huesped";
}

}
?>
