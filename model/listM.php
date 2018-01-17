<?php
include_once 'model/root.php';
class listM extends root{
    public function getUsers($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT id_users,name_users FROM users ORDER BY name_users ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_users);
            $info[$cont]['desc'] = utf8_encode($row->name_users);
            $cont ++;
        }
        return $info;
    }
    public function getStatus($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT * FROM status ORDER BY nome_status ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_status);
            $info[$cont]['desc'] = utf8_encode($row->nome_status);
            $cont ++;
        }
        return $info;
    }
    public function getTec($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT * FROM tecnologia ORDER BY nome_tecnologia ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_tecnologia);
            $info[$cont]['desc'] = utf8_encode($row->nome_tecnologia);
            $cont ++;
        }
        return $info;
    }
    public function getAtd($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT * FROM atd INNER JOIN tecnologia ON atd.id_tecnologia = tecnologia.id_tecnologia INNER JOIN bairros ON 
atd.id_bairro = bairros.id_bairro INNER JOIN cidade ON atd.id_cidade = cidade.id_cidade WHERE atd.id_users = 5 AND atd.id_bairro = 4");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont] = $row;            
            $cont ++;
        }
        echo count($info);
        return $info;
    }
}




















