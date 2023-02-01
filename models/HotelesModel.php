<?php

require_once __DIR__ .'./../db/DB.php';

class HotelesModel {
    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $db;


    public function __construct() {
        $this->db = new DB();
    }

    // Recupera la lista de tareas de la base de datos
    public function getHoteles() {
        // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
        $query = $this->db->query('SELECT * FROM hoteles');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHabitaciones($id) {
        $query = $this->db->query('SELECT * FROM habitaciones WHERE id_hotel = :id', [':id' => $id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

