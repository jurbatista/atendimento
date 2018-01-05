<?php
include_once 'config.php';
$config = new config();

if (empty($_GET['erro'])) {
    $err = "";
} else {
    $err=1;
}

if (!empty($_GET['pg'])){
    $pg = $_GET['pg'];
    $config->redirectPage($pg);
}else{
    if ($config->isLoged()){
        $config->redirectPage('choice');
    }else{
    include_once 'controller/loginC.php';
    $login = new loginC($err);
    }
}

?>