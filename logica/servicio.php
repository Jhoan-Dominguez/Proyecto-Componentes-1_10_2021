<?php
require_once "persistencia/conexion.php";
require_once "persistencia/servicioDAO.php";

class servicio {
    
private $id_servicio;
private $nombre_servicio;
private $precio_servicio;
private $conexion;
private $servicioDAO;
    

    /**
     * @return
     */
    public function getid_servicio() {
        return $this -> id_servicio;
    }
    

    /**
     * @return
     */
    public function getnombre_servicio() {
        return $this -> nombre_servicio;
    }
    

    /**
     * @return
     */
    public function getprecio_servicio() {
        return $this -> precio_servicio;
    }
    
    
    public function servicio( $id_servicio="",$nombre_servicio="",$precio_servicio="" ) {
        
        $this -> id_servicio = $id_servicio;
        $this -> nombre_servicio = $nombre_servicio;
        $this -> precio_servicio = $precio_servicio;
        $this -> conexion = new conexion();
        $this -> servicioDAO = new servicioDAO($this->id_servicio,$this->nombre_servicio,$this->precio_servicio);
    }
    
public function consultarservicio( $id_servicio ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioDAO -> consultarservicio( $id_servicio ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new servicio( $resultado[0],$resultado[1],$resultado[2] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new servicio( $resultado[0],$resultado[1],$resultado[2] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> servicioDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
