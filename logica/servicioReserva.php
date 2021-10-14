<?php
require_once "persistencia/conexion.php";
require_once "persistencia/servicioReservaDAO.php";

class servicioReserva {
    
private $id_servicioReserva;
private $precio_servicioReserva;
private $id_servicio;
private $id_reserva;
private $conexion;
private $servicioReservaDAO;
    

    /**
     * @return
     */
    public function getid_servicioReserva() {
        return $this -> id_servicioReserva;
    }
    

    /**
     * @return
     */
    public function getprecio_servicioReserva() {
        return $this -> precio_servicioReserva;
    }
    

    /**
     * @return
     */
    public function getid_servicio() {
        return $this -> id_servicio;
    }
    

    /**
     * @return
     */
    public function getid_reserva() {
        return $this -> id_reserva;
    }
    
    
    public function servicioReserva( $id_servicioReserva="",$precio_servicioReserva="",$id_servicio="",$id_reserva="" ) {
        
        $this -> id_servicioReserva = $id_servicioReserva;
        $this -> precio_servicioReserva = $precio_servicioReserva;
        $this -> id_servicio = $id_servicio;
        $this -> id_reserva = $id_reserva;
        $this -> conexion = new conexion();
        $this -> servicioReservaDAO = new servicioReservaDAO($this->id_servicioReserva,$this->precio_servicioReserva,$this->id_servicio,$this->id_reserva);
    }
    
public function consultarservicioReserva( $id_servicioReserva ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioReservaDAO -> consultarservicioReserva( $id_servicioReserva ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new servicioReserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioReservaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new servicioReserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioReservaDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioReservaDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>