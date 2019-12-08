<?php
   include_once('../controllers/session.php');
   include_once('../db/config.php');
   include_once('../models/funciones.php');

  $idUser = $_REQUEST['id'];

  $datos = cargoUsuario($idUser, $conn);
  $cargoUsuario = $datos['cargo'];

  $totalHabitaciones = totalHabitaciones($conn);

  $opciones = totalDNIresidentes($conn); //carga el DNI de los residentes que no estan de baja

  $habitacioneslibres = habitacionesLibres($conn); //carga las habitaciones que estan libres

  $sql_dni = "SELECT dni_personal FROM personal";
  $rs_dni = mysqli_query($conn,$sql_dni);

  $sql_dni_baja = "SELECT dni_personal FROM personal where fecha_fin is NULL AND id != 1";
  $rs_dni_baja = mysqli_query($conn,$sql_dni_baja);

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Residencia</title>
   <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="../plugins/js/jquery.min.js"></script>
  <script type="text/javascript" src="../plugins/js/chart.min.js"></script>
  <script type="text/javascript" src="../plugins/js/Chart.bundle.min.js"></script>
  <script type="text/javascript" src="../plugins/js/summernote.js"></script>
  <script type="text/javascript" src="../plugins/js/jquery.dataTables.min.js"></script>
  <!--<script type="text/javascript" src="../plugins/dataTables.bootstrap4.min.js"></script>-->
  <script type="text/javascript" src="../plugins/js/dataTables.buttons.min.js"></script>
    <!-- FUNCIONES JS -->
  <script type="text/javascript" src="../plugins/js/funciones.js"></script>
  <!-- Bootstrap SWEETALERT -->
  <script type="text/javascript" src="../plugins/js/sweetalert.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../menu/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../menu/js/sb-admin-2.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="../menu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../plugins/css/chart.min.css" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">

   <link rel="stylesheet" href="../plugins/css/jquery.dataTables.min.css">
   <!--<link rel="stylesheet" href="../plugins/buttons.dataTables.min.css">-->
   <link rel="stylesheet" href="../plugins/css/summernote.css">
   <link rel="stylesheet" href="../plugins/css/summernote-lite.css">
   <link rel="stylesheet" href="../plugins/css/summernote-bs4.css">

   <link rel="stylesheet" href="../plugins/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../plugins/css/estilos.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" id="residencia" style="color: white; cursor: pointer;">
        <div class="sidebar-brand-icon">
          <i class="fa fa-building-o"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Residencia Leonardo</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

<?php if($cargoUsuario == "jefe"){ ?>
      <!-- PERSONAL -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="1" href="#" data-toggle="collapse" data-target="#primero" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-user" id="icono"></i>
          <span>Personal</span>
        </a>
        <div id="primero" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Custom Components:</h6>-->
            <span class="collapse-item" id="alta-personal"><i class="fa fa-user-plus" id="icono-sub"></i>Alta Personal</span>
            <span class="collapse-item" id="baja-personal"><i class="fa fa-user-times" id="icono-sub"></i>Baja Personal</span>
            <span class="collapse-item" id="modificar-personal"><i class="fa fa-pencil" id="icono-sub"></i>Modificar Personal</span>
            <span class="collapse-item" id="personal"><i class="fa fa-bars" id="icono-sub"></i>Historial Personal</span>
            <span class="collapse-item" id="horario-personal"><i class="fa fa-clock-o" id="icono-sub"></i>Horario Personal</span>
          </div>
        </div>
      </li>
<?php } 
if($cargoUsuario != "limpieza"){?>
      <!-- RESIDENTE -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="2" href="#" data-toggle="collapse" data-target="#segundo" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-users" id="icono"></i>
          <span>Residente</span>
        </a>
        <div id="segundo" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
<?php if($cargoUsuario == "jefe"){  ?>
            <span class="collapse-item" id="alta-residente"><i class="fa fa-user-plus" id="icono-sub"></i>Alta Residente</span>
            <span class="collapse-item" id="baja-residente"><i class="fa fa-user-times" id="icono-sub"></i>Baja Residente</span>
            <span class="collapse-item" id="modificar-residente"><i class="fa fa-pencil" id="icono-sub"></i>Modificar Residente</span>
<?php }  ?>          
            <span class="collapse-item" id="datos-contacto"><i class="fa fa-wpforms" id="icono-sub"></i>Datos de Contacto</span>
            <span class="collapse-item" id="residente"><i class="fa fa-bars" id="icono-sub"></i>Historial Residente</span>
          </div>
        </div>
      </li>

      <!-- HABITACIONES -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="3" href="#" data-toggle="collapse" data-target="#tercero" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-bed" id="icono"></i>
          <span>Habitaciones</span>
        </a>
        <div id="tercero" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
<?php if($cargoUsuario == "jefe") { ?>
            <span class="collapse-item" id="asignar-habitacion"><i class="fa fa-pencil-square-o" id="icono-sub"></i>Asignar</span>
            <span class="collapse-item" id="mover-habitacion"><i class="fa fa-exchange" id="icono-sub"></i>Mover</span>
<?php } ?>
            <span class="collapse-item" id="tabla-residente-habitacion"><i class="fa fa-bars" id="icono-sub"></i>Historial Habitaciones</span>
          </div>
        </div>
      </li>
    
      <!-- AGREGAR INCIDENCIAS -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="4" href="#" data-toggle="collapse" data-target="#cuarto" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-address-book-o" id="icono"></i>
          <span>Incidencias</span>
        </a>
        <div id="cuarto" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <span class="collapse-item" id="auxiliar-residente"><i class="fa fa-plus-circle" id="icono-sub"></i>Agregar Incidencia</span>
            <span class="collapse-item" id="tabla-auxiliar-residente"><i class="fa fa-id-card-o" id="icono-sub"></i>Historial Incidencias</span>
          </div>
        </div>
      </li>
<?php } 
if($cargoUsuario == "jefe" || $cargoUsuario == "medico" || $cargoUsuario == "enfermero"){ ?>
      <!-- MEDICO -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="5" href="#" data-toggle="collapse" data-target="#quinto" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-user-md" id="icono"></i>
          <span>Médico</span>
        </a>
        <div id="quinto" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
<?php  
if($cargoUsuario == "medico" || $cargoUsuario == "enfermero"){ ?>
            <span class="collapse-item" id="agregar-consulta"><i class="fa fa-plus-square" id="icono-sub"></i>Agregar Consulta</span>
<?php } ?>
            <span class="collapse-item" id="consulta-tabla"><i class="fa fa-id-card-o" id="icono-sub"></i>Historial Consultas</span>
          </div>
        </div>
      </li>
<?php }
if($cargoUsuario == "jefe" || $cargoUsuario == "limpieza"){ ?>
      <!-- LIMPIEZA -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="6" href="#" data-toggle="collapse" data-target="#sexto" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-magic" id="icono"></i>
          <span>Limpieza</span>
        </a>
        <div id="sexto" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <span class="collapse-item" id="insertar-limpieza"><i class="fa fa-check-square-o" id="icono-sub"></i>Habitación Limpia</span>
            <span class="collapse-item" id="tabla-limpieza"><i class="fa fa-bars" id="icono-sub"></i>Historial Limpieza</span>
          </div>
        </div>
      </li>
<?php } 
if($cargoUsuario != "limpieza"){?>
      <!-- PLAN DE ATENCIÓN INDIVICUALIZADO -->
      <li class="nav-item">
        <a class="nav-link collapsed" id="7" href="#" data-toggle="collapse" data-target="#septimo" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-address-card-o" id="icono"></i>
          <span>PAI</span>
        </a>
        <div id="septimo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <span class="collapse-item" id="agregar-plan"><i class="fa fa-plus-circle" id="icono-sub"></i>Agregar</span>
            <span class="collapse-item" id="modificar-plan"><i class="fa fa-id-card-o" id="icono-sub"></i>Modificar</span>
          </div>
        </div>
      </li>
<?php } ?>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- IMPRIMIR EL NOMBRE DE USUARIO Y APELLIDO -->
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo ($datos['nombre']." ".$datos['apellido1']); ?></span>
                <i class="fa fa-user-circle-o" style="font-size: 2rem;"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-item" id="misdatos" style="cursor: pointer;">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mis Datos
                </div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item" id="cerrar-sesion" data-toggle="modal" data-target="#logoutModal" style="cursor: pointer;">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </div>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div id="inicio">
            <!-- Page Heading -->
            <div class=" align-items-center justify-content-between text-center mb-5">
              <h1 class="h3 mb-0 text-gray-800">Información</h1>
            </div>

            <!-- PRIMERA FILA -->
            <div class="row">
              <!-- TOTAL PERSONAL -->
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 1rem;">Total Personal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo totalPersonal($conn); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- TOTAL RESIDENTES -->
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 1rem;">Total Residentes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo totalResidente($conn); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-wheelchair fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- CAMAS OCUPADAS -->
            <div class="row">
              <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 1rem;">Camas Ocupadas</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalHabitaciones; ?>%</div>
                          </div>
                          <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totalHabitaciones; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- CHART -->
            <div class="row">
              <!-- Pie Chart -->
              <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Estadísticas</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Personal
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Residente
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Camas
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <?php 

            include_once('mis_datos.php'); //MIS DATOS 

            /* BOTONES DE PERSONAL */
            include_once('alta_personal.php'); //ALTA PERSONAL
            include_once('baja_personal.php'); //BAJA PERSONAL
            include_once('tablas_personal.php'); //TABLAS PERSONAL
            include_once('modificar_personal.php'); //MODIFICAR PERSONAL
            include_once('horario_personal.php'); //HORARIO PERSONAL

            /* BOTONES DE RESIDENTE */
            include_once('alta_residente.php'); //ALTA RESIDENTE
            include_once('baja_residente.php'); //BAJA RESIDENTE
            include_once('modificar_residente.php'); //MODIFICAR RESIDENTE
            include_once('contacto_residente.php'); //CONTACTO RESIDENTE
            include_once('tablas_residente.php'); //TABLAS RESIDENTE

            /* BOTONES HABITACIONES */
            include_once('asignar_habitacion.php'); //ASIGNAR HABITACION
            include_once('mover_habitacion.php'); //MOVER HABITACION
            include_once('tabla_habitacion.php'); //TABLA HABITACIÓN

            /* BOTONES INCIDENCIA */
            include_once('insertar_incidencia.php'); //INSERTAR INCIDENCIA
            include_once('tabla_incidencia.php'); //TABLA INCIDENCIAS

            /* BOTONES CONSULTA */
            include_once('insertar_consulta.php'); //INSERTAR CONSULTA
            include_once('tabla_consulta.php'); //TABLA CONSULTA

            /* BOTONES LIMPIEZA */
            include_once('insertar_limpieza.php'); //INSERTAR LIMPIEZA
            include_once('tabla_limpieza.php'); //TABLA LIMPIEZA

            /* BOTONES PAI */
            include_once('insertar_pai.php'); //INSERTAR PAI
            include_once('modificar_pai.php'); //MODIFICAR PAI

          ?> 

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer 
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Carlos Del Val & Katherine Gavilan 2019</span>
          </div>
        </div>
      </footer>-->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>

</html>

<script>
  $(document).ready(function(){
    var idUsuario = <?php echo $idUser; ?>; //guardo la id del usuario en JS
    var cargo = "";
    var id_historico_res_hab = 0; //guardo la id del historico_res_hab para hacer luego el update correcto
    var id_residente = 0; //guardo la id para luego guardarla en el insert del PAI
    var tiene_plan = true; //si ya tiene un PAI se actualiza a false y no deja agregar el PAI porque ya tiene uno
    
    //GENERO EL CHART CON LOS DATOS
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Personal", "Residente", "Camas"],
        datasets: [{
          data: [<?php echo totalPersonal($conn); ?>, <?php echo totalResidente($conn); ?>, <?php echo habitacionesOcupadas($conn); ?>],
          backgroundColor: ['#ffc107', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#eab106', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });

    $('#cerrar-sesion').click(function(){
      window.location.replace('../logout.php');
    });

    //CLICK EN EL LOGO DE RESIDENCIA
    $('#residencia').click(function(){
      if($('#inicio').is(':hidden')){
        location.reload();
        $('#inicio').show();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-horario-personal').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
      } 
    });

    //CLICK EN ALTA PERSONAL
    $('#alta-personal').click(function(){
      if($('#ver-alta-personal').is(':hidden')){
        $('#ver-misdatos').hide();
        $('#inicio').hide();
        $('#1').addClass('collapsed');
        $('#primero').removeClass('show');
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').show();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#1').addClass('show');
        $('#primero').removeClass('collapsed');
      }
    });

    //CLICK EN BAJA PERSONAL
    $('#baja-personal').click(function(){
      if($('#ver-baja-personal').is(':hidden')){
        $('#ver-misdatos').hide();
        $('#inicio').hide();
        $('#1').addClass('collapsed');
        $('#primero').removeClass('show');
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').show();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#1').addClass('show');
        $('#primero').removeClass('collapsed');
      }
    });

    //CLICK EN MODIFICAR PERSONAL
    $('#modificar-personal').click(function(){
      if($('#ver-modificar-personal').is(':hidden')){
        $('#ver-misdatos').hide();
        $('#inicio').hide();
        $('#1').addClass('collapsed');
        $('#primero').removeClass('show');
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-modificar-personal').show();
        $('#ver-personal-tabla').hide();
        $('#ver-horario-personal').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
      } else {
        $('#1').addClass('show');
        $('#primero').removeClass('collapsed');
      }
    });

    //**************CLICK EN VER TABLA PERSONAL**************
    $('#personal').click(function(){
      if($('#ver-personal-tabla').is(':hidden')){
        $('#ver-misdatos').hide();
        $('#inicio').hide();
        $('#1').addClass('collapsed');
        $('#primero').removeClass('show');
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-personal-tabla').show();
        $('#ver-horario-personal').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        
        //CHECKBOX HISTORICO PERSONAL
        $('#historico-personal').click(function() {
            if($('#historico-personal').is(':checked')){
                tablaPersonalHistorico();    
                //tiene que ir fuera del DataTable para que se habilite siempre cuando sea checked
                $('#ver-tabla-personal-historico').show();
            }
           else{
              $('#ver-tabla-personal-historico').hide();
            }
        })
        
        //CHECKBOX PERSONAL ACTIVO
        $('#personal-activo').click(function() {
            if($('#personal-activo').is(':checked')){
                tablapersonalactivo();  
                //tiene que ir fuera del DataTable para que se habilite siempre cuando sea checked
                $('#ver-tabla-personal-activo').show();
         }
         else{
              $('#ver-tabla-personal-activo').hide();
            }

        })
      }
      else {
        $('#1').addClass('show');
        $('#primero').removeClass('collapsed');
      }
    });

    //CLICK VER LA TABLA HORARIO PERSONAL
    $('#horario-personal').click(function(){
      if($('#ver-horario-personal').is(':hidden')){
        $('#ver-misdatos').hide();
        $('#inicio').hide();
        $('#1').addClass('collapsed');
        $('#primero').removeClass('show');
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-horario-personal').show();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
      } else {
        $('#1').addClass('show');
        $('#primero').removeClass('collapsed');
      }
    });

    //CLICK EN ALTA PERSONAL
    $('#misdatos').click(function(){
      if($('#ver-misdatos').is(':hidden')){
        $('#inicio').hide();
        cargarMisDatos(idUsuario);
        $('#ver-misdatos').show();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } 
    });

    //CLICK EN ALTA RESIDENTE
    $('#alta-residente').click(function(){
      if($('#ver-alta-residente').is(':hidden')){
        $('#2').addClass('collapsed');
        $('#segundo').removeClass('show');
        $('#ver-datos-contacto').hide();
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').show();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#2').addClass('show');
        $('#segundo').removeClass('collapsed');
      }
    });

    //CLICK EN BAJA RESIDENTE
    $('#baja-residente').click(function(){
      if($('#ver-baja-residente').is(':hidden')){
        $('#2').addClass('collapsed');
        $('#segundo').removeClass('show');
        $('#inicio').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').show();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#2').addClass('show');
        $('#segundo').removeClass('collapsed');
      }
    });

    //CLICK EN MODIFICAR DATOS RESIDENTE
    $('#modificar-residente').click(function(){
      if($('#ver-modificar-residente').is(':hidden')){
        $('#2').addClass('collapsed');
        $('#segundo').removeClass('show');
        $('#inicio').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-misdatos').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-horario-personal').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-modificar-residente').show();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
      } else {
        $('#2').addClass('show');
        $('#segundo').removeClass('collapsed');
      }
    });

    //CLICK EN DATOS DE CONTACTO RESIDENTE
    $('#datos-contacto').click(function(){
      if($('#ver-datos-contacto').is(':hidden')){
        $('#2').addClass('collapsed');
        $('#segundo').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').show();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#2').addClass('show');
        $('#segundo').removeClass('collapsed');
      }
    });

    //CLICK EN VER RESIDENTE
    $('#residente').click(function(){
      if($('#ver-residente-tabla').is(':hidden')){
        $('#2').addClass('collapsed');
        $('#segundo').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').show();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
          //CHECKBOX HISTORICO RESIDENTE 
        $('#historico-residente').click(function() { 
            if($('#historico-residente').is(':checked')){
              tablaResidenteHistorico(); 
              $('#ver-residente-tabla-historico').show();
            }
           else{
              $('#ver-residente-tabla-historico').hide();
            }
        }) 
        
        //CHECKBOX RESIDENTE QUE ESTÁN DADOS DE ALTA
        $('#de-alta-residente').click(function() {
            if($('#de-alta-residente').is(':checked')){
              tablaResidenteDeAlta();   
              $('#ver-residente-tabla-de-alta').show();
         }
         else{
              $('#ver-residente-tabla-de-alta').hide();
            }

        })
      } else {
        $('#2').addClass('show');
        $('#segundo').removeClass('collapsed');
      }
    });

    //CLICK ASIGNAR HABITACION AL RESIDENTE
    $('#asignar-habitacion').click(function(){
      if($('#ver-asignar-habitacion').is(':hidden')){
        $('#3').addClass('collapsed');
        $('#tercero').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').show();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#3').addClass('show');
        $('#tercero').removeClass('collapsed');
      }
    });

    //CLICK MOVER DE HABITACION AL RESIDENTE
    $('#mover-habitacion').click(function(){
      if($('#ver-mover-habitacion').is(':hidden')){
        $('#3').addClass('collapsed');
        $('#tercero').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').show();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#3').addClass('show');
        $('#tercero').removeClass('collapsed');
      }
    });

    //CLICK VER TABLA RESIDENTE HABITACIÓN
    $('#tabla-residente-habitacion').click(function(){
      if($('#ver-tabla-residente-habitacion').is(':hidden')){
        $('#3').addClass('collapsed');
        $('#tercero').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').show();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
        tablaResHab();
       } else {
        $('#3').addClass('show');
        $('#tercero').removeClass('collapsed');
       }
    });

    //CLICK INSERTAR DIARIO AUXILIAR - RESIDENTE
    $('#auxiliar-residente').click(function(){
      if($('#ver-auxiliar-residente').is(':hidden')){
        $('#4').addClass('collapsed');
        $('#cuarto').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').show();
        $('#texto-diario').summernote({
          toolbar:[
            ['style',['bold','italic','underline','clear']],
            //['fontface',['fontname']],
            ['textsize',['fontsize']],
            ['fontclr',['color']],
            ['alignment',['ul','ol','paragraph']],
            ['insert',['link','picture','table']],
            ['adv',['codeview']]
          ]
        });
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#4').addClass('show');
        $('#cuarto').removeClass('collapsed');
      }
    });

    //CLICK VER TABLA AUXILIAR
    $('#tabla-auxiliar-residente').click(function(){
      if($('#ver-tabla-auxiliar-residente').is(':hidden')){
        $('#4').addClass('collapsed');
        $('#cuarto').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').show();
        $('#ver-tabla-residente-habitacion').hide();
        tablaAuxRes();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#4').addClass('show');
        $('#cuarto').removeClass('collapsed');
      }
    });

    //CLICK AGREGAR CONSULTA
    $('#agregar-consulta').click(function(){
      if($('#ver-consulta').is(':hidden')){
        $('#5').addClass('collapsed');
        $('#quinto').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').show();
        $('#texto-consulta').summernote({
          toolbar:[
            ['style',['bold','italic','underline','clear']],
            //['fontface',['fontname']],
            ['textsize',['fontsize']],
            ['fontclr',['color']],
            ['alignment',['ul','ol','paragraph']],
            ['insert',['link','picture','table']],
            ['adv',['codeview']]
          ]
        });
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#5').addClass('show');
        $('#quinto').removeClass('collapsed');
      }
    });

    //CLICK VER TABLA CONSULTAS
    $('#consulta-tabla').click(function(){
      if($('#ver-consulta-tabla').is(':hidden')){
        $('#5').addClass('collapsed');
        $('#quinto').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-consulta-tabla').show();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#5').addClass('show');
        $('#quinto').removeClass('collapsed');
      }
    });

    //CLICK INSERTAR LIMPIEZA DE LA HABITACION
    $('#insertar-limpieza').click(function(){
      if($('#ver-insertar-limpieza').is(':hidden')){
        $('#6').addClass('collapsed');
        $('#sexto').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-insertar-limpieza').show();
        selectHabitaciones();
        $('#texto-limpieza').summernote({
          toolbar:[
            ['style',['bold','italic','underline','clear']],
            //['fontface',['fontname']],
            ['textsize',['fontsize']],
            ['fontclr',['color']],
            ['alignment',['ul','ol','paragraph']],
            ['insert',['link','picture','table']],
            ['adv',['codeview']]
          ]
        });
         $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#6').addClass('show');
        $('#sexto').removeClass('collapsed');
      }
    });

    //CLICK VER LA TABLA DE LA LIMPIEZA
    $('#tabla-limpieza').click(function(){
      if($('#ver-tabla-limpieza').is(':hidden')){
        $('#6').addClass('collapsed');
        $('#sexto').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').show();
        tablaLimpieza();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#6').addClass('show');
        $('#sexto').removeClass('collapsed');
      }
    });

    //CLICK AGREGAR PLAN ATENCION INDIVIDUALIZADO
    $('#agregar-plan').click(function(){
      if($('#ver-agregar-plan').is(':hidden')){
        $('#7').addClass('collapsed');
        $('#septimo').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').show();
        $('#area-social').summernote({
          toolbar:[
            ['style',['bold','italic','underline','clear']],
            //['fontface',['fontname']],
            ['textsize',['fontsize']],
            ['fontclr',['color']],
            ['alignment',['ul','ol','paragraph']],
            ['insert',['link','picture','table']],
            ['adv',['codeview']]
          ]
        });
        $('#ver-modificar-plan').hide();
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#7').addClass('show');
        $('#septimo').removeClass('collapsed');
      }
    });

    //CLICK MODIFICAR PLAN ATENCION INDIVIDUALIZADO
    $('#modificar-plan').click(function(){
      if($('#ver-modificar-plan').is(':hidden')){
        $('#7').addClass('collapsed');
        $('#septimo').removeClass('show');
        $('#inicio').hide();
        $('#ver-misdatos').hide();
        $('#ver-datos-contacto').hide();
        $('#ver-alta-personal').hide();
        $('#ver-baja-personal').hide();
        $('#ver-personal-tabla').hide();
        $('#ver-alta-residente').hide();
        $('#ver-baja-residente').hide();
        $('#ver-residente-tabla').hide();
        $('#ver-mover-habitacion').hide();
        $('#ver-asignar-habitacion').hide();
        $('#ver-consulta').hide();
        $('#ver-consulta-tabla').hide();
        $('#ver-insertar-limpieza').hide();
        $('#ver-tabla-limpieza').hide();
        $('#ver-auxiliar-residente').hide();
        $('#ver-tabla-auxiliar-residente').hide();
        $('#ver-tabla-residente-habitacion').hide();
        $('#ver-agregar-plan').hide();
        $('#ver-modificar-plan').show();
        $('#area-social-modificar').summernote({
          toolbar:[
            ['style',['bold','italic','underline','clear']],
            //['fontface',['fontname']],
            ['textsize',['fontsize']],
            ['fontclr',['color']],
            ['alignment',['ul','ol','paragraph']],
            ['insert',['link','picture','table']],
            ['adv',['codeview']]
          ]
        });
        $('#ver-modificar-personal').hide();
        $('#ver-modificar-residente').hide();
        $('#ver-horario-personal').hide();
      } else {
        $('#7').addClass('show');
        $('#septimo').removeClass('collapsed');
      }
    });



    //GUARDO EL CARGO DEL PERSONAL QUE SE CREA, para hacer insert en su tabla correspondiente
    //CLICK EN EL SELECT CARGO
    $('#cargo').click( function(){
      cargo = $('#cargo').val();
      if(cargo == "medico" || cargo == "enfermero"){
        $('#ver-especialidad').show();
        $('#ver-especialidad1').show();
        $('#ver-planta').hide();
        $('#ver-planta1').hide();
        if(cargo == "medico"){
          $('#especialidad').val('Medico Primario');
        } else {
          $('#especialidad').val('');
        }
      } else if (cargo == "auxiliar"){
        $('#ver-especialidad').hide();
        $('#ver-especialidad1').hide();
        $('#ver-planta').show();
        $('#ver-planta1').show();
      } else if (cargo == "limpieza"){
        $('#ver-especialidad').hide();
        $('#ver-especialidad1').hide();
        $('#ver-planta').hide();
      } else {
        $('#ver-especialidad').hide();
        $('#ver-especialidad1').hide();
        $('#ver-planta').hide();
        $('#ver-planta1').hide();
      }
    });

     //CLICK EN EL SELECT CARGO
    $('#cargo-modificado').click( function(){
      var cargo_mod = $('#cargo-modificado').val();
      if(cargo_mod == "medico" || cargo_mod == "enfermero"){
        $('#ver-especialidad-mod').show();
        $('#ver-especialidad-mod1').show();
        $('#ver-planta-mod').hide();
        $('#ver-planta-mod1').hide();
        if(cargo_mod == "medico"){
          $('#especialidad-modificado').val('Medico Primario');
        } else {
          $('#especialidad-modificado').val('');
        }
      } else if (cargo_mod == "auxiliar"){
        $('#ver-especialidad-mod').hide();
        $('#ver-especialidad-mod1').hide();
        $('#ver-planta-mod').show();
        $('#ver-planta-mod1').show();
      } else if (cargo_mod == "limpieza"){
        $('#ver-especialidad-mod').hide();
        $('#ver-especialidad-mod1').hide();
        $('#ver-planta-mod').hide();
        $('#ver-planta-mod1').hide();
      } else {
        $('#ver-especialidad-mod').hide();
        $('#ver-especialidad-mod1').hide();
        $('#ver-planta-mod').hide();
        $('#ver-planta-mod1').hide();
      }
    });

    //PONGO EN EL INPUT EL LA HABITACION DEL RESIDENTE en mover habitacion
    $('#dni-residente-mover').click(function(){
      var id = 0;

      //RECUPERO LA ID DEL RESIDENTE
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "residentes", idName: "dni_residente", id: $('#dni-residente-mover').val()},
          success: function(data) {
            if(data[0] != undefined){
              id = data[0]['id_residente'];
            }
          }    
      });

      //LE PONGO LA HABITACION CORRESPONDIENTE
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "historico_res_hab", idName: "id_residente", id: id},
          success: function(data) {
            if(data[0] != undefined){
              for(var i = 0; i < data.length ; i++){
                if(data[i]['fecha_fin'] == null){
                  id_historico_res_hab = data[i]['id']; //guardo la id de historico_res_hab
                  $('#numero-mover').val(data[i]['id_habitacion']); //pongo la habitacion en el input
                  break;
                }
              }
            } else {
              $('#numero-mover').val('');
            }
          }    
      });
    });

    //AGREGAR PAI, RELLENO LOS DATOS DEL RESIDENTE
    $('#boton-cargar-pai').click(function(){
      if($('#dni-agregar-plan').val() == 0){
        $('#dni-pai').val('');
        $('#nombre-pai').val('');
        $('#familiar-pai').val('');
        $('#contacto-pai').val('');
        $('#fecha-inicio').val('');
        $('#fecha-elaboracion').val('');
        $('#fecha-evaluacion').val('');
      }

      id_residente = comprobarDNIResidente($('#dni-agregar-plan').val());

      $.ajax({
        url: '../controllers/get_item_json.php',
        dataType: "json",
        async: false,
        data: {what: "pai", idName: "id_residente", id: id_residente},
        success: function(data) {
          if(data[0] != undefined){
            tiene_plan = false; //la actualizo a false para que no deje agregar el PAI
          } else {
            tiene_plan = true;
          }
        }    
      });
      

      if(tiene_plan == false){
        $('#alerta-plan').show();
        $('#dni-pai').val('');
        $('#nombre-pai').val('');
        $('#familiar-pai').val('');
        $('#contacto-pai').val('');
        $('#fecha-inicio').val('');
        $('#fecha-elaboracion').val('');
        $('#fecha-evaluacion').val('');
        
      } else {
        $('#alerta-plan').hide();
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "residentes", idName: "dni_residente", id: $('#dni-agregar-plan').val()},
          success: function(data) {
            if(data[0] != undefined){
              id_residente = data[0]['id_residente']; //guardo la id del residente en una variable global para luego hacer el insert en el PAI
              $('#dni-pai').val(data[0]['dni_residente']);
              $('#nombre-pai').val(data[0]['nombre'] + " " + data[0]['apellido1'] + " " + data[0]['apellido2']);
              $('#familiar-pai').val(data[0]['nombre_contacto'] + " " + data[0]['apellido_contacto']);
              $('#contacto-pai').val(data[0]['telefono']);
              var fecha = new Date(data[0]['fecha_inicio']);
              $('#fecha-inicio').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
              fecha = new Date();
              $('#fecha-elaboracion').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
              $('#fecha-evaluacion').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
            } 
          }    
        });
      }
      
    });

    //AGREGAR PAI, RELLENO LOS DATOS DEL RESIDENTE
    $('#boton-modificar-pai').click(function(){
      if($('#dni-modificar-plan').val() == 0){
        $('#dni-pai-mod').val('');
        $('#nombre-pai-mod').val('');
        $('#familiar-pai-mod').val('');
        $('#contacto-pai-mod').val('');
        $('#fecha-inicio-mod').val('');
        $('#fecha-elaboracion-mod').val('');
        $('#fecha-evaluacion-mod').val('');
      }

      id_residente = comprobarDNIResidente($('#dni-modificar-plan').val());

      $.ajax({
        url: '../controllers/get_item_json.php',
        dataType: "json",
        async: false,
        data: {what: "pai", idName: "id_residente", id: id_residente},
        success: function(data) {
          if(data[0] != undefined){
            tiene_plan = true; //la actualizo a false para que no deje agregar el PAI
          } else {
            tiene_plan = false;
          }
        }    
      });
      

      if(tiene_plan == false || $('#dni-modificar-plan').val() == 0){
        $('#alerta-plan-mod').show();
        $('#dni-pai-mod').val('');
        $('#nombre-pai-mod').val('');
        $('#familiar-pai-mod').val('');
        $('#contacto-pai-mod').val('');
        $('#fecha-inicio-mod').val('');
        $('#fecha-elaboracion-mod').val('');
        $('#fecha-evaluacion-mod').val('');
      } else {
        $('#alerta-plan-mod').hide();
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "residentes", idName: "dni_residente", id: $('#dni-modificar-plan').val()},
          success: function(data) {
            if(data[0] != undefined){
              id_residente = data[0]['id_residente']; //guardo la id del residente en una variable global para luego hacer el insert en el PAI
              $('#dni-pai-mod').val(data[0]['dni_residente']);
              $('#nombre-pai-mod').val(data[0]['nombre'] + " " + data[0]['apellido1'] + " " + data[0]['apellido2']);
              $('#familiar-pai-mod').val(data[0]['nombre_contacto'] + " " + data[0]['apellido_contacto']);
              $('#contacto-pai-mod').val(data[0]['telefono']);
              var fecha = new Date(data[0]['fecha_inicio']);
              $('#fecha-inicio-mod').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
              fecha = new Date();
              $('#fecha-elaboracion-mod').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
              $('#fecha-evaluacion-mod').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
            } 
          }    
        });
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "pai", idName: "id_residente", id: id_residente},
          success: function(data) {
            if(data[0] != undefined){
              var fecha = new Date(data[0]['fecha_evaluacion']);
              $('#fecha-elaboracion-mod').val(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear()+" "+fecha.getHours()+":"+fecha.getMinutes());
              $('#area-social-modificar').summernote('destroy');
             $('#area-social-modificar').html(data[0]['area_social']);

              $('#area-social-modificar').summernote({
              toolbar:[
                  ['style',['bold','italic','underline','clear']],
                  //['fontface',['fontname']],
                  ['textsize',['fontsize']],
                  ['fontclr',['color']],
                  ['alignment',['ul','ol','paragraph']],
                  ['insert',['link','picture','table']],
                  ['adv',['codeview']]
                ]
              });
              //$('#area-social-modificar').html(data[0]['area_social']);
              //$('#area-social-modificar').summernote('code',data[0]['area_social']);
              $('#tratamiento-mod').val(data[0]['tratamiento']);
              $('#nutricional-mod').val(data[0]['nutricional']);
              $('#sueno-mod').val(data[0]['sueno']);
              $('#dolor-mod').val(data[0]['dolor']);
              $('#seguridad-mod').val(data[0]['seguridad']);
              $('#movilidad-mod').val(data[0]['movilidad']);
              $('#vcognitiva-mod').val(data[0]['vcognitiva']);
              $('#vafectiva-mod').val(data[0]['vafectiva']);
              $('#conducta-mod').val(data[0]['conducta']);
              $('#ducha-mod').val(data[0]['ducha']);
              $('#aseo-mod').val(data[0]['aseo']);
              $('#deambulacion-mod').val(data[0]['deambulacion']);
              $('#alimentacion-mod').val(data[0]['alimentacion']);
              $('#aficiones-mod').val(data[0]['aficiones']);
              $('#tiempo_libre-mod').val(data[0]['tiempo_libre']);
              $('#actividades-mod').val(data[0]['actividades']);
            } 
          }    
        });
      }
      
    });


    //-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    //AQUÍ PARA ABAJO SON EVENTOS DE BOTONES DE ALTA, BAJA, MODIFICACION
    //-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

    //CLICK BOTON DE GUARDAR MIS DATOS PERSONALES DE CADA USUARIO
    $('#boton-misdatos').click(function(){
      var postObj = new Object();
      postObj.idName = "id";
      postObj.id = idUsuario;
      postObj.usuario = $('#usuario-misdatos').val();

      if($('#contrasena-misdatos').val() != ""){
        postObj.contrasena = $('#contrasena-misdatos').val();
        //TABLA PERSONAL
        $.ajax({
            url: '../controllers/replace_service.php?table=personal',
            type: "POST",
            data: postObj,
            dataType: "html",
        });
      } else {
         $.ajax({
            url: '../controllers/replace_service.php?table=personal',
            type: "POST",
            data: postObj,
            dataType: "html",
        });
      }

      swal({
        title: "ACTUALIZADO",
        text:  "Datos Actualizados",
        buttons: false,
        icon:  "success",
        timer: 1500,
      });

       setTimeout('location.reload()',2000);

      //setTimeout("$('#page-top').load('welcome?id="+idUsuario+"');", 2500);

    });

    //CLICK BOTON ALTA DE PERSONAL
    $('#boton-alta-personal').click(function(){
      var correcto = true;
      if(validar_dni_nif_nie($('#dni').val()) == false){
        correcto = false;
        swal({
          title: "ERROR!",
          text:  "El DNI/NIF/NIE es incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if($('#dni').val() == "" || $('#nombre').val() == "" || $('#apellido1').val() == "" || $('#apellido2').val() == "" || $('#tipo').val() == "" || $('#usuario').val() == "" || $('#contrasena').val() == ""){
        correcto = false;
        swal({
          title: "ERROR!",
          text:  "Algún campo incompleto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } 

      if(cargo == "medico" || cargo == "enfermero"){
        if ($('#especialidad').val() == ""){
          correcto = false;
          swal({
            title: "Especialidad Vacia",
            buttons: false,
            icon:  "error",
            timer: 1500,
          });
        } 
      } else if (cargo == "auxiliar"){
        if($('#planta').val() == ""){
          correcto = false;
          swal({
            title: "Planta Vacia",
            buttons: false,
            icon:  "error",
            timer: 1500,
          });
        }
      }

      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "personal", idName: "dni_personal", id: $('#dni').val()},
          success: function(data) {
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              correcto = false;
              swal({
                title: "ERROR!",
                text:  "El personal existe",
                buttons: false,
                icon:  "error",
                timer: 1500,
              });
            } 
          }    
      });
      
      if(correcto == true){
        //GUARDO EN LA TABLA PERSONAL
        var postObj = new Object();
        postObj.dni_personal = $('#dni').val();
        postObj.nombre = $('#nombre').val();
        postObj.apellido1 = $('#apellido1').val();
        postObj.apellido2 = $('#apellido2').val();
        postObj.cargo = $('#cargo').val();
        postObj.tipo = $('#tipo').val();
        postObj.usuario = $('#usuario').val();
        postObj.contrasena = $('#contrasena').val();
        postObj.horario = $('#horario').val();
        $.ajax({
            url: '../controllers/replace_service.php?table=personal',
            type: "POST",
            async: false,
            data: postObj,
            dataType: "html",
        });

        if(cargo == "medico" || cargo == "limpieza" || cargo == "auxiliar" || cargo == "enfermero"){
          var id = 0;
          //RECUPERO LA ID QUE TIENE ESE PERSONAL RECIEN INSERTADO
          $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "personal", idName: "dni_personal", id: $('#dni').val()},
          success: function(data) {
              //SI EL DNI EXISTE ENTRA Y LO GUARDA LA ID
              if(data[0] != undefined){
                id = data[0]['id'];
              }   
            }    
          });

          var postObj1 = new Object();
          if(cargo == "medico" || cargo == "enfermero"){
            cargo = "medico"; //para guardarlo en la tabla medico por si entra por enfermero
            postObj1.id_medico = id;
            postObj1.especialidad = $('#especialidad').val();
          } else if (cargo == "auxiliar"){
            postObj1.id_auxiliar = id;
            postObj1.planta = $('#planta').val();
          } else if (cargo == "limpieza"){
            postObj1.id_limpieza = id;
          }

          $.ajax({
              url: '../controllers/replace_service.php?table='+cargo+'',
              type: "POST",
              async: false,
              data: postObj1,
              dataType: "html",
          });

          swal({
            title: "INSERTADO",
            text:  "Personal insertado correctamente",
            buttons: false,
            icon:  "success",
            timer: 1500,
          });

          setTimeout('location.reload()',2000);
          //setTimeout("$('#page-top').load('welcome?id="+idUsuario+"');", 2500);

        } else {
          swal({
            title: "INSERTADO",
            text:  "Personal insertado correctamente",
            buttons: false,
            icon:  "success",
            timer: 1500,
          });
          setTimeout('location.reload()',2000);
        }
      }
      
    });

     //CLICK BOTON BAJA PERSONAL
    $('#boton-baja-personal').click(function(){
       $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "personal", idName: "dni_personal", id: $('#dni-baja').val()},
          success: function(data) {
            var dni = "";
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              dni = data[0]['dni_personal'];
            }
            //SI EL DNI ES CORRECTO LO BORRA DE LA TABLA
              if(dni == $('#dni-baja').val()){
                var postObj = new Object();
                postObj.idName = "id";
                postObj.id = data[0]['id'];
                postObj.fecha_fin = "fecha";
                
                $.ajax({
                    url: '../controllers/replace_service.php?table=personal',
                    type: "POST",
                    data: postObj,
                    dataType: "html",
                });

                swal({
                  title: "BAJA",
                  text:  "Personal de baja correctamente",
                  buttons: false,
                  icon:  "success",
                  timer: 1500,
                });

                setTimeout('location.reload()',2000);
                //setTimeout("$('#page-top').load('welcome?id="+idUsuario+"');", 2500);

              } else { //EL DNI NO EXISTE
                swal({
                  title: "ERROR!",
                  text:  "El DNI introducido no existe",
                  buttons: false,
                  icon:  "error",
                  timer: 1500,
                });
              }
          }    
      });
    });

    //CARGAR CLICK EN EL BOTON DE MODIFICAR DATOS PERSONAL CARGAR!!!
    $('#dni-modificar-personal').click(function(){
      var cargo_personal = "";
      //RECUPERO LOS DATOS DEL PERSONAL Y LOS CARGO EN LOS INPUTS
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "personal", idName: "dni_personal", id: $('#dni-modificar-personal').val()},
          success: function(data) {
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              idPersonal = data[0]['id'];
              cargo_personal = data[0]['cargo'];
              $('#dni-modificado').val(data[0]['dni_personal']);
              $('#nombre-modificado').val(data[0]['nombre']);
              $('#apellido1-modificado').val(data[0]['apellido1']);
              $('#apellido2-modificado').val(data[0]['apellido2']);
              $('#cargo-modificado').val(data[0]['cargo']);
              $('#tipo-modificado').val(data[0]['tipo']);
              $('#usuario-modificado').val(data[0]['usuario']);
              //$('#contrasena-modificado').val(data[0]['contrasena']);
              $('#horario-modificado').val(data[0]['horario']);
              if(data[0]['fecha_fin'] == null){
                $('#activado-personal').attr('checked',true);
              } else {
                $('#activado-personal').attr('checked',false);
              }
            } 
          }    
      });

      //SI EL CARGO ES MEDICO, PARA CARGAR LOS DATOS DEL MEDICO
      if(cargo_personal == "medico" || cargo_personal == "enfermero"){
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "medico", idName: "id_medico", id: idPersonal},
          success: function(data) {
            if(data[0] != undefined){
              $('#ver-especialidad-mod').show();
              $('#especialidad-modificado').val(data[0]['especialidad']);
              $('#ver-especialidad-mod1').show();
              $('#ver-planta-mod').hide();
              $('#ver-planta-mod1').hide();
            } 
          }    
        });
        //SI EL CARGO ES AUXILIAR
      } else if(cargo_personal == "auxiliar"){
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "auxiliar", idName: "id_auxiliar", id: idPersonal},
          success: function(data) {
            if(data[0] != undefined){
              $('#planta-modificado').val(data[0]['planta']);
              $('#ver-planta-mod').show();
              $('#ver-planta-mod1').show();
              $('#ver-especialidad-mod').hide();
              $('#ver-especialidad-mod1').hide();
            } 
          }    
        });
      } else {
        $('#ver-planta-mod').hide();
        $('#ver-planta-mod1').hide();
        $('#ver-especialidad-mod').hide();
        $('#ver-especialidad-mod1').hide();
      } 

    });

    //CLICK EN EL BOTON DE MODIFICAR DATOS DEL PERSONAL
    $('#boton-modificar-personal').click(function(){
      if($('#dni-modificado').val() == "" || $('#nombre-modificado').val() == "" || $('#apellido1-modificado').val() == "" || $('#apellido2-modificado').val() == "" || $('#cargo-modificado').val() == "" || $('#tipo-modificado').val() == "" || $('#usuario-modificado').val() == "" || $('#contrasena-modificado').val() == ""){
        swal({
          title: "ERROR",
          text:  "Algún campo vacio",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else {
        //ACTUALIZO LA TABLA PERSONAL
        var postObj = new Object();
        postObj.idName = "id";
        postObj.id = idPersonal;
        //postObj.dni_personal = $('#dni-modificado').val(); //no lo guardo por si modifican el value en html
        postObj.nombre = $('#nombre-modificado').val();
        postObj.apellido1 = $('#apellido1-modificado').val();
        postObj.apellido2 = $('#apellido2-modificado').val();
        postObj.cargo = $('#cargo-modificado').val();
        postObj.tipo = $('#tipo-modificado').val();
        postObj.usuario = $('#usuario-modificado').val();
        postObj.horario = $('#horario-modificado').val();
        if($('#activado-personal').is(':checked')){
          postObj.fecha_fin = "null";
        } else {
           postObj.fecha_fin = "fecha";
        }

        if($('#contrasena-modificado').val() == ""){
           postObj.contrasena = $('#contrasena-modificado').val();
           //TABLA PERSONAL
          $.ajax({
              url: '../controllers/replace_service.php?table=personal',
              type: "POST",
              data: postObj,
              dataType: "html",
          });
        } else {
          $.ajax({
              url: '../controllers/replace_service.php?table=personal',
              type: "POST",
              data: postObj,
              dataType: "html",
          });
        }

        //INSERTO DEPENDIENDO DEL CARGO EN SU TABLA CORRESPONDIENTE
        if($('#cargo-modificado').val() == "medico" || $('#cargo-modificado').val() == "auxiliar" || $('#cargo-modificado').val() == "limpieza"){

          var postObj1 = new Object();      
          if($('#cargo-modificado').val() == "medico"){
            postObj1.idName = "id_medico";
            postObj1.id = idPersonal;
            postObj1.especialidad = $('#especialidad-modificado').val();
          } else if ($('#cargo-modificado').val() == "auxiliar"){
            postObj1.idName = "id_auxiliar";
            postObj1.id = idPersonal;
            postObj1.planta = $('#planta-modificado').val();
          } else if ($('#cargo-modificado').val() == "limpieza"){
            postObj1.idName = "id_limpieza";
            postObj1.id = idPersonal;
          }

          $.ajax({
              url: '../controllers/replace_service.php?table='+$('#cargo-modificado').val()+'',
              type: "POST",
              data: postObj1,
              dataType: "html",
          });

          swal({
            title: "MODIFICADO",
            text:  "Personal Modificado correctamente",
            icon:  "success",
            timer: 1500,
          });
          setTimeout('location.reload()',2000);
          //setTimeout("$('#page-top').load('welcome?id="+idUsuario+"');", 2500);
        } else {
          swal({
            title: "MODIFICADO",
            text:  "Personal Modificado correctamente",
            buttons: false,
            icon:  "success",
            timer: 1500,
          });
          setTimeout('location.reload()',2000);
          //setTimeout("$('#page-top').load('welcome?id="+idUsuario+"');", 2500);
        }
      }
    });

    //CLICK BOTON QUE GENERA LA TABLA CON LOS DATOS DEL PERSONAL Y SU HORARIO
    $('#boton-ver-horario').click(function(){
      var idPersonal = 0;

      idPersonal = comprobarDNIPersonal($('#dni-horario-personal').val());

      if(idPersonal != 0){
        $('#ver-tabla-horario').show(); //tabla-horario
        tablaPersonalHorario(idPersonal);
      } else {
        $('#ver-tabla-horario').hide();
      }
         
    });

    //CLICK BOTON ALTA DE RESIDENTE
    $('#boton-alta-residente').click(function(){
       var correcto = true;
      if(validar_dni_nif_nie($('#dni_residente').val()) == false){
        correcto = false;
        swal({
          title: "ERROR!",
          text:  "El DNI/NIF/NIE es incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if(validaremail($('#email-contacto').val()) == false){
        correcto = false;
        swal({
          title: "ERROR!",
          text:  "El Email es incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if(validartelefono($('#tlf-contacto').val()) == false){
        correcto = false;
        swal({
          title: "ERROR!",
          text:  "El Telefono es incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if($('#dni_residente').val() == "" || $('#nombre_residente').val() == "" || $('#apellido1_residente').val() == "" || $('#apellido2_residente').val() == "" || $('#edad').val() == "" || $('#discapacidad').val() == "" || $('#situacion').val() == "" || $('#nombre-contacto').val() == "" || $('#apellido-contacto').val() == "" || $('#direccion-contacto').val() == "" || $('#tlf-contacto').val() == "" || $('#email-contacto').val() == "") {
          correcto = false;
          swal({
            title: "ERROR!",
            text:  "Algún campo incompleto",
            buttons: false,
            icon:  "error",
            timer: 1500,
          });
       }

       if(correcto == true){
          $.ajax({
              url: '../controllers/get_item_json.php',
              dataType: "json",
              async: false,
              data: {what: "residentes", idName: "dni_residente", id: $('#dni_residente').val()},
              success: function(data) {
                var dni = "";
                //SI EL DNI EXISTE ENTRA Y LO GUARDA
                if(data[0] != undefined){
                  dni = data[0]['dni_residente'];
                }

                //COMPRUEBO SI EL DNI EXISTE 
                   if(dni == $('#dni_residente').val()){
                    swal({
                      title: "ERROR!",
                      text:  "El residente ya existe",
                      buttons: false,
                      icon:  "error",
                      timer: 1500,
                    });
                   } else { //SI NO EXISTE LO GUARDO
                      var postObj = new Object();
                      postObj.dni_residente = $('#dni_residente').val();
                      postObj.nombre = $('#nombre_residente').val();
                      postObj.apellido1 = $('#apellido1_residente').val();
                      postObj.apellido2 = $('#apellido2_residente').val();
                      postObj.edad = $('#edad').val();
                      postObj.discapacidad = $('#discapacidad').val();
                      postObj.situacion = $('#situacion').val();
                      postObj.nombre_contacto = $('#nombre-contacto').val();
                      postObj.apellido_contacto = $('#apellido-contacto').val();
                      postObj.direccion = $('#direccion-contacto').val();
                      postObj.telefono = $('#tlf-contacto').val();
                      postObj.email = $('#email-contacto').val();

                      //TABLA RESIDENTE
                      $.ajax({
                          url: '../controllers/replace_service.php?table=residentes',
                          type: "POST",
                          data: postObj,
                          dataType: "html",
                      });

                      swal({
                        title: "Insertado!",
                        text:  "Personal insertado correctamente",
                        buttons: false,
                        icon:  "success",
                        timer: 1500,
                      });
                      setTimeout('location.reload()',2000);
                      //setTimeout("$('#page-top').load('welcome?id="+idUsuario+"');", 2500);
                      
                   }
              }    
          });
        } 

    });

    //CLIC BOTÓN BAJA DEL RESIDENTE
    $('#boton-baja-residente').click(function(){
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "residentes", idName: "dni_residente", id: $('#dni-baja-residente').val()},
          success: function(data) {
            var dni = "";
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              dni = data[0]['dni_residente'];
            }
            //SI EL DNI ES CORRECTO LO BORRA DE LA TABLA
              if(dni == $('#dni-baja-residente').val()){
                var postObj = new Object();
                postObj.idName = "id_residente";
                postObj.id = data[0]['id_residente'];
                postObj.fecha_fin = "fecha";
                
                $.ajax({
                    url: '../controllers/replace_service.php?table=residentes',
                    type: "POST",
                    data: postObj,
                    dataType: "html",
                });

                var postObj1 = new Object();
                postObj1.idName = "id_residente";
                postObj1.id = data[0]['id_residente'];
                postObj1.fecha_fin = "fecha";

                //TABLA HISTORICO_RES_HAB
                $.ajax({
                    url: '../controllers/replace_service.php?table=historico_res_hab',
                    type: "POST",
                    data: postObj1,
                    dataType: "html",
                });

                swal({
                  title: "BAJA",
                  text:  "Residente de baja correctamente",
                  buttons: false,
                  icon:  "success",
                  timer: 1500,
                });

                setTimeout('location.reload()',2000);
                //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);

              } else { //EL DNI NO EXISTE
                swal({
                  title: "ERROR!",
                  text:  "El DNI introducido no existe",
                  buttons: false,
                  icon:  "error",
                  timer: 1500,
                });
              }
          }    
      });
    });

    //CLICK EN DESPLEGABLE DNI RESIDENTE PARA AUTOCOMPLETAR LOS DATOS DEL RESIDENTE
    $('#dni-modificar-residente').click(function(){

      //RECUPERO LOS DATOS DEL RESIDENTE
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "residentes", idName: "dni_residente", id: $('#dni-modificar-residente').val()},
          success: function(data) {
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              idResidente = data[0]['id_residente'];
             
              $('#dni-res-modificado').val(data[0]['dni_residente']);
              $('#nombre-res-modificado').val(data[0]['nombre']);
              $('#apellido1-res-modificado').val(data[0]['apellido1']);
              $('#apellido2-res-modificado').val(data[0]['apellido2']);
              $('#edad-res-modificado').val(data[0]['edad']);
              $('#discapacidad-modificado').val(data[0]['discapacidad']);
              $('#situacion-modificado').val(data[0]['situacion']);
              $('#nombre-contacto-modificado').val(data[0]['nombre_contacto']);
              $('#apellido-contacto-modificado').val(data[0]['apellido_contacto']);
              $('#direccion-contacto-modificado').val(data[0]['direccion']);
              $('#tlf-contacto-modificado').val(data[0]['telefono']);
              $('#email-contacto-modificado').val(data[0]['email']);

            } 
          }    
      });

    });

    //CLICK EN EL BOTON DE MODIFICAR DATOS DEL RESIDENTE Y LOS GUARDA
    $('#boton-modificar-residente').click(function(){
      if($('#dni-res-modificado').val() == "" || $('#nombre-res-modificado').val() == "" || $('#apellido1-res-modificado').val() == "" || $('#apellido2-res-modificado').val() == "" || $('#edad-res-modificado').val() == "" || $('#discapacidad-modificado').val() == "" || $('#situacion-modificado').val() == "" || $('#nombre-contacto-modificado').val() == "" || $('#apellido-contacto-modificado').val() == "" || $('#direccion-contacto-modificado').val() == "" || $('#tlf-contacto-modificado').val() == "" || $('#email-contacto-modificado').val() == ""){
        swal({
          title: "ERROR",
          text:  "Algún campo vacio",
          buttons: false,
          icon:  "error",
          timer: 2000,
        });
      } else if(validaremail($('#email-contacto-modificado').val()) == false){
        swal({
          title: "ERROR!",
          text:  "El Email es incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if(validartelefono($('#tlf-contacto-modificado').val()) == false){
        swal({
          title: "ERROR!",
          text:  "El Telefono es incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else {
        //ACTUALIZO LA TABLA RESIDENTE
        var postObj = new Object();
        postObj.idName = "id_residente";
        postObj.id = idResidente;
        //postObj.dni_residente = $('#dni-res-modificado').val(); //No lo guardo por si lo intentan modificar por html el value
        postObj.nombre = $('#nombre-res-modificado').val();
        postObj.apellido1 = $('#apellido1-res-modificado').val();
        postObj.apellido2 = $('#apellido2-res-modificado').val();
        postObj.edad = $('#edad-res-modificado').val();
        postObj.discapacidad = $('#discapacidad-modificado').val();
        postObj.situacion = $('#situacion-modificado').val();
        postObj.nombre_contacto = $('#nombre-contacto-modificado').val();
        postObj.apellido_contacto = $('#apellido-contacto-modificado').val();
        postObj.direccion = $('#direccion-contacto-modificado').val();
        postObj.telefono = $('#tlf-contacto-modificado').val();
        postObj.email = $('#email-contacto-modificado').val();
      
      //TABLA RESIDENTE
      $.ajax({
          url: '../controllers/replace_service.php?table=residentes',
          type: "POST",
          data: postObj,
          dataType: "html",
      });

       swal({
          title: "MODIFICADO",
          text:  "Residente Modificado correctamente",
          buttons: false,
          icon:  "success",
          timer: 2000,
        });
       setTimeout('location.reload()',2000);
        //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);
      }
    });

    //CLICK BOTON QUE GENERA LA TABLA CON LOS DATOS DE CONTACTO DEL RESIDENTE
    $('#boton-ver-datos').click(function(){
     var idResidente = 0;

      idResidente = comprobarDNIResidente($('#dni-residente-contacto').val());

      if(idResidente != 0){
        $('#ver-tabla-datos').show(); //tabla-horario
        tablaDatosContacto(idResidente);
      } else {
        $('#ver-tabla-datos').hide();
      }
         
    });

    //CLICK BOTON DE ASIGNAR HABITACION AL RESIDENTE
    $('#boton-asignar-habitacion').click(function(){
      var idResidente = 0;
      var idHabitacion = 0;
      var numeroCamas = 0;
      var contador = 0;
      var array = new Array();
      var asignada = true;

      //CONSUTLO QUE EL DNI DEL RESIDENTE EXISTA y me devuelve la id del residente
      idResidente = comprobarDNIResidente($('#dni-residente-habitacion').val());

       //CONSULTO QUE EL NUMERO DE HABITACION EXISTA
      array = comprobarNumeroHabitacion($('#numero-habitacion').val());
      idHabitacion = array[0]; //idhabitacion
      numeroCamas = array[1]; //numero de camas ocupadas

       //COMPRUEBO QUE EL RESIDENTE NO TENGO YA UNA CAMA ASIGNADA
      asignada = comprobarCamaAsignada(idResidente);

      //entra solo si el residente no tiene cama asignada
      if(asignada == true && idHabitacion != 0 && idResidente != 0){
        //CONSULTO CUANTAS CAMAS ESTAN OCUPADAS EN DICHA HABITACION
        $.ajax({
            url: '../controllers/get_item_json.php',
            dataType: "json",
            async: false,
            data: {what: "historico_res_hab", idName: "id_habitacion", id: idHabitacion},
            success: function(data) {
              if(data[0] != undefined){
                for(var i = 0; i< data.length; i++ ){
                  if(data[i]['id_habitacion'] == idHabitacion){
                    if(data[i]['fecha_fin'] == null){
                      contador++;
                    }
                  }
                }
              }
            }    
        });

        //SI QUEDA CAMA LIBRE ENTRA
        if(contador < numeroCamas){

          var postObj = new Object();
          postObj.id_residente = idResidente;
          postObj.id_habitacion = idHabitacion;

          //TABLA HISTORICO_RES_HAB
          $.ajax({
              url: '../controllers/replace_service.php?table=historico_res_hab',
              type: "POST",
              data: postObj,
              dataType: "html",
          });

          swal({
            title: "Asignado!",
            text:  "Residente asignado correctamente",
            buttons: false,
            icon:  "success",
            timer: 1500,
          });
          setTimeout('location.reload()',2000);
          //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);

        } else {
          swal({
            title: "ERROR!",
            text:  "Dicha habitación no tiene camas disponibles",
            buttons: false,
            icon:  "error",
            timer: 1500,
          });
        }
      }
    });

    //CLICK BOTON MOVER RESIDENTE DE HABITACION
    $('#boton-mover-habitacion').click(function(){
      var idResidente = 0;
      var idHabitacion = 0;
      var numeroCamas = 0;
      var array = new Array();
      var asignada = true;
      var id = 0;

      //CONSUTLO QUE EL DNI DEL RESIDENTE EXISTA
      idResidente = comprobarDNIResidente($('#dni-residente-mover').val());

       //CONSULTO QUE EL NUMERO DE HABITACION EXISTA
      array = comprobarNumeroHabitacion($('#numero-mover').val());
      idHabitacion = array[0];
      numeroCamas = array[1];

      //COMPRUEBO QUE EL RESIDENTE TENGA YA UNA CAMA ASIGNADA, sino no se le puede mover
      $.ajax({
        url: '../controllers/get_item_json.php',
        dataType: "json",
        async: false,
        data: {what: "historico_res_hab", idName: "id_residente", id: idResidente},
        success: function(data) {
          if(data[0] == undefined){
            asignada = false;//si no tiene cama asignada pasa a false
            swal({
              title: "ERROR!",
              text:  "El residente no tiene cama asignada. Asignele una habitacion primero.",
              buttons: false,
              icon:  "error",
              timer: 2000,
            });
          } else {
            for(var i = 0; i< data.length; i++ ){
              if(data[i]['id_residente'] == idResidente){
                if(data[i]['id_habitacion'] == idHabitacion){ //si la cama asignada es la misma que se le está poniendo
                  if(data[i]['fecha_fin'] == null){//y esa cama todavía esta en ella
                    asignada = false;
                    swal({
                      title: "ERROR!",
                      text:  "Se le está asignando la misma habitación",
                      buttons: false,
                      icon:  "error",
                      timer: 2000,
                    });
                    break;
                  }
                }
              }
            } 
          }
        }    
      });

      if(asignada == true && idResidente != 0 && idHabitacion != 0){
        var postObj = new Object();
        postObj.idName = "id";
        postObj.id = id_historico_res_hab;
        postObj.fecha_fin = "fecha";

        //TABLA HISTORICO_RES_HAB
        $.ajax({
            url: '../controllers/replace_service.php?table=historico_res_hab',
            type: "POST",
            data: postObj,
            dataType: "html",
        });

        var postObj1 = new Object();
        postObj1.id_residente = idResidente;
        postObj1.id_habitacion = idHabitacion;

        //TABLA HISTORICO_RES_HAB
        $.ajax({
            url: '../controllers/replace_service.php?table=historico_res_hab',
            type: "POST",
            data: postObj1,
            dataType: "html",
        });

        swal({
          title: "Reasignado!",
          text:  "Residente movido correctamente",
          buttons: false,
          icon:  "success",
          timer: 1500,
        });

        setTimeout('location.reload()',2000);
        //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);
      }

    });

    //CLICK BOTON AGREGAR DIARIO DE AUXILIAR RESPECTO AL RESIDENTE
    $('#boton-diario-auxiliar').click(function(){
      var idResidente = 0;

      idResidente = comprobarDNIResidente($('#dni-residente-auxiliar').val());

      if(idResidente == 0){
        swal({
          title: "ERROR!",
          text:  "Seleccione un Residente",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if ($('#texto-diario').summernote('code') == "<p><br></p>"){
        swal({
          title: "ERROR!",
          text:  "No has agregado ninguna incidencia",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else {
        var postObj = new Object();
        postObj.id_personal = idUsuario;
        postObj.id_residente = idResidente;
        postObj.diario = $('#texto-diario').summernote('code');

        //TABLA HISTORICO_AUX_RES
        $.ajax({
            url: '../controllers/replace_service.php?table=historico_aux_res',
            type: "POST",
            data: postObj,
            dataType: "html",
        });

        swal({
          title: "Agregada!",
          text:  "Consulta agregada correctamente",
          buttons: false,
          icon:  "success",
          timer: 1500,
        });

        setTimeout('location.reload()',2000);
        //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);

      } 

    });

    //CLICK BOTON AGREGAR CONSULTA
    $('#boton-agregar-consulta').click(function(){
      var idResidente = 0;

      idResidente = comprobarDNIResidente($('#dni-residente-consulta').val());
      console.log(idResidente);

      if(idResidente == 0){
        swal({
          title: "ERROR!",
          text:  "Seleccione un Residente",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if ($('#texto-consulta').summernote('code') == "<p><br></p>"){
        swal({
          title: "ERROR!",
          text:  "No has agregado ninguna consulta",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else { 
        var postObj = new Object();
        postObj.id_residente = idResidente;
        postObj.id_medico = idUsuario;
        postObj.receta = $('#texto-consulta').summernote('code');

        //TABLA HISTORICO_RES_MED
        $.ajax({
            url: '../controllers/replace_service.php?table=historico_res_med',
            type: "POST",
            data: postObj,
            dataType: "html",
        });

        swal({
          title: "Agregada!",
          text:  "Consulta agregada correctamente",
          buttons: false,
          icon:  "success",
          timer: 1500,
        });

        setTimeout('location.reload()',2000);
        //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);

      } 

    });

    //CLICK BOTON TABLA QUE GENERA LA CONSULTA DEL RESIDENTE QUE SE QUIERE VER
    $('#boton-tabla-consulta').click(function(){
      var idResidente = 0;
      var consulta = true;

      idResidente = comprobarDNIResidente($('#dni-residente-tabla').val());

      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "historico_res_med", idName: "id_residente", id: idResidente},
          success: function(data) {
            if(data[0] == undefined){
              consulta = false;
              swal({
                title: "ERROR!",
                text:  "Dicho Residente no tiene ninguna consulta",
                buttons: false,
                icon:  "error",
                timer: 1500,
              });
            }    
          }    
      });

      if(idResidente != 0 && consulta == true){
        $('#ver-tabla-consulta').show();
        tablaConsulta(idResidente);
      } else {
        $('#ver-tabla-consulta').hide();
      }
      
    });

    //CLICK BOTON AGREGAR HABITACION QUE HA LIMPIADO
    $('#boton-limpieza-habitacion').click(function(){
      if($('#id-habitacion').val() != 0){

        var postObj = new Object();
        postObj.id_habitacion = $('#id-habitacion').val();
        postObj.id_limpieza = idUsuario;

        if($('#texto-limpieza').summernote('code') == "<p><br></p>"){
          postObj.observaciones = "Todo correcto.";
        } else {
          postObj.observaciones = $('#texto-limpieza').summernote('code');
        }

        //TABLA HISTORICO_HAB_LIM
        $.ajax({
            url: '../controllers/replace_service.php?table=historico_hab_lim',
            type: "POST",
            data: postObj,
            dataType: "html",
        });

        swal({
          title: "Agregado!",
          text:  "Limpieza agregado correctamente",
          buttons: false,
          icon:  "success",
          timer: 1500,
        });

        setTimeout('location.reload()',2000);
        //setTimeout("$('#main-content').load('welcome-admin.php?id="+idUsuario+"');", 2500);

      } else {
        swal({
          title: "ERROR!",
          text:  "Selecciona una habitación",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      }
    });

    //CLICK BOTON AGREGAR PLAN PARA GUARDARLO EN LA BBDD
    $('#boton-agregar-plan').click(function(){
      
      if($('#area-social').summernote('code') == "<p><br></p>" || $('#tratamiento').val() == "" || $('#nutricional').val() == "" || $('#sueno').val() == "" || $('#dolor').val() == "" || $('#seguridad').val() == "" || $('#movilidad').val() == "" || $('#vcognitiva').val() == "" || $('#vafectiva').val() == "" || $('#conducta').val() == "" || $('#ducha').val() == "" || $('#aseo').val() == "" || $('#deambulacion').val() == "" || $('#alimentacion').val() == "" || $('#aficiones').val() == "" || $('#tiempo_libre').val() == "" || $('#actividades').val() == ""){
        swal({
          title: "ERROR!",
          text:  "Algún campo vacio o incompleto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if(tiene_plan == true){
        var postObj = new Object();
        postObj.id_residente = id_residente;
        postObj.area_social = $('#area-social').summernote('code');
        postObj.tratamiento = $('#tratamiento').val();
        postObj.nutricional = $('#nutricional').val();
        postObj.sueno = $('#sueno').val();
        postObj.dolor = $('#dolor').val();
        postObj.seguridad = $('#seguridad').val();
        postObj.movilidad = $('#movilidad').val();
        postObj.vcognitiva = $('#vcognitiva').val();
        postObj.vafectiva = $('#vafectiva').val();
        postObj.conducta = $('#conducta').val();
        postObj.ducha = $('#ducha').val();
        postObj.aseo = $('#aseo').val();
        postObj.deambulacion = $('#deambulacion').val();
        postObj.alimentacion = $('#alimentacion').val();
        postObj.aficiones = $('#aficiones').val();
        postObj.tiempo_libre = $('#tiempo_libre').val();
        postObj.actividades = $('#actividades').val();
        postObj.fecha_evaluacion = "fecha_evaluacion";

        //TABLA PAI
        $.ajax({
            url: '../controllers/replace_service.php?table=pai',
            type: "POST",
            data: postObj,
            dataType: "html",
        });

        swal({
          title: "Agregado!",
          text:  "PAI insertado correctamente",
          buttons: false,
          icon:  "success",
          timer: 1500,
        });

        setTimeout('location.reload()',2000);
      } else {
        swal({
          title: "ERROR!",
          text:  "El residente ya tiene un PAI",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      }

    });

    //CLICK BOTON MODIFICAR PLAN PARA GUARDARLO EN LA BBDD
    $('#boton-modificar-plan').click(function(){
      
      if($('#area-social-mod').summernote('code') == "<p><br></p>" || $('#tratamiento-mod').val() == "" || $('#nutricional-mod').val() == "" || $('#sueno-mod').val() == "" || $('#dolor-mod').val() == "" || $('#seguridad-mod').val() == "" || $('#movilidad-mod').val() == "" || $('#vcognitiva-mod').val() == "" || $('#vafectiva-mod').val() == "" || $('#conducta-mod').val() == "" || $('#ducha-mod').val() == "" || $('#aseo-mod').val() == "" || $('#deambulacion-mod').val() == "" || $('#alimentacion-mod').val() == "" || $('#aficiones-mod').val() == "" || $('#tiempo_libre-mod').val() == "" || $('#actividades-mod').val() == ""){
        swal({
          title: "ERROR!",
          text:  "Algún campo vacio o incompleto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      } else if(tiene_plan == true){
        var postObj = new Object();
        postObj.idName = "id_residente";
        postObj.id = id_residente;
        postObj.area_social = $('#area-social-modificar').summernote('code');
        postObj.tratamiento = $('#tratamiento-mod').val();
        postObj.nutricional = $('#nutricional-mod').val();
        postObj.sueno = $('#sueno-mod').val();
        postObj.dolor = $('#dolor-mod').val();
        postObj.seguridad = $('#seguridad-mod').val();
        postObj.movilidad = $('#movilidad-mod').val();
        postObj.vcognitiva = $('#vcognitiva-mod').val();
        postObj.vafectiva = $('#vafectiva-mod').val();
        postObj.conducta = $('#conducta-mod').val();
        postObj.ducha = $('#ducha-mod').val();
        postObj.aseo = $('#aseo-mod').val();
        postObj.deambulacion = $('#deambulacion-mod').val();
        postObj.alimentacion = $('#alimentacion-mod').val();
        postObj.aficiones = $('#aficiones-mod').val();
        postObj.tiempo_libre = $('#tiempo_libre-mod').val();
        postObj.actividades = $('#actividades-mod').val();
        postObj.fecha_evaluacion = "fecha";
        console.log(postObj);
        //TABLA PAI
        $.ajax({
            url: '../controllers/replace_service.php?table=pai',
            type: "POST",
            data: postObj,
            dataType: "html",
        });

        swal({
          title: "Modificado!",
          text:  "PAI modificado correctamente",
          buttons: false,
          icon:  "success",
          timer: 1500,
        });

        setTimeout('location.reload()',2000);
      } else {
        swal({
          title: "ERROR!",
          text:  "PAI Incorrecto",
          buttons: false,
          icon:  "error",
          timer: 1500,
        });
      }

    });



    //-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    //AQUÍ LAS FUNCIONES DE TABLA Y COMPROBACIONES
    //-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

    //FUNCION QUE ME GENERA LA TABLA PERSONAL HISTORICO
    var tablaPersonalHistorico = function(){
       var table = $('#tabla-personal-historico').DataTable({
          dom: 'Bfrtip',
          buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
          "destroy":true, 
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=personalhistorico"
          },
          "columns":[
            {"data":"id"},
            {"data":"dni_personal"},
            {"data":"nombre"},
            {"data":"apellido1"},
            {"data":"apellido2"},
            {"data":"cargo"},
            {"data":"tipo"}
          ]
       });
    }

    //FUNCION QUE ME GENERA LA TABLA PERSONAL ACTIVO
    var tablapersonalactivo = function(){
     var table = $('#tabla-personal-activo').DataTable({
        dom: 'Bfrtip',
        buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
        "destroy":true, 
        "ajax":{
          "method":"POST",
          "url":"../models/funciones-tablas.php?funcion=personalactivo"
        },
        "columns":[
          {"data":"id"},
          {"data":"dni_personal"},
          {"data":"nombre"},
          {"data":"apellido1"},
          {"data":"apellido2"},
          {"data":"cargo"},
          {"data":"tipo"}
        ]
     });
    }

    //FUNCION QUE GENERA TABLA CON DATOS DEL PERSONAL SELECCIONADO PARA GENERAR EL HORARIO
    var tablaPersonalHorario = function(id){
      var table = $('#tabla-horario').DataTable({
          dom: '', // dom: 'Bfrtip'
          buttons: [
              /*'excel', 'pdf', 'print'*/
          ],
          "destroy":true, //para que la tabla la pueda volver a cargar en cada consulta
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=horario-personal&idPersonal="+id+""
          },
          "columns":[
            {"data":"nombre"},
            {"data":"apellido1"},
            {"data":"apellido2"},
            {"data":"cargo"},
            {"data":"horario"}
          ]
       });
    }

    //FUNCION QUE GENERA TABLA CON DATOS DE CONTACTO DEL RESIDENTE
    var tablaDatosContacto = function(id){
      var table = $('#tabla-datos').DataTable({
          dom: '', //dom: 'Bfrtip',
          buttons: [
              /*'excel', 'pdf', 'print'*/
          ],
          "destroy":true, //para que la tabla la pueda volver a cargar en cada consulta
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=datos-contacto&idResidente="+id+""
          },
          "columns":[
            {"data":"nombre_contacto"},
            {"data":"apellido_contacto"},
            {"data":"direccion"},
            {"data":"telefono"},
            {"data":"email"}
          ]
       });
    }

    //FUNCION QUE GENERA TABLA DE TODOS LOS RESIDENTES (HISTORICO)
    var tablaResidenteHistorico = function(){
     var table = $('#tabla-residente-historico').DataTable({
        dom: 'Bfrtip',
        buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
        "destroy":true,
        "ajax":{
          "method":"POST",
          "url":"../models/funciones-tablas.php?funcion=residente-historico"
        },
        "columns":[
          {"data":"dni_residente"},
          {"data":"nombre"},
          {"data":"apellido1"},
          {"data":"apellido2"},
          {"data":"edad"},
          {"data":"discapacidad"},
          {"data":"situacion"},
          {"data":"fecha_inicio"},
          {"data":"fecha_fin"}
        ]
     });
    }

    //FUNCION QUE GENERA TABLA CON TODOS LOS RESIDENTES ACTIVOS ACTUALES
    var tablaResidenteDeAlta = function(){
      var table = $('#tabla-residente-de-alta').DataTable({
          dom: 'Bfrtip',
          buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
          "destroy":true,
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=residente-de-alta"
          },
          "columns":[
            {"data":"dni_residente"},
            {"data":"nombre"},
            {"data":"apellido1"},
            {"data":"apellido2"},
            {"data":"edad"},
            {"data":"discapacidad"},
            {"data":"situacion"},
            {"data":"fecha_inicio"}
          ]
       });
    }

    //FUNCION QUE GENERA LA TABLA RESIDENTE HABITACIÓN
    var tablaResHab = function(){
      var table = $('#cargar-tabla-residente-habitacion').DataTable({
          dom: 'Bfrtip',
          buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
          "destroy":true, //para que la tabla la pueda volver a cargar en cada consulta
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=residhab"
          },
          "columns":[
            {"data":"nombre"},
            {"data":"apellido1"},
            {"data":"dni"},
            {"data":"idhabitacion"},
            {"data":"fecha_inicio"},
            {"data":"fecha_fin"}
          ]
       });
    }

    //FUNCION QUE GENERA LA TABLA AUXILIAR RESIDENTE
    var tablaAuxRes = function(){
      var table = $('#cargar-tabla-auxiliar-residente').DataTable({
          dom: 'Bfrtip',
          buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
          "destroy":true, //para que la tabla la pueda volver a cargar en cada consulta
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=auxres"
          },
          "columns":[
            {"data":"nombre"},
            {"data":"apellido1"},
            {"data":"dni"},
            {"data":"fecha"},
            {"data":"diario"}
          ]
       });
    }

    //FUNCION QUE GENERA LA TABLA CONSULTAS DE UN RESIDENTE
    var tablaConsulta = function(id){
      var table = $('#tabla-consulta').DataTable({
          dom: 'Bfrtip',
          buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
          "destroy":true, //para que la tabla la pueda volver a cargar en cada consulta
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=consulta&idResidente="+id+""
          },
          "columns":[
            {"data":"residente"},
            {"data":"personal"},
            {"data":"fecha"},
            {"data":"receta"}
          ]
       });
    }

    //FUNCION QUE GENERA LA TABLA LIMPIEZA DE HABITACIONES
    var tablaLimpieza = function(){
      var table = $('#cargar-tabla-limpieza').DataTable({
          dom: 'Bfrtilp',
            buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    pageSize: 'A3'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print" style="font-size: 1.25rem"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                }
            ],
          "destroy":true, //para que la tabla la pueda volver a cargar en cada consulta
          "ajax":{
            "method":"POST",
            "url":"../models/funciones-tablas.php?funcion=limpieza"
          },
          "columns":[
            {"data":"id_habitacion"},
            {"data":"nombre"},
            {"data":"apellido1"},
            {"data":"fecha"},
            {"data":"observaciones"}

          ]
       });
    }

    //FUNCION QUE COMPRUEBA SI EL DNI DEL PERSONAL EXISTE Y LO DEVUELVE (0 = NO EXISTE - != 0 EXISTE)
    function comprobarDNIPersonal(dni){
      var idPersonal = 0;
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "personal", idName: "dni_personal", id: dni},
          success: function(data) {
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              idPersonal = data[0]['id'];
            } else {
              swal({
                  title: "ERROR!",
                  text:  "El DNI introducido no existe",
                  icon:  "error",
                  timer: 2000,
                });
            }   
          }    
      });
      return idPersonal;
    }

    //FUNCION QUE COMPRUEBA SI EL DNI DEL RESIDENTE EXISTE Y DEVUELVE  LA ID DEL RESIDENTE
    function comprobarDNIResidente(dni){
      var idResidente = 0;
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "residentes", idName: "dni_residente", id: dni},
          success: function(data) {
            //SI EL DNI EXISTE ENTRA Y LO GUARDA
            if(data[0] != undefined){
              idResidente = data[0]['id_residente'];
            } else {
              swal({
                  title: "ERROR!",
                  text:  "El DNI introducido no existe",
                  icon:  "error",
                  timer: 2000,
                });
            }   
          }    
      });
      return idResidente;
    }

    //FUNCION QUE COMPRUEBA EL NUMERO DE HABITACION EXISTE, SI EXISTE DEVUELVE IDHABITACION Y NUMERO DE CAMAS
    function comprobarNumeroHabitacion(numero){
      var array = new Array();
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "habitaciones", idName: "id_habitacion", id: numero},
          success: function(data) {
            if(data[0] != undefined){
              array[0] = data[0]['id_habitacion'];
              array[1] = data[0]['num_camas'];
            } else {
              swal({
                  title: "ERROR!",
                  text:  "La habitación introducida no existe",
                  buttons: false,
                  icon:  "error",
                  timer: 1500,
                });
            } 
          }    
      });

      return array;
    }
   
    //FUNCION QUE COMPRUEBA SI EL RESIDENTE TIENE UNA CAMA ASIGNADA O NO
    function comprobarCamaAsignada(idResidente){
      var asignada = true;
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "historico_res_hab", idName: "id_residente", id: idResidente},
          success: function(data) {
            if(data[0] != undefined){
              for(var i = 0; i< data.length; i++ ){
                if(data[i]['fecha_fin'] == null){
                  asignada = false;//si tiene cama asignada pasa a false
                  swal({
                    title: "ERROR!",
                    text:  "El usuario ya tiene una habitación, la número: "+data[i]['id_habitacion']+"",
                    buttons: false,
                    icon:  "error",
                    timer: 2000,
                  });
                  break;
                }
              }
            }
          }    
      });
      return asignada;
    }

    //FUNCION QUE CARGA LOS DATOS PERSONALES DEL PERFIL DE CADA USUARIO
    function cargarMisDatos(idUsuario){
      var cargo_personal = "";
      var id = 0;
      $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "personal", idName: "id", id: idUsuario},
          success: function(data) {
            if(data[0] != undefined){
              $('#dni-misdatos').val(data[0]['dni_personal']);
              $('#nombre-misdatos').val(data[0]['nombre']);
              $('#apellido1-misdatos').val(data[0]['apellido1']);
              $('#apellido2-misdatos').val(data[0]['apellido2']);
              $('#cargo-misdatos').val(data[0]['cargo']);
              $('#tipo-misdatos').val(data[0]['tipo']);
              $('#usuario-misdatos').val(data[0]['usuario']);
              //$('#contrasena-misdatos').val(data[0]['contrasena']);
              $('#horario-misdatos').val(data[0]['horario']);
              id = data[0]['id'];
              cargo_personal = data[0]['cargo'];
            } 
          }    
      });

      //SI EL CARGO ES MEDICO, PARA CARGAR LOS DATOS DEL MEDICO
      if(cargo_personal == "medico" || cargo_personal == "enfermero"){
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "medico", idName: "id_medico", id: id},
          success: function(data) {
            if(data[0] != undefined){
              $('#especialidad-misdatos').val(data[0]['especialidad']);
              $('#ver-especialidad-misdatos').show();
              $('#ver-especialidad-misdatos1').show();
              $('#ver-planta-misdatos').hide();
              $('#ver-planta-misdatos1').hide();
            } 
          }    
        });
        //SI EL CARGO ES AUXILIAR
      } else if(cargo_personal == "auxiliar"){
        $.ajax({
          url: '../controllers/get_item_json.php',
          dataType: "json",
          async: false,
          data: {what: "auxiliar", idName: "id_auxiliar", id: id},
          success: function(data) {
            if(data[0] != undefined){
              $('#planta-misdatos').val(data[0]['planta']);
              $('#ver-especialidad-misdatos').hide();
              $('#ver-especialidad-misdatos1').hide();
              $('#ver-planta-misdatos').show();
              $('#ver-planta-misdatos1').show();
            } 
          }    
        });
      } 

    }

    //FUNCION QUE ME RELLENA EL SELECT CON LAS HABITACIONES
    var selectHabitaciones = function(){
      <?php 
        $sql_habitacion = "SELECT id_habitacion FROM habitaciones";
        $rs_habitacion = mysqli_query($conn,$sql_habitacion);

        while($data = mysqli_fetch_assoc($rs_habitacion)){

      ?>
         $('#id-habitacion').append('<option value="'+<?= $data['id_habitacion'] ?>+'">'+<?= $data['id_habitacion'] ?>+'</option>');
      <?php 
        }
      ?>
    }

    
    

  });
</script>
