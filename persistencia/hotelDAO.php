<?php
class hotelDAO {
    
private $id_hotel;
private $nombre_hotel;
private $direccion_hotel;
private $telefono_hotel;
private $id_categoriahotel;
    
public function hotelDAO( $id_hotel="",$nombre_hotel="",$direccion_hotel="",$telefono_hotel="",$id_categoriahotel="" ) {
    
$this -> id_hotel = $id_hotel;
$this -> nombre_hotel = $nombre_hotel;
$this -> direccion_hotel = $direccion_hotel;
$this -> telefono_hotel = $telefono_hotel;
$this -> id_categoriahotel = $id_categoriahotel;
}

public function crear() {
return "
insert into hotel (nombre_hotel,direccion_hotel,telefono_hotel,id_categoriahotel)
values (
 '" .$this -> nombre_hotel. "', 
 '" .$this -> direccion_hotel. "', 
 '" .$this -> telefono_hotel. "', 
 '" .$this -> id_categoriahotel. "'

)";
}
    
public function consultarTodos() {
    return "select * from hotel order by hotel.id_hotel asc ";
}

public function consultarTotalFilas() {
    return "select count(id_hotel) from hotel";
}

}
?>