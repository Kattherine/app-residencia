<!-- AGREGAR UNA CONSULTA DEL RESIDENTE AL MEDICO -->
<div id="ver-consulta" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Agregar Consulta</h1>
  </div>

  <div class="row">
    <div class="col-xl-4 col-lg-3 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="padding-top: 5px;">
      <label>DNI Residente:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-8" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <select class="custom-select" id="dni-residente-consulta">
          <option>Seleccione un DNI</option>
            <?php echo $opciones; ?>
        </select>
       
      </div>
    </div>
    <div class="col-xl-3 col-lg-2 col-md-0 col-sm-0"></div>
  </div>

  <div class="card shadow mb-4" style="margin-top: 20px;"> 
    <div class="card-header text-center">
      <h6 class="m-0 ">Consulta:</h6>
    </div>
    <div class="card-body">
      <div class="summernote" id="texto-consulta"></div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-agregar-consulta">Agregar</button>
    </div>
  </div>

</div>