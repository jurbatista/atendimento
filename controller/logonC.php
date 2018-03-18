<?php
include_once '../config.php';
include_once '../model/logonM.php';


$cfg = new config();
$logon = new logonM();

$user = $_POST['user'];
$pass = $_POST['pass'];

$result = $logon->getUserLogin($user, $cfg);


if (count($result) == 0) {  
    loginErro();
} else {
    if ($user == $result['user']) {
        if (sha1($pass) == $result['pass']) {
            $userData = $logon->getUser($user, $cfg);
            $_SESSION['level'] = $userData['level'];
            $_SESSION['name'] = $userData['name'];
            $_SESSION['email'] = $userData['email'];
            $_SESSION['id'] = $userData['id'];
			$cfg->logMsg($_SESSION['name']." logou. ","../info.log");
            header("location:../index.php?pg=choice"); 
        } else {
            loginErro();
        }
        
    } else {
        loginErro();
    }
}

function loginErro()
{
    session_destroy();
    header("location:../index.php?erro=1"); 
}
?>