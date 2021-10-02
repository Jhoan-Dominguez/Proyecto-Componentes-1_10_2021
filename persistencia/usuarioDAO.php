<?php
class usuarioDAO {

private $id_usuario;
private $correo ;
private $password_usuario;
private $estado_usuario;

public function usuarioDAO( $id_usuario="",$correo ="",$password_usuario="",$estado_usuario="" ) {

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
 '" .$this -> estado_usuario. "' 

)";
}

public function consultarTodos() {
    return "select * from usuario order by usuario.id_usuario asc ";
}

public function consultarTotalFilas() {
    return "select count(id_usuario) from usuario";
}

}
?>
