<!-- BAJA DE RESIDENTE -->
<div id="ver-baja-residente" style="display: none;">
  <div class=" align-items-center justify-content-between text-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Baja Residente</h1>
  </div>

  <div class="row">
    <div class="col-xl-4 col-lg-3 col-md-0 col-sm-0"></div>
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4" style="padding-top: 5px;">
      <label>DNI del Residente:</label>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-8 col-sm-8" >
      <div class="input-group form-group">
        <div class="input-group-prepend ">
          <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
        </div>
        <select class="custom-select" id="dni-baja-residente">
          <option>Seleccione un DNI</option>
          <?php 
          $sql_dni = "SELECT dni_residente FROM residentes WHERE fecha_fin IS NULL";
          $rs_dni = mysqli_query($conn,$sql_dni);
          while($data = mysqli_fetch_assoc($rs_dni)){
          ?>
             <option value="<?php echo $data['dni_residente'] ?>"><?php echo $data['dni_residente'] ?></option>
          <?php 
            }
          ?>
        </select>
       
      </div>
    </div>
    <div class="col-xl-3 col-lg-2 col-md-0 col-sm-0"></div>
  </div>

  <div class="row mt-5">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
      <button type="button" class="btn btn-success" id="boton-baja-residente" >Baja Residente</button>
    </div>
  </div>
</div>