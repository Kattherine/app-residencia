<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);	
error_reporting (E_ALL); 

include_once('../db/config.php');
include_once("json.class.php");



if (isset($_REQUEST["what"])) {
	$what = $_REQUEST["what"];
	$order = isset($_REQUEST["order"]) ? " order by " . $_REQUEST["order"] : "";
	$where = isset($_REQUEST["where"]) ? ' WHERE ' . $_REQUEST["where"] : "";

	if ($conn)
	{	
		
		$sql = "select * from " . $what;
		$sql .= $where;
		$sql .= $order;
     
		//saveFile($sql, "all.txt");

		$rs = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($rs);
	
		$jsonConverter = new jsonConverter;
		$table_name = $what;				
		$element_name = "item";

		//echo $sql;

		$rs = mysqli_query($conn, $sql);
		$ar = $jsonConverter->xmlQueryResultConvert($rs);
		echo json_encode($ar);
		//print_r($ar);
	}
	else
		echo "No conexion";
}
else {
	echo "Error";
}

?>