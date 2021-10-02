<?php
class usuarioDAO {

private $id_usuario;
private $correo ;
private $password_usuario;
private $estado_usuario;

public function usuarioDAO( $id_usuario=0,$correo ="",$password_usuario="",$estado_usuario="" ) {

$this -> id_usuario = $id_usuario;
$this -> correo  = $correo ;
$this -> password_usuario = $password_usuario;
$this -> estado_usuario = $estado_usuario;
}

public function crear() {
return "
insert into usuario (correo ,password_usuario,estado_usuario)
values (
'" .$this -> correo . "',
'" .$this -> password_usuario. "',
" .$this -> estado_usuario. " 
)";
}

public function buscarUsuario($correo, $password){
    return "select * from usuario where usuario.correo = '".$correo."' 
            and usuario.password_usuario = '".$password."' and usuario.estado_usuario = 1 ";
}

public function datosUsuarioCliente($id_usuario){
    return "select * from usuario inner join cliente on usuario.id_usuario = cliente.id_usuario 
            where usuario.id_usuario = ".$id_usuario;
}

public function updateInformation($id_usuario, $correo, $password){
    return "update usuario set usuario.correo = '".$correo."', usuario.password_usuario = '".$password."'
            where usuario.id_usuario = ".$id_usuario;
}

public function restablecerPassword($id_usuario, $correo, $newPass){
    return "update usuario set usuario.password_usuario = '".$newPass."' where  usuario.correo = '".$correo."' and
            usuario.id_usuario = ".$id_usuario;
}

public function consultarTodos() {
    return "select * from usuario order by usuario.id_usuario asc ";
}

public function consultarTotalFilas() {
    return "select count(id_usuario) from usuario";
}

}
?>
