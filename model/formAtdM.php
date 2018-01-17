<?php
include_once 'root.php';

class formAtdM extends root
{

    public function insertAtd($dados, $data)
    {
        $con = $this->conectDB($data);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
         $stmt = $con->prepare("INSERT INTO atd(prot_atd, nome_cliente, notas, id_tecnologia, id_bairro, id_cidade,id_users,id_status,id_problema, id_radios,data,hora) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
         $stmt->bindParam(1, $dados['protocolo']);
         $stmt->bindParam(2, $dados['cliente']);
         $stmt->bindParam(3, utf8_decode($dados['nota']));
         $stmt->bindParam(4, $dados['id_tec']);
         $stmt->bindParam(5, $dados['id_bairro']);
         $stmt->bindParam(6, $dados['id_cidade']);
         $stmt->bindParam(7, $dados['id_atendente']);
         $stmt->bindParam(8, $dados['id_status']);
         $stmt->bindParam(9, $dados['id_problema']);
         $stmt->bindParam(10, $dados['id_radio']);
         $stmt->bindParam(11, $dados['data']);
         $stmt->bindParam(12, $dados['hora']);
         
         $stmt->execute();
         
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
}
?>