<?php


class UsuariosController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }

    
    public function usuariosDB() {
        if(isset($_SESSION["idUsuario"])){
            header("Location: index.php?action=listar&controller=Hoteles");
        }else {
            // Muestra la vista de la lista de tareas
            $this->view->mostrarIniciarSesion();
    
            $usuario = filtrarInput("usuario", "POST");
            $contra = filtrarInput("contrasena", "POST");
            
            // Recupera la lista de tareas del modelo
            if($usuario){
                $usuarios = $this->model->comprobarLogin($usuario, $contra);
                $_SESSION["idUsuario"] = $usuarios["id"];
                if($usuarios){
                    header("Location: index.php?action=listar&controller=Hoteles");
                }else{
                    header("Location: index.php?action=loginError&controller=Usuarios");
                }
    
            }

        }

    }

    public function loginError() {

        $this->view->mostrarContraseñaError();

        $usuario = filtrarInput("usuario", "POST");
        $contra = filtrarInput("contrasena", "POST");
        
        // Recupera la lista de tareas del modelo
        if($usuario){
            $usuarios = $this->model->comprobarLogin($usuario, $contra);
            if($usuarios){
                header("Location: index.php?action=listar&controller=Hoteles");
            }else{
                header("Location: index.php?action=loginError&controller=Usuarios");
            }

        }
    }
}
