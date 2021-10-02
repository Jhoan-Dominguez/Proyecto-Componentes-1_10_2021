<?php
require_once "../persistencia/conexion.php";
require_once "../persistencia/clienteDAO.php";

class cliente {
    
private $id_cliente;
private $nombre_cliente;
private $direccion_cliente;
private $telefono_cliente;
private $id_usuario;
private $conexion;
private $clienteDAO;
    

    /**
     * @return
     */
    public function getid_cliente() {
        return $this -> id_cliente;
    }
    

    /**
     * @return
     */
    public function getnombre_cliente() {
        return $this -> nombre_cliente;
    }
    

    /**
     * @return
     */
    public function getdireccion_cliente() {
        return $this -> direccion_cliente;
    }
    

    /**
     * @return
     */
    public function gettelefono_cliente() {
        return $this -> telefono_cliente;
    }
    

    /**
     * @return
     */
    public function getid_usuario() {
        return $this -> id_usuario;
    }
    
    
    public function cliente( $id_cliente="",$nombre_cliente="",$direccion_cliente="",$telefono_cliente="",$id_usuario="" ) {
        
        $this -> id_cliente = $id_cliente;
        $this -> nombre_cliente = $nombre_cliente;
        $this -> direccion_cliente = $direccion_cliente;
        $this -> telefono_cliente = $telefono_cliente;
        $this -> id_usuario = $id_usuario;
        $this -> conexion = new conexion();
        $this -> clienteDAO = new clienteDAO($this->id_cliente,$this->nombre_cliente,$this->direccion_cliente,$this->telefono_cliente,$this->id_usuario);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new cliente( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function updateInformation($id_usuario, $nombre_cliente, $direccion_cliente,$telefono_cliente){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> updateInformation($id_usuario, $nombre_cliente, $direccion_cliente,$telefono_cliente));
        $this -> conexion -> cerrar();
    }

    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>