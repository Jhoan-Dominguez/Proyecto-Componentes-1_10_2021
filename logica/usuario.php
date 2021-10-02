<?php
require_once "persistencia/conexion.php";
require_once "persistencia/usuarioDAO.php";

class usuario {
    
private $id_usuario;
private $correo;
private $password_usuario;
private $estado_usuario;
private $conexion;
private $usuarioDAO;
    

    /**
     * @return
     */
    public function getid_usuario() {
        return $this -> id_usuario;
    }
    

    /**
     * @return
     */
    public function getcorreo() {
        return $this -> correo;
    }
    

    /**
     * @return
     */
    public function getpassword_usuario() {
        return $this -> password_usuario;
    }
    

    /**
     * @return
     */
    public function getestado_usuario() {
        return $this -> estado_usuario;
    }
    
    
    public function usuario( $id_usuario="",$correo="",$password_usuario="",$estado_usuario="" ) {
        
$this -> id_usuario = $id_usuario;
$this -> correo = $correo;
$this -> password_usuario = $password_usuario;
$this -> estado_usuario = $estado_usuario;
$this -> conexion = new conexion();
$this -> usuarioDAO = new usuarioDAO($this->id_usuario,$this->correo,$this->password_usuario,$this->estado_usuario);
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new usuario( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function buscarUsuario($correo, $password){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> buscarUsuario($correo, $password));
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new usuario( $resultado[0],$resultado[1],$resultado[2],$resultado[3] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }

    public function consultarTotalFilas() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarTotalFilas());
        $resultado = $this -> conexion -> extraer()[0];
        $this -> conexion -> cerrar();
        return $resultado;
    } 
    
    public function crear() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> crear());
        $this -> conexion -> cerrar();
    } 
    
}
?>
