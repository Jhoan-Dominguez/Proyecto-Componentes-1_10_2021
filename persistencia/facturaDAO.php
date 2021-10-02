<?php
class facturaDAO {

private $id_factura ;
private $id_reserva ;
private $id_usuario;
private $fecha_pago;
private $precio_total;
private $servicios_total;

public function facturaDAO( $id_factura ="",$id_reserva ="",$id_usuario="",$fecha_pago="",$precio_total="",$servicios_total="" ) {

$this -> id_factura  = $id_factura ;
$this -> id_reserva  = $id_reserva ;
$this -> id_usuario = $id_usuario;
$this -> fecha_pago = $fecha_pago;
$this -> precio_total = $precio_total;
$this -> servicios_total = $servicios_total;
}

public function crear() {
return "
insert into factura (id_reserva ,id_usuario,fecha_pago,precio_total,servicios_total)
values (
 '" .$this -> id_reserva . "',
 '" .$this -> id_usuario. "',
 '" .$this -> fecha_pago. "',
 '" .$this -> precio_total. "',
 '" .$this -> servicios_total. "'

)";
}

public function consultarTodos() {
    return "select * from factura order by factura.id_factura asc ";
}

public function consultarTotalFilas() {
    return "select count(id_factura) from factura";
}

}
?>
