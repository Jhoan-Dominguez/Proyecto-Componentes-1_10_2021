<?php
class categoriaHotelDAO {
    
private $id_categoriaHotel;
private $nivel_categoriaHotel;
private $fecha_categoriaHotel;
    
public function categoriaHotelDAO( $id_categoriaHotel="",$nivel_categoriaHotel="",$fecha_categoriaHotel="" ) {
    
$this -> id_categoriaHotel = $id_categoriaHotel;
$this -> nivel_categoriaHotel = $nivel_categoriaHotel;
$this -> fecha_categoriaHotel = $fecha_categoriaHotel;
}

public function crear() {
return "
insert into categoriaHotel (nivel_categoriaHotel,fecha_categoriaHotel)
values (
 '" .$this -> nivel_categoriaHotel. "', 
 '" .$this -> fecha_categoriaHotel. "'

)";
}
    
public function consultarcategoriaHotel( $id_categoriaHotel ){
    return "select * from categoriaHotel where id_categoriaHotel = ". $id_categoriaHotel;
}    
    
public function consultarTodos() {
    return "select * from categoriaHotel order by categoriaHotel.id_categoriaHotel asc ";
}

public function consultarTotalFilas() {
    return "select count(id_categoriaHotel) from categoriaHotel";
}

}
?>