<?php

require_once __DIR__ .'./../db/DB.php';

class ReservasModel {
    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $db;


    public function __construct() {
        $this->db = new DB();
    }

    public function getReservas() {
        $query = $this->db->query('SELECT * FROM ');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

    ?>