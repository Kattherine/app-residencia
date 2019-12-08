<!-- INSERTAR HABITACION LIMPIADA -->
<div id="ver-insertar-limpieza" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Limpieza de Habitaciones</h1>
  </div>

  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-0 col-sm-0"></div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4" style="padding-top: 5px;">
      <label>Número Habitación:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-8" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <select class="custom-select" id="id-habitacion">
          <option value="0">Seleccione una habitación</option>
        </select>
      </div>
    </div>
    <div class="col-xl-3 col-lg-2 col-md-0 col-sm-0"></div>
  </div>

  <div class="card shadow mb-4" style="margin-top: 20px;"> 
    <div class="card-header text-center">
      <h6 class="m-0 ">Observaciones:</h6>
    </div>
    <div class="card-body">
      <div class="summernote" id="texto-limpieza"></div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-limpieza-habitacion">Agregar</button>
    </div>
  </div>

</div>