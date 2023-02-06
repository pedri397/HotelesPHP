<?php

require_once __DIR__ .'./../db/DB.php';

class UsuariosModel {
    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $db;


    public function __construct() {
        $this->db = new DB();
    }

    // Recupera la lista de tareas de la base de datos
//    public function getUsuarios() {
//        // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
//        $stmt = $this->pdo->prepare('SELECT * FROM usuarios');
//        $stmt->execute();
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }
    
    public function usuariosDB() {
        // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
        $query = $this->db->query("SELECT nombre, contraseña, id FROM usuarios WHERE nombre is not null");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function comprobarLogin($usu, $con) {
    
        $query = $this->db->query('SELECT nombre, contraseña, id FROM usuarios WHERE nombre = :nombre and contraseña = :con', [':nombre' => $usu, ":con" => $con]);
        return $query->fetch(PDO::FETCH_ASSOC);

    }

}
