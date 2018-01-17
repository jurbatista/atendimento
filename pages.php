<?php

class pages {
    function redirectPage($pg){
        switch ($pg) {
            case 'atd':
                include_once 'controller/formAtendimentoC.php';
                $atd = new formAtendimentoC();
                break;
            case 'list':
                include_once 'controller/listC.php';
                $list = new listC();
                break;
            case 'logout':
                $config = new config();
                $config->destroiSessao();
                break;
            case 'choice':
                include_once 'controller/choiceC.php';
                $choice = new choiceC();
                break;
        }
    }
    
}