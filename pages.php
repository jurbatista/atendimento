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
            case 'edit':
                include_once 'controller/formAtendimentoEditC.php';
                $edit = new FormAtendimentoEdit();
                break;
            case 'view':
                include_once 'controller/formAtendimentoViewC.php';
                $view = new FormAtendimentoView();
                break;
            case 'rel':
                include_once 'controller/relatoriosC.php';
                $view = new relatoriosC();
                break;
        }
    }
    
}
