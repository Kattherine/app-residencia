<!-- ALTA DE PERSONAL -->
<div id="ver-alta-personal" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Alta Personal</h1>
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
        <input type="text" name="dni" class="form-control" id="dni" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Nombre:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="">
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
        <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Segundo Apellido:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Cargo:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group mb-3">
        <select class="custom-select" id="cargo">
          <option value="0">Seleccione un cargo:</option>
          <option value="auxiliar">Auxiliar</option>
          <option value="medico">Medico</option>
          <option value="enfermero">Enfermero</option>
          <option value="limpieza">Limpieza</option>
          <option value="Fisioterapeuta">Fisioterapeuta</option>
          <option value="Terapeuta Ocupacional">Terapeuta Ocupacional</option>
          <option value="Psicologo">Psicologo</option>
          <option value="Trabajador Social">Trabajador Social</option>
        </select>
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Tipo:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Tipo de responsabilidad">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Usuario:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Contraseña:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
        </div>
        <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="ver-horario" style="padding-top: 5px;">
        <label>Horario:</label>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" id="ver-horario1">
        <div class="input-group mb-3">
          <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
          </div>
          <select class="custom-select" id="horario">
            <option value="Diurno">Diurno</option>
            <option value="Vespertino">Vespertino</option>
            <option value="Nocturno">Nocturno</option>
            <option value="Fin de Semana Diurno">Fines de Semana Diurno</option>
            <option value="Fin de Semana Vespertino">Fines de Semana Vespertino</option>
            <option value="Fin de Semana Nocturno">Fines de Semana Nocturno</option>
          </select>
        </div>
      </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="ver-especialidad" style="display: none; padding-top: 5px;">
      <label>Especialidad:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" id="ver-especialidad1" style="display: none;">
      <div class="input-group form-group">
        <input type="text" name="especialidad" class="form-control" id="especialidad" placeholder="" value="">
      </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="ver-planta" style="display: none; padding-top: 5px;">
      <label>Planta:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" id="ver-planta1" style="display: none;">
      <div class="input-group form-group">
        <input type="number" min="0" name="planta" class="form-control" id="planta" placeholder="">
      </div>
    </div>

    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-alta-personal" >Alta Personal</button>
    </div>
  </div>
</div>