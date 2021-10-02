<?php
require_once "persistencia/conexion.php";
require_once "persistencia/habitacionDAO.php";

class habitacion {
    
private $id_habitacion;
private $numero_camas_habitacion;
private $numero_baños;
private $precio_habitacion;
private $conexion;
private $habitacionDAO;
    

    /**
     * @return
     */
    public function getid_habitacion() {
        return $this -> id_habitacion;
    }
    

    /**
     * @return
     */
    public function getnumero_camas_habitacion() {
        return $this -> numero_camas_habitacion;
    }
    

    /**
     * @return
     */
    public function getnumero_baños() {
        return $this -> numero_baños;
    }
    

    /**
     * @return
     */
    public function getprecio_habitacion() {
        return $this -> precio_habitacion;
    }
    
    
    public function habitacion( $id_habitacion="",$numero_camas_habitacion="",$numero_baños="",$precio_habitacion="" ) {
        
        $this -> id_habitacion = $id_habitacion;
        $this -> numero_camas_habitacion = $numero_camas_habitacion;
        $this -> numero_baños = $numero_baños;
        $this -> precio_habitacion = $precio_habitacion;
        $this -> conexion = new conexion();
        $this -> habitacionDAO = new habitacionDAO($this->id_habitacion,$this->numero_camas_habitacion,$this->numero_baños,$this->precio_habitacion);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new habitacion( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>