<?php 

class ReservasController {

    private $model;
    private $view;


    public function __construct(){
        $this->model = new ReservasModel();
        $this->view = new ReservasView();
    }

    public function listarReservas() {
        
    }
}

?>