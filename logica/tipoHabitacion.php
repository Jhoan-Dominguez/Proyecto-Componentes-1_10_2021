<?php
require_once "persistencia/conexion.php";
require_once "persistencia/tipoHabitacionDAO.php";

class tipoHabitacion {
    
private $id_tipoHabitacion;
private $categoria_tipoHabitacion;
private $conexion;
private $tipoHabitacionDAO;
    

    /**
     * @return
     */
    public function getid_tipoHabitacion() {
        return $this -> id_tipoHabitacion;
    }
    

    /**
     * @return
     */
    public function getcategoria_tipoHabitacion() {
        return $this -> categoria_tipoHabitacion;
    }
    
    
    public function tipoHabitacion( $id_tipoHabitacion="",$categoria_tipoHabitacion="" ) {
                
        $this -> id_tipoHabitacion = $id_tipoHabitacion;
        $this -> categoria_tipoHabitacion = $categoria_tipoHabitacion;
        $this -> conexion = new conexion();
        $this -> tipoHabitacionDAO = new tipoHabitacionDAO($this->id_tipoHabitacion,$this->categoria_tipoHabitacion);
    }
    
public function consultartipoHabitacion( $id_tipoHabitacion ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoHabitacionDAO -> consultartipoHabitacion( $id_tipoHabitacion ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new tipoHabitacion( $resultado[0],$resultado[1] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoHabitacionDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new tipoHabitacion( $resultado[0],$resultado[1] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoHabitacionDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoHabitacionDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
