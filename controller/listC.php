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
        $dados['level'] = $_SESSION['level'];
        $dados['users'] = $db->getUsers($data);
        $dados['status'] = $db->getStatus($data);
        $dados['tec'] = $db->getTec($data);
        $dados['dataI'] = date('Y-m-d');
        $dados['dataF'] = date('Y-m-d');
        $filter = array('user'=>0,'status'=>0,'nomeCliente'=>"");
        
        $listaAtd = 0;
               
        if (isset($_GET['f'])){ 
            
            if (isset($_GET['user'])){
                $filter['user'] = $_GET['user'];
            }
            if (isset($_GET['status'])){
                $filter['status'] = $_GET['status'];
            }
            if (isset($_GET['nomeCliente'])){
                $filter['nomeCliente'] = $_GET['nomeCliente'];
            }
            if (isset($_GET['dataI'])){
                $filter['dataI'] = $_GET['dataI'];
                $dados['dataI'] = $_GET['dataI'];
            }
            if (isset($_GET['dataF'])){
                $filter['dataF'] = $_GET['dataF'];
                $dados['dataF'] = $_GET['dataF'];
            }
            //caso o atendente seja nivel 1 ele vai chamar somente o do atendente.
            if ($dados['level']==1){
                if($filter['nomeCliente']==""){
                    $filter['user'] = $dados['id_atendente'];
                }
            }
            $result = $db->getAtd($data,$filter);
            $listaAtd = $result[0];
        }else{
            if($dados['level']>=2){
                $result = $db->getAtd($data);
                $listaAtd = $result[0];
            }else{
                $filter['user'] = $_SESSION['id'];
                $filter['dataI'] = $dados['dataI'];
                $filter['dataF'] = $dados['dataF'];
                $result = $db->getAtd($data,$filter);
                $listaAtd = $result[0];
            }
        }
        
        include_once "view/listV.php";
    }
    
}
?>