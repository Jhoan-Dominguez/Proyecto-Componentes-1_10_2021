<?php
class usuarioDAO {
    
private $id_usuario;
private $password_usuario;
private $estado_usuario;
    
public function usuarioDAO( $id_usuario="",$password_usuario="",$estado_usuario="" ) {
    
$this -> id_usuario = $id_usuario;
$this -> password_usuario = $password_usuario;
$this -> estado_usuario = $estado_usuario;
}

public function crear() {
return "
insert into usuario (password_usuario,estado_usuario)
values (
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
