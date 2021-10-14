<?php
require_once "persistencia/conexion.php";
require_once "persistencia/hotelDAO.php";

class hotel {
    
private $id_hotel;
private $nombre_hotel;
private $direccion_hotel;
private $telefono_hotel;
private $id_categoriaHotel;
private $conexion;
private $hotelDAO;
    

    /**
     * @return
     */
    public function getid_hotel() {
        return $this -> id_hotel;
    }
    

    /**
     * @return
     */
    public function getnombre_hotel() {
        return $this -> nombre_hotel;
    }
    

    /**
     * @return
     */
    public function getdireccion_hotel() {
        return $this -> direccion_hotel;
    }
    

    /**
     * @return
     */
    public function gettelefono_hotel() {
        return $this -> telefono_hotel;
    }
    

    /**
     * @return
     */
    public function getid_categoriaHotel() {
        return $this -> id_categoriaHotel;
    }
    
    
    public function hotel( $id_hotel="",$nombre_hotel="",$direccion_hotel="",$telefono_hotel="",$id_categoriaHotel="" ) {
        
        $this -> id_hotel = $id_hotel;
        $this -> nombre_hotel = $nombre_hotel;
        $this -> direccion_hotel = $direccion_hotel;
        $this -> telefono_hotel = $telefono_hotel;
        $this -> id_categoriaHotel = $id_categoriaHotel;
        $this -> conexion = new conexion();
        $this -> hotelDAO = new hotelDAO($this->id_hotel,$this->nombre_hotel,$this->direccion_hotel,$this->telefono_hotel,$this->id_categoriaHotel);
    }
    
public function consultarhotel( $id_hotel ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultarhotel( $id_hotel ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new hotel( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new hotel( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> hotelDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
