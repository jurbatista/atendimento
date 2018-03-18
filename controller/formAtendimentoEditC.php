<?php
include_once 'config.php';
include_once 'model/formAtdEditM.php';


class FormAtendimentoEdit {

   function __construct() {
       $this->chamaTela();
   }
    
function chamaTela()
{
    $data = new config();
    $db = new formAtdEditM();
    $id = $_GET['id'];
    
    $received = $db->getAtd($data, $id);
    
    $dados['protocolo'] = $received->prot_atd; 
    $dados['hora'] = $received->hora;
    $dados['atendente'] = $_SESSION['name'];
    $dados['id_atendente'] = $_SESSION['id'];
    $dados['bairros'] = $this->getBairros($db, $data);
    $dados['cidades'] = $this->getCidades($db, $data);
    $dados['problemas'] = $this->getProblemas($db, $data);
    $dados['status'] = $this->getStatus($db, $data);
    $dados['radios'] = $this->getRadios($db, $data);
    // $dados['procedimentos'] = $this->getProcedimentos($db,$data);
    $dados['data'] = $received->data;
    include_once "view/formAtendimentoEditV.php";
}

function getBairros($db, $data)
{
    $listaBairros = $db->getBairros($data);
    return $listaBairros;
}

function getCidades($db, $data)
{
    $listaCidades = $db->getCidades($data);
    return $listaCidades;
}

function getProblemas($db, $data)
{
    $listaproblemas = $db->getproblemas($data);
    return $listaproblemas;
}

function getStatus($db, $data)
{
    $listastatus = $db->getstatus($data);
    return $listastatus;
}

function getRadios($db, $data)
{
    $listastatus = $db->getRadios($data);
    return $listastatus;
}

function getProcedimentos($db, $data)
{
    $listaProcedimentos = $db->getProcedimentos($data);
    return $listaProcedimentos;
}
}
