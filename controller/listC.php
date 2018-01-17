<?php
require_once 'config.php';
require_once 'model/listM.php';

class listC{
    function __construct()
    {
        $this->chamaTela();
    }
    
    private function chamaTela()
    {
        $data = new config();
        $db = new listM();
        $dados['hora'] = $data->gerarHora();
        $dados['data'] = $data->gerarData();
        $dados['atendente'] = $_SESSION['name'];
        $dados['id_atendente'] = $_SESSION['id'];
        $dados['users'] = $db->getUsers($data);
        $dados['status'] = $db->getStatus($data);
        $dados['tec'] = $db->getTec($data);
        
        $filter = array('user'=>0,'status'=>0,'tec'=>0);
        
        $listaAtd = 0;
               
        if (isset($_GET['f'])){            
            if (isset($_GET['user'])){
                $filter['user'] = $_GET['user'];
            }
            if (isset($_GET['status'])){
                $filter['status'] = $_GET['status'];
            }
            if (isset($_GET['tec'])){
                $filter['tec'] = $_GET['tec'];
            }
            $listaAtd = $db->getAtd($data,$filter);
        }else{
            if($_SESSION['level']>=2){
                $listaAtd = $db->getAtd($data);
            }else{
                $listaAtd = $db->getAtd($data,$dados['id_atendente']);
            }
        }
        
        include_once "view/listV.php";
    }
    
}
?>