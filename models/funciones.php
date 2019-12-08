<?php

/*extraigo el cargo del usuario*/
function cargoUsuario($idUser, $conn){
	$sql = "SELECT cargo, nombre, apellido1 FROM personal WHERE id = '$idUser'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
	
	return $row;
}	

//COMPRUEBO SI EXISTE EL DNI DEL RESIDENTE
function comprobarResidente($dni, $conn){
	$sql = "SELECT dni_residente FROM residentes";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	return $row;
}

//TOTAL DE PERSONAL
function totalPersonal($conn){
	$sql = "SELECT COUNT(id) AS total FROM personal WHERE fecha_fin IS NULL";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	return $row['total'];
}

//TOTAL DE RESIDENTES
function totalResidente($conn){
	$sql = "SELECT COUNT(id_residente) AS total FROM residentes WHERE fecha_fin IS NULL";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	return $row['total'];
}

//TOTAL DE HABITACIONES OCUPADAS
function totalHabitaciones($conn){
	$sql = "SELECT COUNT(habitaciones.id_habitacion) AS total FROM habitaciones, historico_res_hab WHERE habitaciones.id_habitacion = historico_res_hab.id_habitacion AND historico_res_hab.fecha_fin IS NULL";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	$sql1 = "SELECT COUNT(habitaciones.id_habitacion) AS total FROM habitaciones";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_assoc($result1);

	$resultado = (($row['total'] * 100) / $row1['total']);

	return number_format($resultado);
}

//TOTAL DE HABITACIONES OCUPADAS
function habitacionesOcupadas($conn){
	$sql = "SELECT COUNT(habitaciones.id_habitacion) AS total FROM habitaciones, historico_res_hab WHERE habitaciones.id_habitacion = historico_res_hab.id_habitacion AND historico_res_hab.fecha_fin IS NULL";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);

	return $row['total'];
}

//TODOS LOS DNI DE RESIDENTES
function totalDNIresidentes($conn){
	$sql = "SELECT dni_residente FROM residentes WHERE fecha_fin IS NULL";
	$result = mysqli_query($conn,$sql);

	$opcion = "";

	while($data = mysqli_fetch_assoc($result)){

		$opcion .= "<option value=".$data['dni_residente'].">".$data['dni_residente']."</option>";
       
    }

	return $opcion;
}


//FUNCION QUE SACA EL NUMERO DE LAS HABITACIONES LIBRES
function habitacionesLibres($conn){
	$sql = "SELECT habitaciones.id_habitacion AS id FROM habitaciones WHERE habitaciones.num_camas > (SELECT COUNT(historico_res_hab.id_habitacion) FROM historico_res_hab WHERE habitaciones.id_habitacion = historico_res_hab.id_habitacion AND historico_res_hab.fecha_fin IS NULL)";
	$result = mysqli_query($conn,$sql);

	$opcion = "";

	while($data = mysqli_fetch_assoc($result)){

		$opcion .= "<option value=".$data['id'].">".$data['id']."</option>";
       
    }

	return $opcion;
}


?>