<?php
require_once "../persistencia/conexion.php";
require_once "../persistencia/usuarioDAO.php";

class usuario {
    
private $id_usuario;
private $correo_usuario;
private $password_usuario;
private $estado_usuario;
private $id_tipoUsuario;
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
    public function getcorreo_usuario() {
        return $this -> correo_usuario;
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
    

    /**
     * @return
     */
    public function getid_tipoUsuario() {
        return $this -> id_tipoUsuario;
    }
    
    
    public function usuario( $id_usuario="",$correo_usuario="",$password_usuario="",$estado_usuario="",$id_tipoUsuario="" ) {
        
        $this -> id_usuario = $id_usuario;
        $this -> correo_usuario = $correo_usuario;
        $this -> password_usuario = $password_usuario;
        $this -> estado_usuario = $estado_usuario;
        $this -> id_tipoUsuario = $id_tipoUsuario;
        $this -> conexion = new conexion();
        $this -> usuarioDAO = new usuarioDAO($this->id_usuario,$this->correo_usuario,$this->password_usuario,$this->estado_usuario,$this->id_tipoUsuario);
    }
    
    public function consultarusuario( $id_usuario ){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarusuario( $id_usuario ) );
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new usuario( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }    

    public function buscarCliente($id_usuario){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> buscarCliente($id_usuario));
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, array(
                "nombre_cliente" => $resultado[0],
                "direccion_cliente" => $resultado[1],
                "telefono_cliente" => $resultado[2],
                "correo" => $resultado[3],
                "password_usuario" => $resultado[4],
            ) );
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }

    public function updateInformation($id_usuario, $correo, $password){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> updateInformation($id_usuario, $correo, $password) );
        $this -> conexion -> cerrar();
    }

    public function restablecerPassword($id_usuario, $correo, $newPass){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> restablecerPassword($id_usuario, $correo, $newPass));
        $this -> conexion -> cerrar();
    }

    public function iniciarSesion($correo, $password){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> iniciarSesion($correo, $password));
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new usuario( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
        }
        $this -> conexion -> cerrar();
        return $valoresRetornar;
    }
    
    public function consultarTodos() {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarTodos());
        
        $valoresRetornar = array();
        while( ($resultado = $this -> conexion -> extraer()) != null) {
            array_push($valoresRetornar, new usuario( $resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4] ));
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
