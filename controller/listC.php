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
        $db->getAtd($data);
        
        $dados['user'] = 0;
        
        
        if (isset($_GET['f'])){            
            if (isset($_GET['user'])){
            $dados['user'] = $_GET['user']; 
            }
        }
        
        
        include_once "view/listV.php";
    }
    
}
?>