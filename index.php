<?php
include_once 'config.php';
include_once 'pages.php';
$config = new config();
$pag = new pages();

if (empty($_GET['erro'])) {
    $err = "";
} else {
    $err=1;
}

if (!empty($_GET['pg']) && $config->isLoged()){
    $pg = $_GET['pg'];
    $pag->redirectPage($pg);
}else{
    if ($config->isLoged()){
        $pag->redirectPage('choice');
    }else{
    include_once 'controller/loginC.php';
    $login = new loginC($err);
    }
}

?>