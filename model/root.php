<?php
class root{
    protected $con;
    
    protected function conectDB($data)
    {
        $server = $data->cfg['host'];
        $user = $data->cfg['user'];
        $pass = $data->cfg['pass'];
        $con = new PDO("mysql:host=$server;dbname=atendimento", $user, $pass);
        
        /*$con->query("SET NAMES 'utf8'");
        $con->query("SET character_set_connection=utf8");
        $con->query("SET NAMES 'utf8SET character_set_connection=utf8'");
        $con->query("SET character_set_client=utf8");
        $con->query("SET character_set_results=utf8");*/
        return $con;
    }
    
}
?>