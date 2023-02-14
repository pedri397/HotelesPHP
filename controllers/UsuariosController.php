<?php


class UsuariosController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;
    //Constructor del Controller
    public function __construct() {
        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }

    
    public function usuariosDB() {
        //Si la session existe le manda al home si no tendra que logearse
        if(isset($_SESSION["idUsuario"])){
            header("Location: index.php?action=listar&controller=Hoteles");
        }else {
            // Muestra la vista de la lista de tareas
            $this->view->mostrarIniciarSesion();
            //Guardamos las variables enviadas por el formulario y las filtramos
            $usuario = filtrarInput("usuario", "POST");
            $contra = filtrarInput("contrasena", "POST");
            
            // Si el usuario existe comparamos el usuario y la contraseña
            if($usuario){
                $usuarios = $this->model->comprobarLogin($usuario, $contra);
                $_SESSION["idUsuario"] = $usuarios["id"];
                //En caso de que el usuario exista le redirijira al home 
                if($usuarios){
                    header("Location: index.php?action=listar&controller=Hoteles");
                    //En caso de que no exista le redirijira al login 
                }else{
                    header("Location: index.php?action=loginError&controller=Usuarios");
                }
            }
        }
    }

    public function loginError() {
        //Muestra el mensaje de error
        $this->view->mostrarContraseñaError();
        //Hace lo mismo que la funcion anterior 
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
