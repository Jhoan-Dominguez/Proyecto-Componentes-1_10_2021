<?php
class tipoUsuarioDAO {
    
private $id_tipoUsuario;
private $perfil_tipoUsuario;
    
public function tipoUsuarioDAO( $id_tipoUsuario="",$perfil_tipoUsuario="" ) {
    
$this -> id_tipoUsuario = $id_tipoUsuario;
$this -> perfil_tipoUsuario = $perfil_tipoUsuario;
}

public function crear() {
return "
insert into tipoUsuario (perfil_tipoUsuario)
values (
 '" .$this -> perfil_tipoUsuario. "'

)";
}
    
public function consultartipoUsuario( $id_tipoUsuario ){
    return "select * from tipoUsuario where id_tipoUsuario = ". $id_tipoUsuario;
}    
    
public function consultarTodos() {
    return "select * from tipoUsuario order by tipoUsuario.id_tipoUsuario asc ";
}

public function consultarTotalFilas() {
    return "select count(id_tipoUsuario) from tipoUsuario";
}

}
?>
