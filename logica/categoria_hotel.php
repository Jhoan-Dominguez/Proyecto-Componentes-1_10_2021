<?php
require_once "persistencia/conexion.php";
require_once "persistencia/categoria_hotelDAO.php";

class categoria_hotel {
    
private $id_categoria_hotel;
private $nivel_catetegoria_hotel;
private $fecha_categoria;
private $conexion;
private $categoria_hotelDAO;
    

    /**
     * @return
     */
    public function getid_categoria_hotel() {
        return $this -> id_categoria_hotel;
    }
    

    /**
     * @return
     */
    public function getnivel_catetegoria_hotel() {
        return $this -> nivel_catetegoria_hotel;
    }
    

    /**
     * @return
     */
    public function getfecha_categoria() {
        return $this -> fecha_categoria;
    }
    
    
    public function categoria_hotel( $id_categoria_hotel="",$nivel_catetegoria_hotel="",$fecha_categoria="" ) {
        
$this -> id_categoria_hotel = $id_categoria_hotel;
$this -> nivel_catetegoria_hotel = $nivel_catetegoria_hotel;
$this -> fecha_categoria = $fecha_categoria;
$this -> conexion = new conexion();
$this -> categoria_hotelDAO = new categoria_hotelDAO($this->id_categoria_hotel,$this->nivel_catetegoria_hotel,$this->fecha_categoria);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoria_hotelDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new categoria_hotel( $resultado[0],$resultado[1],$resultado[2] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoria_hotelDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoria_hotelDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
