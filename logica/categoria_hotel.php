<?php
require_once "persistencia/conexion.php";
require_once "persistencia/categoria_hotelDAO.php";

class categoria_hotel {
    
private $id_categoriahotel;
private $fecha_categoria;
private $conexion;
private $categoria_hotelDAO;
    

    /**
     * @return
     */
    public function getid_categoriahotel() {
        return $this -> id_categoriahotel;
    }
    

    /**
     * @return
     */
    public function getfecha_categoria() {
        return $this -> fecha_categoria;
    }
    
    
    public function categoria_hotel( $id_categoriahotel="",$fecha_categoria="" ) {
        
        $this -> id_categoriahotel = $id_categoriahotel;
        $this -> fecha_categoria = $fecha_categoria;
        $this -> conexion = new conexion();
        $this -> categoria_hotelDAO = new categoria_hotelDAO($this->id_categoriahotel,$this->fecha_categoria);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoria_hotelDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new categoria_hotel( $resultado[0],$resultado[1] ));
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
