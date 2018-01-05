<?php
class root{
    protected $con;
    
    protected function conectDB($data)
    {
        $server = $data->cfg['host'];
        $user = $data->cfg['user'];
        $pass = $data->cfg['pass'];
        $con = new PDO("mysql:host=$server;dbname=atendimento", $user, $pass);
        return $con;
    }
    
}
?>