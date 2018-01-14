<?php
include_once 'config.php';
include_once 'model/formAtdM.php';


class formAtendimentoC
{
    
    function __construct()
    {
        $this->chamaTela();
    }
    
    private function chamaTela()
    {
        $data = new config();
        $db = new formAtdM();
        $dados['protocolo'] = $this->GeraProtocolo();
        $dados['hora'] = $data->gerarHora();
        $dados['atendente'] = $_SESSION['name'];
        $dados['id_atendente'] = $_SESSION['id'];
        $dados['bairros'] = $this->getBairros($db,$data);
        $dados['cidades'] = $this->getCidades($db,$data);
        $dados['problemas'] = $this->getProblemas($db,$data);
        $dados['status'] = $this->getStatus($db,$data);
        $dados['radios'] = $this->getRadios($db,$data);
        $dados['data'] = $data->gerarData();
        include_once "view/formAtendimentoV.php";
    }
    private function GeraProtocolo(){
        $prt = date('ymdGis');
        return $prt;
    }
    private function getBairros($db,$data){        
        $listaBairros = $db->getBairros($data);
        return $listaBairros;        
    }
    private function getCidades($db,$data){        
        $listaCidades = $db->getCidades($data);
        return $listaCidades;
    }
    private function getProblemas($db,$data){
        $listaproblemas = $db->getproblemas($data);
        return $listaproblemas;
    }
    private function getStatus($db,$data){
        $listastatus = $db->getstatus($data);
        return $listastatus;
    }
    private function getRadios($db,$data){
        $listastatus = $db->getRadios($data);
        return $listastatus;
    }
}