<?php

class HotelesController {
    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HotelesModel();
        $this->view = new HotelesView();
    }

    // Muestra la lista de tareas
    public function listar() {
        $this->view->mostrarHeader();
        $hoteles = $this->model->getHoteles();
        $this->view->listarHoteles($hoteles);
        
    }

    public function mostrarReservas() {
        $this->view->mostrarHeader();
        $habitaciones = $this->model->getHabitaciones();
        print_r($habitaciones);
        $this->view->listarHabitaciones($habitaciones);
    }
}

