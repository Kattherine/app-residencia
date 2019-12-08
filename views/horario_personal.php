<!-- VER HORARIO DEL PERSONAL -->
<div id="ver-horario-personal" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Horario Personal</h1>
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="padding-top: 5px;">
      <label>DNI del Personal:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <select class="custom-select" id="dni-horario-personal">
          <option>Seleccione un DNI</option>
          <?php 
          $sql_dni = "SELECT dni_personal FROM personal WHERE fecha_fin is null"; //que muestre dni del personal activo
          $rs_dni = mysqli_query($conn,$sql_dni);
          while($data = mysqli_fetch_assoc($rs_dni)){
          ?>
             <option value="<?php echo $data['dni_personal'] ?>"><?php echo $data['dni_personal'] ?></option>
          <?php 
            }
          ?>
        </select>
      </div>
    </div>
    <div class="col-xl-2 col-lg-3 col-md-2 col-sm-2">
      <button type="button" class="btn btn-success" id="boton-ver-horario" >Ver horario</button>
    </div>
    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0"></div>
  </div>

  <div class="card shadow mb-4" id="ver-tabla-horario" style="display: none; margin-top: 20px;">
    <div class="card-body">
      <div class="table-responsive">
        <table id="tabla-horario" class="table table-striped table-bordered " style="width:100%; ">
          <thead>
              <tr>
                <th>Nombre Personal</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Cargo</th>
                <th>Horario</th>
              </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>