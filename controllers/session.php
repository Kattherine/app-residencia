<?php
   
	
   session_start();
   require('../db/config.php');
   // require_once('../models/modelogin.php')
   
   $user_check = $_SESSION['login_user'];
   
   
   $ses_sql = mysqli_query($conn,"SELECT usuario FROM personal WHERE usuario = '$user_check' AND fecha_fin IS NULL;");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['usuario'];//cambiar por el nombre del campo que tenga la tabla
   
	// $datos = datosWelcome($conn, $cliente);
   
   if(!isset($_SESSION['login_user'])){
      header("location: ../login.php");
      die();
   }
?>