
<?php
class servicioReservaDAO {
    
private $id_servicioReserva;
private $precio_servicioReserva;
private $id_servicio;
private $id_reserva;
    
public function servicioReservaDAO( $id_servicioReserva="",$precio_servicioReserva="",$id_servicio="",$id_reserva="" ) {
    
    $this -> id_servicioReserva = $id_servicioReserva;
    $this -> precio_servicioReserva = $precio_servicioReserva;
    $this -> id_servicio = $id_servicio;
    $this -> id_reserva = $id_reserva;
}

public function crear() {
return "
    insert into servicioReserva (precio_servicioReserva,id_servicio,id_reserva)
    values (
    " .$this -> precio_servicioReserva. ", 
    " .$this -> id_servicio. ", 
    " .$this -> id_reserva. "

    )";
}
    
public function consultarservicioReserva( $id_servicioReserva ){
    return "select * from servicioReserva where id_servicioReserva = ". $id_servicioReserva;
}    
    
public function consultarTodos() {
    return "select * from servicioReserva order by servicioReserva.id_servicioReserva asc ";
}

public function consultarTotalFilas() {
    return "select count(id_servicioReserva) from servicioReserva";
}

}
?>