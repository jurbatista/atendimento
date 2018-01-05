<?php

class choiceC
{
    
    function __construct()
    {
        $this->chamaTela();
    }
    
    private function chamaTela()
    {
        $dados['atendente'] = $_SESSION['name'];
        include_once "view/choiceV.php";
    }
}
?>