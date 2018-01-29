<?php
include_once 'config.php';
class relatoriosC
{
    
    function __construct()
    {
        $this->chamaTela();
    }
    
    private function chamaTela()
    {
        $cfg = new config();
        $dados['hora'] = $cfg->gerarHora();
        $dados['atendente'] = $_SESSION['name'];
        include_once "view/relatoriosV.php";
    }
}
?>
