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
    public function getAtd($data,$filters=null)
    {
       
        $contFilter = 0;
        $info = array();
        $con = $this->conectDB($data);
        
        $query = "SELECT atd.*, tecnologia.*,users.name_users,bairros.*,cidade.*,status.*,problema.*,radios.* FROM atd 
INNER JOIN tecnologia ON atd.id_tecnologia = tecnologia.id_tecnologia 
INNER JOIN bairros ON atd.id_bairro = bairros.id_bairro 
INNER JOIN cidade ON atd.id_cidade = cidade.id_cidade 
INNER JOIN users ON atd.id_users = users.id_users
INNER JOIN status ON atd.id_status = status.id_status
INNER JOIN problema ON atd.id_problema = problema.id_problema
INNER JOIN radios ON atd.id_radios = radios.id_radios";
        
        // TRATAMENTO DOS FILTROS
        $user = $filters['user'];
        $status = $filters['status'];
        $nome = $filters['nomeCliente'];
        $filter['dataI'] = date('Y-m')."-01";
        $filter['dataF'] = date('Y-m-d');
        
        
        $contFilter = 0;
        if($user>0){$contFilter= $contFilter+1;}
        if($status>0){$contFilter= $contFilter+2;}
        if($nome!=""){$contFilter= $contFilter+4;}
        
        
        switch ($contFilter){
            case 1:
                $query = $query." WHERE atd.id_users = $user";
                break;
            case 2:
                $query = $query." WHERE atd.id_status = $status";
                break;
            case 3:
                $query = $query." WHERE atd.id_users = $user AND atd.id_status = $status";
                break;
            case 4:
                $query = $query." WHERE atd.nome_cliente LIKE '%$nome%'";
                break;
            case 6:
                $query = $query." WHERE atd.id_status = $status AND atd.nome_cliente LIKE '%$nome%'";
                break;
            case 7:
                $query = $query." WHERE atd.id_users = $user AND atd.id_status = $status AND atd.nome_cliente LIKE '%$nome%'";
                break;
        }
       
        // TRATAMENTO DE DATA 
        $dataI = date('Y-m-d');
        $dataF = date('Y-m-d');
        if(isset($filters['dataI'])){
        $dataI = $filters['dataI'];
        $dataF = $filters['dataF'];
            $query = $query." AND atd.data BETWEEN '$dataI' AND '$dataF' ORDER BY atd.data ASC, atd.hora ASC";
        }else{
            $query = $query." WHERE atd.data BETWEEN '$dataI' AND '$dataF' ORDER BY atd.data DESC, atd.hora DESC";
        }
        //$query = $query. " ORDER BY atd.data DESC, atd.hora DESC";
        $rs = $con->query($query);
        $cont = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $info[$cont] = $row;            
            $cont ++;
        }
        //$info['cont'] = $cont;
        $result = array($info,$cont);
        return $result;
    }
}



















