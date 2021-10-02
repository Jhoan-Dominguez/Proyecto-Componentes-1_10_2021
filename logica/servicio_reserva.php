<?php
require_once "persistencia/conexion.php";
require_once "persistencia/servicio_reservaDAO.php";

class servicio_reserva {
    
private $id_servicio_reserva;
private $id_reserva;
private $id_servicio;
private $precio_servicio_reserva;
private $conexion;
private $servicio_reservaDAO;
    

    /**
     * @return
     */
    public function getid_servicio_reserva() {
        return $this -> id_servicio_reserva;
    }
    

    /**
     * @return
     */
    public function getid_reserva() {
        return $this -> id_reserva;
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
    public function getprecio_servicio_reserva() {
        return $this -> precio_servicio_reserva;
    }
    
    
    public function servicio_reserva( $id_servicio_reserva="",$id_reserva="",$id_servicio="",$precio_servicio_reserva="" ) {
        
        $this -> id_servicio_reserva = $id_servicio_reserva;
        $this -> id_reserva = $id_reserva;
        $this -> id_servicio = $id_servicio;
        $this -> precio_servicio_reserva = $precio_servicio_reserva;
        $this -> conexion = new conexion();
        $this -> servicio_reservaDAO = new servicio_reservaDAO($this->id_servicio_reserva,$this->id_reserva,$this->id_servicio,$this->precio_servicio_reserva);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicio_reservaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new servicio_reserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicio_reservaDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicio_reservaDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>