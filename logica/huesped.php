<?php
require_once "../persistencia/conexion.php";
require_once "../persistencia/huespedDAO.php";

class huesped {
    
private $id_huesped;
private $nombre_huesped;
private $id_reserva;
private $id_usuario;
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
    public function getnombre_huesped() {
        return $this -> nombre_huesped;
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
    public function getid_usuario() {
        return $this -> id_usuario;
    }
    
    
    public function huesped( $id_huesped="",$nombre_huesped="",$id_reserva="",$id_usuario="" ) {
        
        $this -> id_huesped = $id_huesped;
        $this -> nombre_huesped = $nombre_huesped;
        $this -> id_reserva = $id_reserva;
        $this -> id_usuario = $id_usuario;
        $this -> conexion = new conexion();
        $this -> huespedDAO = new huespedDAO($this->id_huesped,$this->nombre_huesped,$this->id_reserva,$this->id_usuario);
    }
    
public function consultarhuesped( $id_huesped ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> huespedDAO -> consultarhuesped( $id_huesped ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new huesped( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> huespedDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new huesped( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
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