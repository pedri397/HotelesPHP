<?php 

class CerrarsessionController {
    
    public function cerrarSession() {
        //Si la session existe la destruye y redirije al index
        if($_SESSION["idUsuario"]){
            session_destroy();
            header("Location: index.php?action=usuariosDB&controller=Usuarios");
        }
    }
}

?>