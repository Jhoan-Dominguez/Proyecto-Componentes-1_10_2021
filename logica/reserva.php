<?php
require_once "persistencia/conexion.php";
require_once "persistencia/reservaDAO.php";

class reserva {
    
private $id_reserva;
private $id_usuario;
private $id_hotel;
private $fecha_reserva;
private $fecha_inicio;
private $fecha_final;
private $conexion;
private $reservaDAO;
    

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
    

    /**
     * @return
     */
    public function getid_hotel() {
        return $this -> id_hotel;
    }
    

    /**
     * @return
     */
    public function getfecha_reserva() {
        return $this -> fecha_reserva;
    }
    

    /**
     * @return
     */
    public function getfecha_inicio() {
        return $this -> fecha_inicio;
    }
    

    /**
     * @return
     */
    public function getfecha_final() {
        return $this -> fecha_final;
    }
    
    
    public function reserva( $id_reserva="",$id_usuario="",$id_hotel="",$fecha_reserva="",$fecha_inicio="",$fecha_final="" ) {
        
$this -> id_reserva = $id_reserva;
$this -> id_usuario = $id_usuario;
$this -> id_hotel = $id_hotel;
$this -> fecha_reserva = $fecha_reserva;
$this -> fecha_inicio = $fecha_inicio;
$this -> fecha_final = $fecha_final;
$this -> conexion = new conexion();
$this -> reservaDAO = new reservaDAO($this->id_reserva,$this->id_usuario,$this->id_hotel,$this->fecha_reserva,$this->fecha_inicio,$this->fecha_final);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new reserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>