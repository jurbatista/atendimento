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
        $dados['hora'] = $this->gerarHora();
        $dados['atendente'] = $_SESSION['name'];
        $dados['bairros'] = $this->getBairros($db,$data);
        $dados['cidades'] = $this->getCidades($db,$data);
        $dados['problemas'] = $this->getProblemas($db,$data);
        include_once "view/formAtendimentoV.php";
    }
    private function GeraProtocolo(){
        $prt = date('ymdGis');
        return $prt;
    }
    private function gerarHora(){
        $hr = date('G:i');
        return $hr;
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
    
}