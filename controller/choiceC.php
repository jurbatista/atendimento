<?php
include_once 'config.php';
class choiceC
{
    
    function __construct()
    {
        $this->chamaTela();
    }
    
    private function chamaTela()
    {
        $cfg = new config();
        $dados['hora'] = $cfg->gerarData();
        $dados['atendente'] = $_SESSION['name'];
        include_once "view/choiceV.php";
    }
}
?>