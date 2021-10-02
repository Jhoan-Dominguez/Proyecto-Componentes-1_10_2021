<?php
require_once "persistencia/conexion.php";
require_once "persistencia/huespedDAO.php";

class huesped {
    
private $id_huesped;
private $id_reserva;
private $nombre_huesped;
private $apellido_huesped;
private $edad_huesped;
private $conexion;
private $huespedDAO;
    

    /**
     * @return
     */
    public function getid_huesped() {
        return $this -> id_huesped;
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
    public function getnombre_huesped() {
        return $this -> nombre_huesped;
    }
    

    /**
     * @return
     */
    public function getapellido_huesped() {
        return $this -> apellido_huesped;
    }
    

    /**
     * @return
     */
    public function getedad_huesped() {
        return $this -> edad_huesped;
    }
    
    
    public function huesped( $id_huesped="",$id_reserva="",$nombre_huesped="",$apellido_huesped="",$edad_huesped="" ) {
        
$this -> id_huesped = $id_huesped;
$this -> id_reserva = $id_reserva;
$this -> nombre_huesped = $nombre_huesped;
$this -> apellido_huesped = $apellido_huesped;
$this -> edad_huesped = $edad_huesped;
$this -> conexion = new conexion();
$this -> huespedDAO = new huespedDAO($this->id_huesped,$this->id_reserva,$this->nombre_huesped,$this->apellido_huesped,$this->edad_huesped);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> huespedDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new huesped( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> huespedDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> huespedDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>