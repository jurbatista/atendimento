<?php
include_once 'root.php';

class relatoriosM extends root
{

    
   
    
    public function __construct()
    {
    }

    public function totalReg($data)
    {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT COUNT('id_atd') AS total FROM atd");
        $row = $rs->fetch(PDO::FETCH_OBJ);
        $info = $row->total;
        return $info;
    }
    public function totalStatus($data)
    {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT COUNT(atd.id_status) AS cstatus, status.nome_status FROM `atd` 
INNER JOIN status ON atd.id_status = status.id_status GROUP BY status.nome_status");
        $cont = 0;
        $info;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)){
            $info[$cont]['cstatus'] = $row->cstatus;
            $info[$cont]['status'] = utf8_encode($row->nome_status);
            $cont++;
        }
        
        return $info;
    }

    public function getUserLogin($user, $data)
    {   
        $info;
        $con = $this->conectDB($data);        
        $rs = $con->query("SELECT login_users, pass_users FROM users WHERE login_users = '$user'");
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info['user'] = $row->login_users;
            $info['pass'] = $row->pass_users;
        }
        return $info;
    }
    
}
