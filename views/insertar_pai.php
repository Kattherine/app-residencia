<!-- AGREGAR PLAN DE ATENCION INDIVIDUALIZADO -->
<div id="ver-agregar-plan" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Agregar Plan</h1>
  </div>

  <div class="row" id="alerta-plan" style="display: none">
    <div class="col-12 text-center">
      <div class="alert alert-danger" role="alert" >
        Este Residente ya tiene un PAI (no podrá agregar otro).
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="padding-top: 5px;">
      <label>DNI Residente:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <select class="custom-select" id="dni-agregar-plan">
          <option value="0">Seleccione un DNI</option>
            <?php echo $opciones; ?>
        </select>
      </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-2 col-sm-2">
      <button type="button" class="btn btn-success" id="boton-cargar-pai">Cargar</button>
    </div>
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <!-- Datos Residente -->
  <div class="card shadow mt-4" id="ver-tabla-datos" style="margin-top: 20px;">
    <div class="card-header text-center">
      <h6 class="m-0 font-weight-bold text-primary">Datos Residentes</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>DNI:</label>
          <div class="input-group form-group">
            <div class="input-group-prepend ">
              <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
            </div>
            <input type="text" class="form-control" id="dni-pai" placeholder="" readonly>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Nombre y Apellidos:</label>
          <div class="input-group form-group">
            <input type="text" class="form-control" id="nombre-pai" placeholder="" readonly>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Familiar de Referencia:</label>
          <div class="input-group form-group">
            <input type="text" class="form-control" id="familiar-pai" readonly>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Contacto:</label>
          <div class="input-group form-group">
            <div class="input-group-prepend ">
              <span class="input-group-text"><i class="fa fa-phone"></i></span>
            </div>
            <input type="text" class="form-control" id="contacto-pai" readonly>
          </div>
        </div>
      </div>
  
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Fecha de Ingreso:</label>
          <div class="input-group form-group">
            <div class="input-group-prepend ">
              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" id="fecha-inicio" readonly>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Fecha de Elaboración:</label>
          <div class="input-group form-group">
            <div class="input-group-prepend ">
              <span class="input-group-text"><i class="fa fa-calendar-minus-o"></i></span>
            </div>
            <input type="text" class="form-control" id="fecha-elaboracion" readonly>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Fecha de Evaluación:</label>
          <div class="input-group form-group">
            <div class="input-group-prepend ">
              <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
            </div>
            <input type="text" class="form-control" id="fecha-evaluacion" readonly>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Área Social -->
  <div class="card shadow mt-4" id="ver-tabla-datos" style="margin-top: 20px;">
    <div class="card-header text-center">
      <h6 class="m-0 font-weight-bold text-primary">Área Social</h6>
    </div>
    <div class="card-body">

      <div id="area-social"></div>

    </div>
  </div>

  <!-- Área Sanitaria -->
  <div class="card shadow mt-4" id="ver-tabla-datos" style="margin-top: 20px;">
    <div class="card-header text-center">
      <h6 class="m-0 font-weight-bold text-primary">Área Sanitaria</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Tratamiento:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="tratamiento" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Estado nutricional/ hidratación:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="nutricional" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Sueño - Agitación:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="sueno" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Dolor:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="dolor" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Seguridad - Restricciones:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="seguridad" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Limitación movilidad:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="movilidad" rows="3"></textarea>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Área Psicológica -->
  <div class="card shadow mt-4" id="ver-tabla-datos" style="margin-top: 20px;">
    <div class="card-header text-center">
      <h6 class="m-0 font-weight-bold text-primary">Área Psicológica</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Valoración cognitiva:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="vcognitiva" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Valoración afectiva y emocional:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="vafectiva" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Trastornos de conducta:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="conducta" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"></div>
      </div>

    </div>
  </div>

  <!-- Área Funcional -->
  <div class="card shadow mt-4" id="ver-tabla-datos" style="margin-top: 20px;">
    <div class="card-header text-center">
      <h6 class="m-0 font-weight-bold text-primary">Área Funcional (Terapia Ocupacional)</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Ducha:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="ducha" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Aseo:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="aseo" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Deambulación:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="deambulacion" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Alimentación:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="alimentacion" rows="3"></textarea>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Área Animación Sociocultural -->
  <div class="card shadow mt-4" id="ver-tabla-datos" style="margin-top: 20px;">
    <div class="card-header text-center">
      <h6 class="m-0 font-weight-bold text-primary">Área Animación Sociocultural</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Aficiones e intereses:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="aficiones" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Ocupación del tiempo libre:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="tiempo_libre" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top: 5px;">
          <label>Participación en actividades:</label>
          <div class="input-group form-group">
            <textarea class="form-control rounded-1" id="actividades" rows="3"></textarea>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"></div>
      </div>

    </div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-agregar-plan">Agregar</button>
    </div>
  </div>

</div>