<?php
class facturaDAO {
    
private $id_factura;
private $fechaPago_factura;
private $Vtotal_factura;
private $id_usuario;
private $id_reserva;
    
public function facturaDAO( $id_factura="",$fechaPago_factura="",$Vtotal_factura="",$id_usuario="",$id_reserva="" ) {
    
$this -> id_factura = $id_factura;
$this -> fechaPago_factura = $fechaPago_factura;
$this -> Vtotal_factura = $Vtotal_factura;
$this -> id_usuario = $id_usuario;
$this -> id_reserva = $id_reserva;
}

public function crear() {
return "
insert into factura (fechaPago_factura,Vtotal_factura,id_usuario,id_reserva)
values (
 '" .$this -> fechaPago_factura. "', 
 " .$this -> Vtotal_factura. ", 
 " .$this -> id_usuario. ", 
 " .$this -> id_reserva. "

)";
}
    
public function consultarfactura( $id_factura ){
    return "select * from factura where id_factura = ". $id_factura;
}    
    
public function consultarTodos() {
    return "select * from factura order by factura.id_factura asc ";
}

public function consultarTotalFilas() {
    return "select count(id_factura) from factura";
}

}
?>
