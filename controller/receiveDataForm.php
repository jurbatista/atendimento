<?php
require_once '../config.php';
require_once '../model/formAtdM.php';

$db = new formAtdM();
$data = new config();

$dados = array();
$dados['protocolo'] = $_POST['protocolo'] ;
$dados['cliente'] = $_POST['nomeCliente'];
$dados['nota']= $_POST['notas'];
$dados['id_tec']= $_POST['tec'];
$dados['id_bairro']= $_POST['bairro'];
$dados['id_cidade']= $_POST['cidade'];
$dados['id_atendente']= $_POST['id_atendente'];
$dados['id_status']= $_POST['status'];
$dados['id_problema']= $_POST['problema'];
$dados['id_radio']= $_POST['base'];
$dados['data']= $_POST['data'];
$dados['hora']= $_POST['hora'];
$dados['telefone']= $_POST['tel'];

echo $db->insertAtd($dados, $data);

include_once '../view/sucess.php';

?>