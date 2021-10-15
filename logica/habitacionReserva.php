<?php
require_once "../persistencia/conexion.php";
require_once "../persistencia/habitacionReservaDAO.php";

class habitacionReserva {
    
private $id_habitacionReserva;
private $NhabitacioneS_habitacionReserva;
private $valor_habitacionReserva;
private $id_reserva;
private $id_habitacion;
private $conexion;
private $habitacionReservaDAO;
    

    /**
     * @return
     */
    public function getid_habitacionReserva() {
        return $this -> id_habitacionReserva;
    }
    

    /**
     * @return
     */
    public function getNhabitacioneS_habitacionReserva() {
        return $this -> NhabitacioneS_habitacionReserva;
    }
    

    /**
     * @return
     */
    public function getvalor_habitacionReserva() {
        return $this -> valor_habitacionReserva;
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
    public function getid_habitacion() {
        return $this -> id_habitacion;
    }
    
    
    public function habitacionReserva( $id_habitacionReserva="",$NhabitacioneS_habitacionReserva="",$valor_habitacionReserva="",$id_reserva="",$id_habitacion="" ) {
        
        $this -> id_habitacionReserva = $id_habitacionReserva;
        $this -> NhabitacioneS_habitacionReserva = $NhabitacioneS_habitacionReserva;
        $this -> valor_habitacionReserva = $valor_habitacionReserva;
        $this -> id_reserva = $id_reserva;
        $this -> id_habitacion = $id_habitacion;
        $this -> conexion = new conexion();
        $this -> habitacionReservaDAO = new habitacionReservaDAO($this->id_habitacionReserva,$this->NhabitacioneS_habitacionReserva,$this->valor_habitacionReserva,$this->id_reserva,$this->id_habitacion);
    }
    
public function consultarhabitacionReserva( $id_habitacionReserva ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionReservaDAO -> consultarhabitacionReserva( $id_habitacionReserva ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new habitacionReserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionReservaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new habitacionReserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionReservaDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> habitacionReservaDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>

