<!-- VER DATOS DE CONTACTO DEL RESIDENTE -->
<div id="ver-datos-contacto" style="display: none;">

  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Datos de Contacto del Residente</h1>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="padding-top: 5px;">
      <label>DNI del Residente:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <select class="custom-select" id="dni-residente-contacto">
          <option>Seleccione un DNI</option>
            <?php echo $opciones; ?>
        </select>
      </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-2 col-sm-2">
      <button type="button" class="btn btn-success" id="boton-ver-datos" >Ver Datos</button>
    </div>
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="card shadow mb-4" id="ver-tabla-datos" style="display: none; margin-top: 20px;">
    <div class="card-body">
      <div class="table-responsive">
        <table id="tabla-datos" class="table table-striped table-bordered " style="width:100%; ">
          <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Email</th>
              </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>