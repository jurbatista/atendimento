<?php
include_once 'root.php';

class formAtdEditM extends root
{

    public function getAtd($data,$id)
    {
        
        $contFilter = 0;
        $info = array();
        $con = $this->conectDB($data);
        
        $query = "SELECT * FROM atd WHERE atd.id_atd = $id";
        $rs = $con->query($query);
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info = $row;
        }
        return $info;
    }

    public function getBairros($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT id_bairro, nome_bairro FROM bairros ORDER BY nome_bairro ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_bairro);
            $info[$cont]['desc'] = utf8_encode($row->nome_bairro);
            $cont ++;
        }
        return $info;
    }

    public function getCidades($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT id_cidade, nome_cidade FROM cidade ORDER BY nome_cidade ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_cidade);
            $info[$cont]['desc'] = utf8_encode($row->nome_cidade);
            $cont ++;
        }
        return $info;
    }

    public function getProblemas($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT id_problema, nome_problema FROM problema ORDER BY nome_problema ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_problema);
            $info[$cont]['desc'] = utf8_encode($row->nome_problema);
            $cont ++;
        }
        return $info;
    }

    public function getRadios($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT * FROM radios ORDER BY nome_radios ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_radios);
            $info[$cont]['desc'] = utf8_encode($row->nome_radios);
            $cont ++;
        }
        return $info;
    }

    public function getStatus($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT id_status, nome_status FROM status ORDER BY nome_status ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_status);
            $info[$cont]['desc'] = utf8_encode($row->nome_status);
            $cont ++;
        }
        return $info;
    }
    public function getProcedimentos($data)
    {
        $info = array();
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT * FROM procedimentos ORDER BY nome_procedimento ASC ");
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont]['id'] = utf8_encode($row->id_procedimento);
            $info[$cont]['desc'] = utf8_encode($row->nome_procedimento);
            $cont ++;
        }
        return $info;
    }
}
?>