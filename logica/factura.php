<?php
require_once "persistencia/conexion.php";
require_once "persistencia/facturaDAO.php";

class factura {
    
private $id_factura;
private $fechaPago_factura;
private $Vtotal_factura;
private $id_usuario;
private $id_reserva;
private $conexion;
private $facturaDAO;
    

    /**
     * @return
     */
    public function getid_factura() {
        return $this -> id_factura;
    }
    

    /**
     * @return
     */
    public function getfechaPago_factura() {
        return $this -> fechaPago_factura;
    }
    

    /**
     * @return
     */
    public function getVtotal_factura() {
        return $this -> Vtotal_factura;
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
    public function getid_reserva() {
        return $this -> id_reserva;
    }
    
    
    public function factura( $id_factura="",$fechaPago_factura="",$Vtotal_factura="",$id_usuario="",$id_reserva="" ) {
        
        $this -> id_factura = $id_factura;
        $this -> fechaPago_factura = $fechaPago_factura;
        $this -> Vtotal_factura = $Vtotal_factura;
        $this -> id_usuario = $id_usuario;
        $this -> id_reserva = $id_reserva;
        $this -> conexion = new conexion();
        $this -> facturaDAO = new facturaDAO($this->id_factura,$this->fechaPago_factura,$this->Vtotal_factura,$this->id_usuario,$this->id_reserva);
    }
    
public function consultarfactura( $id_factura ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> consultarfactura( $id_factura ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new factura( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new factura( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> facturaDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
