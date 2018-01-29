<?php
include_once 'root.php';

class relatoriosM extends root
{

    
   
    
    public function __construct()
    {
    }

    public function insertUser($dados)
    {
        
        /*
        $stmt = $con->prepare("INSERT INTO pessoa(nome, email) VALUES(?, ?)");
        $stmt->bindParam(1, "Nome da Pessoa");
        $stmt->bindParam(2, "email@email.com");
        $stmt->execute();*/
    }

    public function getUserLogin($user, $data)
    {   
        $info = array();
        $con = $this->conectDB($data);        
        $rs = $con->query("SELECT login_users, pass_users FROM users WHERE login_users = '$user'");
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info['user'] = $row->login_users;
            $info['pass'] = $row->pass_users;
        }
        return $info;
    }
    public function getUser($user, $data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT id_users, name_users, email_users,level_users FROM users WHERE login_users = '$user'");
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info['id'] = $row->id_users;
            $info['name'] = $row->name_users;
            $info['email'] = $row->email_users;
            $info['level'] = $row->level_users;
        }
        return $info;
    }
}
