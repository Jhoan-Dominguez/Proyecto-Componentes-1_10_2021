<?php
require_once "persistencia/conexion.php";
require_once "persistencia/categoriaHotelDAO.php";

class categoriaHotel {
    
private $id_categoriaHotel;
private $nivel_categoriaHotel;
private $fecha_categoriaHotel;
private $conexion;
private $categoriaHotelDAO;
    

    /**
     * @return
     */
    public function getid_categoriaHotel() {
        return $this -> id_categoriaHotel;
    }
    

    /**
     * @return
     */
    public function getnivel_categoriaHotel() {
        return $this -> nivel_categoriaHotel;
    }
    

    /**
     * @return
     */
    public function getfecha_categoriaHotel() {
        return $this -> fecha_categoriaHotel;
    }
    
    
    public function categoriaHotel( $id_categoriaHotel="",$nivel_categoriaHotel="",$fecha_categoriaHotel="" ) {
        
$this -> id_categoriaHotel = $id_categoriaHotel;
$this -> nivel_categoriaHotel = $nivel_categoriaHotel;
$this -> fecha_categoriaHotel = $fecha_categoriaHotel;
$this -> conexion = new conexion();
$this -> categoriaHotelDAO = new categoriaHotelDAO($this->id_categoriaHotel,$this->nivel_categoriaHotel,$this->fecha_categoriaHotel);
    }
    
public function consultarcategoriaHotel( $id_categoriaHotel ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoriaHotelDAO -> consultarcategoriaHotel( $id_categoriaHotel ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new categoriaHotel( $resultado[0],$resultado[1],$resultado[2] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoriaHotelDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new categoriaHotel( $resultado[0],$resultado[1],$resultado[2] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoriaHotelDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoriaHotelDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
