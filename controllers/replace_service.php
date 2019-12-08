<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);	
error_reporting (E_ALL); 

include_once('../db/config.php');

//print_r($_POST);
if((isset($_REQUEST["eliminar"]))){

    $tabla = $_REQUEST["table"];
    $id2 = $_REQUEST["id"];
    $idname2 = $_REQUEST["idName"];

    $sql = "DELETE FROM $tabla where `$idname2` = '$id2'";
    
    mysqli_query($conn,$sql);
}else {
    if ((isset($_REQUEST["idName"])) &&
        (isset($_REQUEST["id"]))
    ) {
        require("update_service.php");
    } else {
        require("insert_service.php");
    }
}
?>
