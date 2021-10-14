<?php
require_once "persistencia/conexion.php";
require_once "persistencia/tipoUsuarioDAO.php";

class tipoUsuario {
    
private $id_tipoUsuario;
private $perfil_tipoUsuario;
private $conexion;
private $tipoUsuarioDAO;
    

    /**
     * @return
     */
    public function getid_tipoUsuario() {
        return $this -> id_tipoUsuario;
    }
    

    /**
     * @return
     */
    public function getperfil_tipoUsuario() {
        return $this -> perfil_tipoUsuario;
    }
    
    
    public function tipoUsuario( $id_tipoUsuario="",$perfil_tipoUsuario="" ) {
        
$this -> id_tipoUsuario = $id_tipoUsuario;
$this -> perfil_tipoUsuario = $perfil_tipoUsuario;
$this -> conexion = new conexion();
$this -> tipoUsuarioDAO = new tipoUsuarioDAO($this->id_tipoUsuario,$this->perfil_tipoUsuario);
    }
    
public function consultartipoUsuario( $id_tipoUsuario ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoUsuarioDAO -> consultartipoUsuario( $id_tipoUsuario ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new tipoUsuario( $resultado[0],$resultado[1] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
}    
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoUsuarioDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new tipoUsuario( $resultado[0],$resultado[1] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoUsuarioDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoUsuarioDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>