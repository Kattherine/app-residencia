<!-- MOVER EL RESIDENTE DE HABITACION-->
<div id="ver-mover-habitacion" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Mover Habitación</h1>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>DNI Residente:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group mb-3">
        <select class="custom-select" id="dni-residente-mover">
          <option>Seleccione un DNI</option>
            <?php echo $opciones; ?>
        </select>
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Habitación:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="number" class="form-control" id="numero-mover" placeholder="Número de la habitación">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-mover-habitacion" >Mover Residente</button>
    </div>
  </div>

</div>