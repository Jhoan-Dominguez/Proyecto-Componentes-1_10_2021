<?php
require_once "persistencia/conexion.php";
require_once "persistencia/reserva_habitacionDAO.php";

class reserva_habitacion {
    
private $id_reserva_habitacion;
private $id_habitacion;
private $id_reserva;
private $cant_reserva_habitacion;
private $precio_reserva_habitacion;
private $conexion;
private $reserva_habitacionDAO;
    

    /**
     * @return
     */
    public function getid_reserva_habitacion() {
        return $this -> id_reserva_habitacion;
    }
    

    /**
     * @return
     */
    public function getid_habitacion() {
        return $this -> id_habitacion;
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
    public function getcant_reserva_habitacion() {
        return $this -> cant_reserva_habitacion;
    }
    

    /**
     * @return
     */
    public function getprecio_reserva_habitacion() {
        return $this -> precio_reserva_habitacion;
    }
    
    
    public function reserva_habitacion( $id_reserva_habitacion="",$id_habitacion="",$id_reserva="",$cant_reserva_habitacion="",$precio_reserva_habitacion="" ) {
        
$this -> id_reserva_habitacion = $id_reserva_habitacion;
$this -> id_habitacion = $id_habitacion;
$this -> id_reserva = $id_reserva;
$this -> cant_reserva_habitacion = $cant_reserva_habitacion;
$this -> precio_reserva_habitacion = $precio_reserva_habitacion;
$this -> conexion = new conexion();
$this -> reserva_habitacionDAO = new reserva_habitacionDAO($this->id_reserva_habitacion,$this->id_habitacion,$this->id_reserva,$this->cant_reserva_habitacion,$this->precio_reserva_habitacion);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reserva_habitacionDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new reserva_habitacion( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reserva_habitacionDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reserva_habitacionDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
