<?php 

class CerrarsessionController {
    
    public function cerrarSession() {

        if($_SESSION["idUsuario"]){
            session_destroy();
            header("Location: index.php?action=usuariosDB&controller=Usuarios");
        }
    }
}

?>