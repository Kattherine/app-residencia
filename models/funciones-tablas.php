<?php
include_once('../db/config.php');

	//TABLA PERSONAL
	if($_REQUEST['funcion'] == "personalhistorico"){
		//genero el json para mostrar en una tabla el personal
		$sql = "SELECT id, dni_personal, nombre, apellido1, apellido2, cargo, tipo FROM personal";

	} 
	else if($_REQUEST['funcion'] == "personalactivo"){
		//genero el json para mostrar en una tabla el personal que trabaja actualmente
		$sql = "SELECT id, dni_personal, nombre, apellido1, apellido2, cargo, tipo FROM personal where fecha_fin is NULL";
		
	}
	else if($_REQUEST['funcion'] == "residente-historico"){//TABLA RESIDENTE HISTÓRICO
		//genero el json para mostrar en una tabla el residente
		$sql = "SELECT dni_residente, nombre, apellido1, apellido2, edad, discapacidad, situacion, DATE_FORMAT(fecha_inicio, '%m/%d/%Y %H:%i') AS fecha_inicio, DATE_FORMAT(fecha_fin, '%m/%d/%Y %H:%i') AS fecha_fin FROM residentes";
		
	}
	else if($_REQUEST['funcion'] == "residente-de-alta"){//TABLA RESIDENTE HISTÓRICO
		//genero el json para mostrar en una tabla el residente
		$sql = "SELECT dni_residente, nombre, apellido1, apellido2, edad, discapacidad, situacion, DATE_FORMAT(fecha_inicio, '%m/%d/%Y %H:%i') AS fecha_inicio FROM residentes where fecha_fin is NULL";
		
	}  
	else if($_REQUEST['funcion'] == "consulta"){
		//genero el json para mostrar en una tabla  historico_res_med
		$idResidente = $_REQUEST['idResidente'];
		$sql = "SELECT residentes.dni_residente AS residente, personal.nombre AS personal, DATE_FORMAT(historico_res_med.fecha, '%m/%d/%Y %H:%i') AS fecha, historico_res_med.receta AS receta FROM residentes, personal, historico_res_med WHERE historico_res_med.id_residente = $idResidente AND historico_res_med.id_residente = residentes.id_residente AND personal.id = historico_res_med.id_medico";
		//echo $sql;

	} else if($_REQUEST['funcion'] == "limpieza"){ //
		//genero el json para mostrar en una tabla  historico_hab_lim
		$sql = "SELECT id_habitacion, nombre, apellido1, DATE_FORMAT(historico_hab_lim.fecha, '%m/%d/%Y %H:%i') AS fecha, observaciones FROM historico_hab_lim, personal WHERE personal.id = historico_hab_lim.id_limpieza";
		
	} else if($_REQUEST['funcion'] == "auxres"){
		//genero el json para mostrar en una tabla  historico_hab_lim
		$sql = "SELECT personal.nombre AS nombre, personal.apellido1 AS apellido1, residentes.dni_residente AS dni, DATE_FORMAT(historico_aux_res.fecha, '%m/%d/%Y %H:%i') AS fecha, historico_aux_res.diario AS diario FROM historico_aux_res, personal, residentes WHERE historico_aux_res.id_personal = personal.id AND historico_aux_res.id_residente = residentes.id_residente";

	} else if($_REQUEST['funcion'] == "residhab"){
		//genero el json para mostrar en una tabla  historico_res-hab
		$sql = "SELECT residentes.nombre AS nombre, residentes.apellido1 AS apellido1, residentes.dni_residente AS dni, historico_res_hab.id_habitacion AS idhabitacion, DATE_FORMAT(historico_res_hab.fecha_inicio, '%m/%d/%Y %H:%i') AS fecha_inicio, DATE_FORMAT(historico_res_hab.fecha_fin, '%m/%d/%Y %H:%i') AS fecha_fin FROM residentes, habitaciones, historico_res_hab WHERE historico_res_hab.id_residente = residentes.id_residente AND historico_res_hab.id_habitacion = habitaciones.id_habitacion";
	} else if($_REQUEST['funcion'] == "horario-personal"){ //horario de cada profesional
		$idPersonal = $_REQUEST['idPersonal'];
		$sql = "SELECT nombre, apellido1, apellido2, cargo, horario FROM personal where id = $idPersonal and fecha_fin is NULL";
		
	} else if($_REQUEST['funcion'] == "datos-contacto"){ //Datos de contacto de cada residente
		$idResidente = $_REQUEST['idResidente'];
		$sql = "SELECT nombre_contacto, apellido_contacto, direccion, telefono, email FROM residentes WHERE id_residente = $idResidente AND fecha_fin IS NULL";
		
	} 


	$result = mysqli_query($conn,$sql);

	while($data = mysqli_fetch_assoc($result)){
		$array['data'][] = $data;
	}

	echo json_encode($array);

?>