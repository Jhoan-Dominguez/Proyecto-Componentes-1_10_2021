<?php
require_once "persistencia/conexion.php";
require_once "persistencia/habitacionDAO.php";

class habitacion {
    
private $id_habitacion;
private $camas_habitacion;
private $bath_habitacion;
private $estado_habitacion;
private $precio_habitacion;
private $id_tipoHabitacion;
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
    public function getcamas_habitacion() {
        return $this -> camas_habitacion;
    }
    

    /**
     * @return
     */
    public function getbath_habitacion() {
        return $this -> bath_habitacion;
    }
    

    /**
     * @return
     */
    public function getestado_habitacion() {
        return $this -> estado_habitacion;
    }
    

    /**
     * @return
     */
    public function getprecio_habitacion() {
        return $this -> precio_habitacion;
    }
    

    /**
     * @return
     */
    public function getid_tipoHabitacion() {
        return $this -> id_tipoHabitacion;
    }
    
    
    public function habitacion( $id_habitacion="",$camas_habitacion="",$bath_habitacion="",$estado_habitacion="",$precio_habitacion="",$id_tipoHabitacion="" ) {
        
        $this -> id_habitacion = $id_habitacion;
        $this -> camas_habitacion = $camas_habitacion;
        $this -> bath_habitacion = $bath_habitacion;
        $this -> estado_habitacion = $estado_habitacion;
        $this -> precio_habitacion = $precio_habitacion;
        $this -> id_tipoHabitacion = $id_tipoHabitacion;
        $this -> conexion = new conexion();
        $this -> habitacionDAO = new habitacionDAO($this->id_habitacion,$this->camas_habitacion,$this->bath_habitacion,$this->estado_habitacion,$this->precio_habitacion,$this->id_tipoHabitacion);
    }
    
public function consultarhabitacion( $id_habitacion ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarhabitacion( $id_habitacion ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new habitacion( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new habitacion( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5] ));
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
