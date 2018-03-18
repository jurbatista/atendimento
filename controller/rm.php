<?php
require_once 'config.php';
require_once 'model/formAtdM.php';

$db = new formAtdM();
$data = new config();

$id = $_GET['id'];

if (isset($_GET['c'])) {
	if ($_GET['c']=='y') {
		$data->logMsg($_SESSION['name'] . " deletou atendimento de id " . $id);
		$db->deleteAtd($data, $id);
		include_once("view/deleteConfirm.php");
	}else{
		header("location:index.php?pg=list");
	}
}else{
	include_once("view/deleteChoice.php");
}




?>
