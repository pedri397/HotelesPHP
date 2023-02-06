<?php 

class ReservasController {

    private $model;
    private $view;


    public function __construct(){
        $this->model = new ReservasModel();
        $this->view = new ReservasView();
    }

    public function reservarHabi() {
        $this->view->mostrarHeader();

        $resTipo = filtrarInput("tipo", "POST");
        $resPrecio = filtrarInput("precio", "POST");
        $resDescripcion = filtrarInput("descripcion", "POST");
        $resId = filtrarInput("idHabitacion", "POST");
        $resIdhotel = filtrarInput("idHotel", "POST");

        $this->view->mostrarInfoReser($resTipo, $resPrecio, $resDescripcion); 
        $this->view->fechasReservas($resId, $resIdhotel);
    }

    public function listarReservas() {
        $this->view->mostrarHeader();

        $resId = filtrarInput("idReser", "POST");
        $resIdHotel = filtrarInput("idHotelReser", "POST");
        $diaEntrada = filtrarInput("diaEntrada", "POST");
        $diaSalida = filtrarInput("diaSalida", "POST");
        $idUsuario = $_SESSION["idUsuario"];

        $libre = $this->model->comprobarFechas($diaEntrada, $diaSalida, $idUsuario);

        $this->model->insertarReserva($idUsuario, $resIdHotel, $resId, $diaEntrada, $diaSalida);

  
        $reservas = $this->model->listarReservas($idUsuario);   
        // print_r($reservas);
        $this->view->listarReservas($reservas);
    }
}

?>