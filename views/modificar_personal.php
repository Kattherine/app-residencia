<!-- MODIFICAR DATOS DE PERSONAL -->
<div id="ver-modificar-personal" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Modificar Personal</h1>
  </div>

  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-2" style="padding-top: 5px;">
      <label>DNI Personal:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-10">
      <select class="custom-select" id="dni-modificar-personal">
        <option>Seleccione un DNI</option>
        <?php 
        while($data = mysqli_fetch_assoc($rs_dni)){
        ?>
           <option value="<?php echo $data['dni_personal'] ?>"><?php echo $data['dni_personal'] ?></option>
        <?php 
          }
        ?>
      </select>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-0"></div>
  </div>
    
  <div class="row" style="padding-top: 30px;">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>DNI:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <input type="text" name="dni-modificado" class="form-control" id="dni-modificado" placeholder="" readonly>
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Nombre:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" name="nombre-modificado" class="form-control" id="nombre-modificado" placeholder="">
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
        <input type="text" name="apellido1-modificado" class="form-control" id="apellido1-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Segundo Apellido:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" name="apellido2-modificado" class="form-control" id="apellido2-modificado" placeholder="">
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
        <select class="custom-select" id="cargo-modificado">
          <option selected>Seleccione un cargo:</option>
          <option value="jefe">Director</option>
          <option value="auxiliar">Auxiliar</option>
          <option value="medico">Medico</option>
          <option value="enfermero">Enfermero</option>
          <option value="limpieza">Limpieza</option>
          <option value="fisioterapeuta">Fisioterapeuta</option>
          <option value="terapeuta">Terapeuta Ocupacional</option>
          <option value="psicologo">Psicologo</option>
          <option value="trabajadorsocial">Trabajador Social</option>
        </select>
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Tipo:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <input type="text" name="tipo-modificado" class="form-control" id="tipo-modificado" placeholder="Tipo de responsabilidad">
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
        <input type="text" name="usuario-modificado" class="form-control" id="usuario-modificado" placeholder="">
      </div>
    </div>
    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="padding-top: 5px;">
      <label>Contraseña:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-key"></i></span>
        </div>
        <input type="password" name="contrasena-modificado" class="form-control" id="contrasena-modificado" placeholder="">
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
        <select class="custom-select" id="horario-modificado">
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
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="ver-especialidad-mod" style="display: none; padding-top: 5px;">
      <label>Especialidad:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" id="ver-especialidad-mod1" style="display: none;">
      <div class="input-group form-group">
        <input type="text" name="especialidad-modificado" class="form-control" id="especialidad-modificado" placeholder="" value="">
      </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="ver-planta-mod" style="display: none; padding-top: 5px;">
      <label>Planta:</label>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10" id="ver-planta-mod1" style="display: none;">
      <div class="input-group form-group">
        <input type="number" min="0" name="planta-modificado" class="form-control" id="planta-modificado" placeholder="">
      </div>
    </div>

    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="custom-control custom-checkbox" style="cursor: pointer;">
    <input type="checkbox" class="custom-control-input" id="activado-personal" value="historial" style="cursor: pointer;">
    <label class="custom-control-label" for="activado-personal" style="cursor: pointer;">Activo/Inactivo</label>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-modificar-personal" >Modificar Personal</button>
    </div>
  </div>

</div>