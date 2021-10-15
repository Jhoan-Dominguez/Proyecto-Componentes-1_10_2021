
<?php
class hotelDAO {
    
private $id_hotel;
private $nombre_hotel;
private $direccion_hotel;
private $telefono_hotel;
private $id_categoriaHotel;
    
public function hotelDAO( $id_hotel="",$nombre_hotel="",$direccion_hotel="",$telefono_hotel="",$id_categoriaHotel="" ) {
    
$this -> id_hotel = $id_hotel;
$this -> nombre_hotel = $nombre_hotel;
$this -> direccion_hotel = $direccion_hotel;
$this -> telefono_hotel = $telefono_hotel;
$this -> id_categoriaHotel = $id_categoriaHotel;
}

public function crear() {
return "
insert into hotel (nombre_hotel,direccion_hotel,telefono_hotel,id_categoriaHotel)
values (
 '" .$this -> nombre_hotel. "', 
 '" .$this -> direccion_hotel. "', 
 '" .$this -> telefono_hotel. "', 
 " .$this -> id_categoriaHotel. "

)";
}
    
public function consultarhotel( $id_hotel ){
    return "select * from hotel where id_hotel = ". $id_hotel;
}    
    
public function consultarTodos() {
    return "select * from hotel order by hotel.id_hotel asc ";
}

public function consultarTotalFilas() {
    return "select count(id_hotel) from hotel";
}

}
?>
