<?php

class ReservasView {

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

    public function mostrarInfoReser($tipo, $precio, $descripcion) {

        echo '
            <div class="card_reser position-relative bg-light rounded p-2 bg-dark">
                <img src="image/hotel.jpg" class="w-100">
                <label class="list-group-item py-3 text-center text-light" for="listGroupRadioGrid1">
                    <strong class="fw-semibold">'.$tipo.'</strong>
                    <span class="d-block small opacity-75">'.$precio.' €</span>
                    <span class="d-block small opacity-75">'.$descripcion.'</span>
            </label>
          </div>';
    }

    public function fechasReservas($id, $idHotel) {
        echo '<div class="card_reser d-flex flex-column bg-light rounded p-2 bg-dark">
        <form action="index.php?action=listarReservas&controller=Reservas" method="post">
        <label class="list-group-item py-3 text-center text-light">Dia de entrada</label>
        <input type="date" name="diaEntrada">
        <label class="list-group-item py-3 text-center text-light">Dia de salida</label>
        <input type="date" name="diaSalida">
        <br>
        <input type="hidden" name="idReser" value="'.$id.'">
        <input type="hidden" name="idHotelReser" value="'.$idHotel.'">
        <button type="submit" class="btn btn-sm btn-outline-secondary fs-5 mt-3">Reservar</button>
        </form>
        </div>';
      }

      public function listarReservas($reservas) {
        echo '<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Hotel</th>
            <th scope="col">Habitacion</th>
            <th scope="col">Fecha Entrada</th>
            <th scope="col">Fecha Salida</th>
          </tr>
        </thead>
        <tbody>';
        foreach ($reservas as $reser) {
            echo '<tr>
            <th scope="row">'.$reser["id"].'</th>
            <td class="text-light">'.$reser["nombre"].'</td>
            <td class="text-light">'.$reser["tipo"].'</td>
            <td class="text-light">'.$reser["fecha_entrada"].'</td>
            <td class="text-light">'.$reser["fecha_salida"].'</td>
          </tr>';
        }
        echo '</tbody>
        </table>';
      }

}

?>