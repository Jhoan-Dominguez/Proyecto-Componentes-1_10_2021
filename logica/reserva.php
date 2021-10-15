<?php
require_once "../persistencia/conexion.php";
require_once "../persistencia/reservaDAO.php";

class reserva {
    
private $id_reserva;
private $fecha_reserva;
private $fechaInicio_reserva;
private $fechaFinal_reserva;
private $Vhabitaciones_reserva;
private $Vservicios_reserva;
private $id_usuario;
private $id_hotel;
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
    public function getfecha_reserva() {
        return $this -> fecha_reserva;
    }
    

    /**
     * @return
     */
    public function getfechaInicio_reserva() {
        return $this -> fechaInicio_reserva;
    }
    

    /**
     * @return
     */
    public function getfechaFinal_reserva() {
        return $this -> fechaFinal_reserva;
    }
    

    /**
     * @return
     */
    public function getVhabitaciones_reserva() {
        return $this -> Vhabitaciones_reserva;
    }
    

    /**
     * @return
     */
    public function getVservicios_reserva() {
        return $this -> Vservicios_reserva;
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
    
    
    public function reserva( $id_reserva="",$fecha_reserva="",$fechaInicio_reserva="",$fechaFinal_reserva="",$Vhabitaciones_reserva="",$Vservicios_reserva="",$id_usuario="",$id_hotel="" ) {
        
        $this -> id_reserva = $id_reserva;
        $this -> fecha_reserva = $fecha_reserva;
        $this -> fechaInicio_reserva = $fechaInicio_reserva;
        $this -> fechaFinal_reserva = $fechaFinal_reserva;
        $this -> Vhabitaciones_reserva = $Vhabitaciones_reserva;
        $this -> Vservicios_reserva = $Vservicios_reserva;
        $this -> id_usuario = $id_usuario;
        $this -> id_hotel = $id_hotel;
        $this -> conexion = new conexion();
        $this -> reservaDAO = new reservaDAO($this->id_reserva,$this->fecha_reserva,$this->fechaInicio_reserva,$this->fechaFinal_reserva,$this->Vhabitaciones_reserva,$this->Vservicios_reserva,$this->id_usuario,$this->id_hotel);
    }

    public function buscarReservas($id_usuario){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> buscarReservas( $id_usuario ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, array(
                "id_reserva" => $resultado[0],
                "fecha_reserva" => $resultado[1], 
                "fechaInicio_reserva" => $resultado[2],
                "fechaFinal_reserva" => $resultado[3],
                "Vhabitaciones_reserva" => $resultado[4],
                "Vservicios_reserva" => $resultado[5],
                "id_usuario" => $resultado[6], 
                "id_hotel" => $resultado[7] ) );
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
public function consultarreserva( $id_reserva ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarreserva( $id_reserva ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new reserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6],$resultado[7] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> reservaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new reserva( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6],$resultado[7] ));
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
