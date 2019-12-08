<!-- MODIFICAR DATOS DEL RESIDENTE -->
<div id="ver-modificar-residente" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Modificar Residente</h1>
  </div>

  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-2" style="padding-top: 5px;">
      <label>DNI Residente:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-10">
      <select class="custom-select" id="dni-modificar-residente">
        <option>Seleccione un DNI</option>
          <?php echo $opciones; ?>
      </select>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-0"></div>
  </div>

  <div class="row" style="padding-top: 30px;">
    <div class="col-12 mb-4 text-center" style="font-weight: bold; font-size: 1.15rem; color: #0062cc;">Datos del Residente:</div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>DNI:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <input type="text" class="form-control" id="dni-res-modificado" placeholder="" readonly>
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Nombre:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" class="form-control" id="nombre-res-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Primer Apellido:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <input type="text" class="form-control" id="apellido1-res-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Segundo Apellido:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" class="form-control" id="apellido2-res-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Edad:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <input type="number" class="form-control" id="edad-res-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Discapacidad:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-braille"></i></span>
        </div>
        <input type="text" class="form-control" id="discapacidad-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Situación Médica:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-heartbeat"></i></span>
        </div>
        <input type="text" class="form-control" id="situacion-modificado" placeholder="">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mb-4 mt-4 text-center" style="font-weight: bold; font-size: 1.15rem; color: #0062cc;">Datos Persona de Contacto:</div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Nombre:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <input type="text" class="form-control" id="nombre-contacto-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Apellidos:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" class="form-control" id="apellido-contacto-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Dirección:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <input type="text" class="form-control" id="direccion-contacto-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Teléfono:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-phone"></i></span>
        </div>
        <input type="text" class="form-control" id="tlf-contacto-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Email:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
        </div>
        <input type="text" name="email-contacto" class="form-control" id="email-contacto-modificado" placeholder="">
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-modificar-residente">Modificar Residente</button>
    </div>
  </div>
</div>