<?php

include_once('../db/config.php');
include_once("json.class.php");

	//print_r($_POST);

if ($conn)
{	
	$array_keys = array_keys($_POST);

	$tableName = $_GET["table"];
	$id = $_REQUEST["id"];
	$nameId = $_REQUEST["idName"];
	$sql = "update " . $tableName . " set ";	
	$bFirst = true;
	for ($i = 0; $i < count($array_keys); $i++) {
		if (($array_keys[$i] == "id") ||
			($array_keys[$i] == "idName") ||
			($array_keys[$i] == $_REQUEST["idName"]))
			continue;
		
		if (!$bFirst)
			$sql .= ",";		
			
		$val = $_POST[$array_keys[$i]];		
		if ($array_keys[$i] == "contrasena") { 
			$valor = $_POST[$array_keys[$i]];
			$clave = password_hash($valor, PASSWORD_DEFAULT);
			$val = $clave;
		}
		if ($val == "null"){
			$sql .= $array_keys[$i] . " = null";
		} else if ($val == "fecha"){
			$sql .= $array_keys[$i] . " = now()";
		} else {
			$sql .= $array_keys[$i] . " = '" . $val . "'";
		}
		
		$bFirst = false;
	}
	
	$sql .= " where " . $nameId . "='" . $id . "'";
   	//echo $sql;
	
	//saveFile($sql, "logs/update.txt");
	if (mysqli_query($conn, $sql))
		echo $id;
	else
		echo "0";
}
else
	echo "0";
?>
