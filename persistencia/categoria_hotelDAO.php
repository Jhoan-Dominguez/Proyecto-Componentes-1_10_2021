<?php
class categoria_hotelDAO {
    
private $id_categoriahotel;
private $fecha_categoria;
    
public function categoria_hotelDAO( $id_categoriahotel="",$fecha_categoria="" ) {
    
$this -> id_categoriahotel = $id_categoriahotel;
$this -> fecha_categoria = $fecha_categoria;
}

public function crear() {
return "
insert into categoria_hotel (fecha_categoria)
values (
 '" .$this -> fecha_categoria. "'

)";
}
    
public function consultarTodos() {
    return "select * from categoria_hotel order by categoria_hotel.id_categoria_hotel asc ";
}

public function consultarTotalFilas() {
    return "select count(id_categoria_hotel) from categoria_hotel";
}

}
?>