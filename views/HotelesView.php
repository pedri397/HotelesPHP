<?php

class HotelesView {


    public function mostrarHeader() {
        echo '<header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
    
            <div class="text-end">
              <button type="button" class="btn btn-warning">Cerrar Sessión</button>
            </div>
          </div>
        </div>
      </header>';
    }

    public function listarHoteles($hoteles){

        echo '<div class=" d-flex justify-content-center gap-5 mt-5">';

        foreach ($hoteles as $hotel) {
           
            echo '<div class="">
            <div class="card shadow-sm bg-dark p-2">
              <img class="img_tamaño" src="image/hotel.jpg">
              <div class="card-body">
                <p class="text-light text"><span>Nombre: </span>'.$hotel["nombre"].'</p>
                <p class="text-light text">Dirección: '.$hotel["direccion"].'</p>
                <p class="text-light text">Ciudad: '.$hotel["ciudad"].'</p>
                <p class="text-light text">Pais: '.$hotel["pais"].'</p>
                <p class="text-light text">Numero de Habitaciones: '.$hotel["num_habitaciones"].'</p>
                <p class="text-light text">Descripción: '.$hotel["descripcion"].'</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  <form action="index.php?action=mostrarReservas&controller=Hoteles" method="post">
                  <input name="idHotel" type="hidden" value='.$hotel["id"].'>
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Ver Habitaciones</button>
                    </form>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>';
        }

        echo "</div>";
    }

    public function listarHabitaciones($habitaciones) {


        foreach ($habitaciones as $habitacion) {
            echo '<div class="card_reser position-relative bg-light rounded p-2">
            <img src="image/hotel.jpg" class="img_reservas">
            <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid1">
              <strong class="fw-semibold">'.$habitacion["tipo"].'</strong>
              <span class="d-block small opacity-75">'.$habitacion["precio"].' €</span>
              <span class="d-block small opacity-75">'.$habitacion["descripcion"].'</span>
              <form action="index.php?action=listarReservas&controller=Reservas">
              <input type="hidden" name="idHabitacion" value="'.$habitacion["id"].'">
              <input type="hidden" name="idHotel" value="'.$habitacion["id_hotel"].'">
              <button type="submit" class="btn btn-sm btn-outline-secondary mt-3">Reservar</button>
                </form>
            </label>
          </div>';
        }
    
    }
}
?>