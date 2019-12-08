<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting (E_ALL);

include_once('../db/config.php');
include_once("json.class.php");


if (isset($_REQUEST["what"])) {
    $what = $_REQUEST["what"];
    $idName = $_REQUEST["idName"];
    $id = $_REQUEST["id"];
    $order = isset($_REQUEST["order"]) ? " order by " . $_REQUEST["order"] : "";
    $limit = isset($_REQUEST["limit"]) ? $_REQUEST["limit"] : "";

    if ($conn)
    {
        $sql = "select * from " . $what . " where " . $idName  . "='$id'" . $order;
        $rs = mysqli_query($conn, $sql);
        $jsonConverter = new jsonConverter;
        $table_name = $what;
        $element_name = "item";
        $rs = mysqli_query($conn, $sql);
        $jsonConverter->cdata = true;
        $ar = $jsonConverter->xmlQueryResultConvert($rs);
        echo json_encode($ar);
    }

    else
        echo "No conexion";
}
else {
    echo "Error";
}

?>