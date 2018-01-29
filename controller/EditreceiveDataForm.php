<?php
require_once '../config.php';
require_once '../model/formAtdEditM.php';

$db = new formAtdEditM();
$data = new config();

$dados = array();

$dados['cliente'] = utf8_decode($_POST['nomeCliente']);
$dados['nota']= utf8_decode($_POST['notas']);
$dados['id_tec']= $_POST['tec'];
$dados['id_bairro']= $_POST['bairro'];
$dados['id_cidade']= $_POST['cidade'];
$dados['id_atendente']= $_POST['id_atendente'];
$dados['id_status']= $_POST['status'];
$dados['id_problema']= $_POST['problema'];
$dados['id_radio']= $_POST['base'];
$dados['telefone']= $_POST['tel'];
$dados['id_atd'] = $_POST['id_atd'];

$db->updAtd($dados, $data);

include_once '../view/sucessEdit.php';

?>