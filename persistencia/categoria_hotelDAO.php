<?php
class categoria_hotelDAO {

private $id_categoria_hotel ;
private $nivel_catetegoria_hotel;
private $fecha_categoria ;

public function categoria_hotelDAO( $id_categoria_hotel ="",$nivel_catetegoria_hotel="",$fecha_categoria ="" ) {

$this -> id_categoria_hotel  = $id_categoria_hotel ;
$this -> nivel_catetegoria_hotel = $nivel_catetegoria_hotel;
$this -> fecha_categoria  = $fecha_categoria ;
}

public function crear() {
return "
insert into categoria_hotel (nivel_catetegoria_hotel,fecha_categoria )
values (
 '" .$this -> nivel_catetegoria_hotel. "',
 '" .$this -> fecha_categoria . "' 

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
