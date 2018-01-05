<?php

class loginC
{

    function __construct($err)
    {
            $this->chamaTela($err);
    }

    private function chamaTela($err)
    {
        include_once "view/loginV.php";
    }
}
?>