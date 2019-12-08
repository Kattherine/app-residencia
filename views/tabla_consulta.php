<!-- VER LA TABLA DE CONSULTAS MEDICO RESIDENTE -->
<div id="ver-consulta-tabla" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Historial Consultas</h1>
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
        <select class="custom-select" id="dni-residente-tabla">
          <option>Seleccione un DNI</option>
            <?php echo $opciones; ?>
        </select>
      </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-2 col-sm-2">
      <button type="button" class="btn btn-success" id="boton-tabla-consulta" >Consultar</button>
    </div>
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="card shadow mb-4" id="ver-tabla-consulta" style="display: none; margin-top: 20px;"> 
    <div class="card-body">
      <div class="table-responsive">
        <table id="tabla-consulta" class="table table-striped table-bordered " style="width:100%; ">
          <thead>
              <tr>
                <th>DNI Residente</th>
                <th>Nombre Medico</th>
                <th>Fecha</th>
                <th>Consulta</th>
              </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>