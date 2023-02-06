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

        // if (isset($_POST['nombre']) || isset($_POST['contraseña'])) {
        //     $nombre = $_POST['nombre'];
        //     $contraseña = $_POST['contraseña'];
        //     echo $nombre;
        //     echo $contraseña;

        //     foreach ($usuarios as $usuario) {
        //         $codigo = $usuario["id"];
        //         $nom = $usuario["nombre"];
        //         $clave = $usuario["contraseña"];
        //         $rol = $usuario["fecha_registro"];

        //         if (isset($nombre) || isset($contraseña)) {

        //             if ($nombre == $nom && $contraseña == $clave) {
        //                 if (!isset($_COOKIE["nombre"])) {
        //                     setcookie("nombre", $nom, time() + 3600 * 24);
        //                 } else {
        //                     $conexion = (int) $_COOKIE["nombre"];
        //                     setcookie("nombre", $nom, time() + 3600 * 24);
        //                 }

        //                 if (!isset($_COOKIE["clave"])) {
        //                     setcookie("clave", $clave, time() + 3600 * 24);
        //                 } else {
        //                     $conexion = (int) $_COOKIE["clave"];
        //                     setcookie("clave", $clave, time() + 3600 * 24);
        //                 }
                        // header("Location: index.php?action=listar&controller=Hoteles");
        //             }
        //         }
        //     }
        //     echo "<p class='error'>Nombre/Contraseña incorrecto</p>";
        // }
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
