<?php
require_once "persistencia/conexion.php";
require_once "persistencia/tipo_habitacionDAO.php";

class tipo_habitacion {
    
private $id_tipo_habitacion;
private $categoria_tipo_habitacion;
private $conexion;
private $tipo_habitacionDAO;
    

    /**
     * @return
     */
    public function getid_tipo_habitacion() {
        return $this -> id_tipo_habitacion;
    }
    

    /**
     * @return
     */
    public function getcategoria_tipo_habitacion() {
        return $this -> categoria_tipo_habitacion;
    }
    
    
    public function tipo_habitacion( $id_tipo_habitacion="",$categoria_tipo_habitacion="" ) {
        
        $this -> id_tipo_habitacion = $id_tipo_habitacion;
        $this -> categoria_tipo_habitacion = $categoria_tipo_habitacion;
        $this -> conexion = new conexion();
        $this -> tipo_habitacionDAO = new tipo_habitacionDAO($this->id_tipo_habitacion,$this->categoria_tipo_habitacion);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipo_habitacionDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new tipo_habitacion( $resultado[0],$resultado[1] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipo_habitacionDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipo_habitacionDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>