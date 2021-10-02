<?php
require_once "persistencia/conexion.php";
require_once "persistencia/facturaDAO.php";

class factura {
    
private $id_reserva;
private $id_factura;
private $id_usuario;
private $fecha_pago;
private $precio_total;
private $reserva_precio;
private $servicios_total;
private $conexion;
private $facturaDAO;
    

    /**
     * @return
     */
    public function getid_reserva() {
        return $this -> id_reserva;
    }
    

    /**
     * @return
     */
    public function getid_factura() {
        return $this -> id_factura;
    }
    

    /**
     * @return
     */
    public function getid_usuario() {
        return $this -> id_usuario;
    }
    

    /**
     * @return
     */
    public function getfecha_pago() {
        return $this -> fecha_pago;
    }
    

    /**
     * @return
     */
    public function getprecio_total() {
        return $this -> precio_total;
    }
    

    /**
     * @return
     */
    public function getreserva_precio() {
        return $this -> reserva_precio;
    }
    

    /**
     * @return
     */
    public function getservicios_total() {
        return $this -> servicios_total;
    }
    
    
    public function factura( $id_reserva="",$id_factura="",$id_usuario="",$fecha_pago="",$precio_total="",$reserva_precio="",$servicios_total="" ) {
        
$this -> id_reserva = $id_reserva;
$this -> id_factura = $id_factura;
$this -> id_usuario = $id_usuario;
$this -> fecha_pago = $fecha_pago;
$this -> precio_total = $precio_total;
$this -> reserva_precio = $reserva_precio;
$this -> servicios_total = $servicios_total;
$this -> conexion = new conexion();
$this -> facturaDAO = new facturaDAO($this->id_reserva,$this->id_factura,$this->id_usuario,$this->fecha_pago,$this->precio_total,$this->reserva_precio,$this->servicios_total);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new factura( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>