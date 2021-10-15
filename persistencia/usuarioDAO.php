<?php
class usuarioDAO {
    
private $id_usuario;
private $correo_usuario;
private $password_usuario;
private $estado_usuario;
private $id_tipoUsuario;
    
public function usuarioDAO( $id_usuario="",$correo_usuario="",$password_usuario="",$estado_usuario="",$id_tipoUsuario="" ) {
    
    $this -> id_usuario = $id_usuario;
    $this -> correo_usuario = $correo_usuario;
    $this -> password_usuario = $password_usuario;
    $this -> estado_usuario = $estado_usuario;
    $this -> id_tipoUsuario = $id_tipoUsuario;

}

public function crear() {
    return "
    insert into usuario (correo_usuario,password_usuario,estado_usuario,id_tipoUsuario)
    values (
    '" .$this -> correo_usuario. "', 
    '" .$this -> password_usuario. "', 
    " .$this -> estado_usuario. ", 
    " .$this -> id_tipoUsuario. "

    )";
}
    
public function consultarusuario( $id_usuario ){
    return "select * from usuario where id_usuario = ". $id_usuario;
}   

function buscarCliente($id_usuario){
    return "
        select cliente.nombre_cliente, cliente.direccion_cliente, cliente.telefono_cliente, usuario.correo_usuario,
        usuario.password_usuario from usuario inner join cliente on usuario.id_usuario = cliente.id_usuario 
        where usuario.id_usuario = ".$id_usuario;
}

public function updateInformation($id_usuario, $correo, $password){
    return "update usuario set usuario.correo_usuario = '".$correo."', usuario.password_usuario = '".$password."'
            where usuario.id_usuario = ".$id_usuario;
}

public function restablecerPassword($id_usuario, $correo, $newPass){
    return "update usuario set usuario.password_usuario = '".$newPass."' where  usuario.correo_usuario = '".$correo."' and
            usuario.id_usuario = ".$id_usuario;
}

function iniciarSesion($correo, $password){
    return "select * from usuario where correo_usuario = '".$correo."' and password_usuario = '".$password."'";
}
    
public function consultarTodos() {
    return "select * from usuario order by usuario.id_usuario asc ";
}

public function consultarTotalFilas() {
    return "select count(id_usuario) from usuario";
}

}
?>
