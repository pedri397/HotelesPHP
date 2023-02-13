<?php 

class ReservasController {

    private $model;
    private $view;


    public function __construct(){
        $this->model = new ReservasModel();
        $this->view = new ReservasView();
    }

    public function reservarHabi() {
        if(isset($_SESSION["idUsuario"])){
        $this->view->mostrarHeader();

        $resTipo = filtrarInput("tipo", "POST");
        $resPrecio = filtrarInput("precio", "POST");
        $resDescripcion = filtrarInput("descripcion", "POST");
        $resId = filtrarInput("idHabitacion", "POST");
        $resIdhotel = filtrarInput("idHotel", "POST");

        $this->view->mostrarInfoReser($resTipo, $resPrecio, $resDescripcion); 
        $this->view->fechasReservas($resId, $resIdhotel);
        }else {
            header("Location: index.php?action=usuariosDB&controller=Usuarios");
        }
    }

    public function listarReservas() {
        if(isset($_SESSION["idUsuario"])){
        $this->view->mostrarHeader();

        $libre = true;

        $resId = filtrarInput("idReser", "POST");
        $resIdHotel = filtrarInput("idHotelReser", "POST");
        $diaEntrada = filtrarInput("diaEntrada", "POST");
        $diaSalida = filtrarInput("diaSalida", "POST");
        $idUsuario = $_SESSION["idUsuario"];

        $reservasComparar = $this->model->getReservas($resId);
        


        foreach ($reservasComparar as $reser) {
            //Si esto se cumple la variable no cambia a false lo cual se hace el insert en la condicion de abajo
            if(($diaEntrada < $reser["fecha_entrada"] && $diaSalida < $reser["fecha_salida"]) || ($diaEntrada > $reser["fecha_entrada"] && $diaSalida > $reser["fecha_salida"])){

            }else {
                $libre = false;
                $this->view->errorReserva();
            }
        }

        if($libre){
            $this->model->insertarReserva($idUsuario, $resIdHotel, $resId, $diaEntrada, $diaSalida);
        }
        
        $reservas = $this->model->listarReservas($idUsuario);   

        $this->view->listarReservas($reservas);

    }else {
        header("Location: index.php?action=usuariosDB&controller=Usuarios");
    }
    }
}

?>