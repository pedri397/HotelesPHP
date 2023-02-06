<?php

require_once __DIR__ .'./../db/DB.php';

class ReservasModel {
    // Obtiene una instancia de PDO para conectarse a la base de datos
    private $db;


    public function __construct() {
        $this->db = new DB();
    }

    public function getReservas($id) {
        $query = $this->db->query('SELECT * FROM reservas WHERE id_usuario = :id', [':id' => $id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarReserva($idUsuario, $idHotel, $idHabitacion, $fechaEntrada, $fechaSalida) {
        $query = $this->db->query("INSERT INTO reservas (id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) VALUES ('$idUsuario', '$idHotel', '$idHabitacion', '$fechaEntrada', '$fechaSalida')");
    }

    public function listarReservas($id) {
        $query = $this->db->query('SELECT reservas.id, nombre, tipo, fecha_entrada, fecha_salida FROM `reservas` INNER JOIN hoteles on hoteles.id = reservas.id_hotel INNER JOIN habitaciones on habitaciones.id = reservas.id_habitacion WHERE reservas.id_usuario = '.$id.'');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}

    ?>