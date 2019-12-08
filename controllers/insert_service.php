<?php

include_once('../db/config.php');
include_once("json.class.php");

print_r($_POST);

if ($conn)
{	
	$array_keys = array_keys($_POST);
	$tableName = $_GET["table"];
	$sql = "insert into " . $tableName . " (";
	for ($i = 0; $i < count($array_keys); $i++) {
		if (
			($array_keys[$i] == "idName"))
			continue;
			
		if ($i != 0)
			$sql .= ", ";
		else
			$sql .= "";
		$sql .= $array_keys[$i];
		$sql .= "";
	}
		
	$sql .= ") values (";	
	for ($i = 0; $i < count($array_keys); $i++) {
		if ($i != 0)
			$sql .= ",";
		
		if ($array_keys[$i] == "contrasena") {
			$valor = $_POST[$array_keys[$i]];
			$clave = password_hash($valor, PASSWORD_DEFAULT);
			
			$sql .= "'" . $clave . "'";
		}
		else {
			$val = $_POST[$array_keys[$i]];
			if ($val == "null")	{
				$sql .= "null";
			} else if($val == "fecha_evaluacion"){
				$sql .= "now()";
			} else {
				$sql .= "'" . $val . "'";
			}
		}
	}
	
	$sql .= ")";
    echo $sql;

	//saveFile($sql, "logs/insert.txt");
	if (mysqli_query($conn, $sql)) {
		$lastId = mysqli_insert_id($conn);
		echo $lastId;		
	}
	else {
		echo "0";
	}
}
else
	echo "0";

?>
