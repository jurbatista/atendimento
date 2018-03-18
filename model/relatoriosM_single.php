<?php
include_once 'root.php';

class relatoriosM extends root
{

    
   
    
    public function __construct()
    {
    }

    public function totalReg($data,$dataInicial,$dataFinal)
    {
        $con = $this->conectDB($data);
        $query = "SELECT COUNT('id_atd') AS total FROM atd WHERE id_users = '".$_SESSION['id']."' AND data BETWEEN '$dataInicial' AND '$dataFinal' ";
        $rs = $con->query($query);
        $row = $rs->fetch(PDO::FETCH_OBJ); 
        $info = $row->total;
        return $info;
    }
    public function totalStatus($data,$dataInicial,$dataFinal)
    {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT COUNT(atd.id_status) AS cstatus, status.nome_status,status.id_status FROM `atd` INNER JOIN status ON atd.id_status = status.id_status WHERE atd.id_users = '".$_SESSION['id']."'
 AND
data BETWEEN '$dataInicial' AND '$dataFinal' GROUP BY status.id_status, status.nome_status");
        $cont = 0;
        $info;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)){
            $info[$cont]['id_status'] = $row->id_status;
            $info[$cont]['cstatus'] = $row->cstatus;
            $info[$cont]['status'] = utf8_encode($row->nome_status);
            $cont++;
        }
        
        return $info;
    }
    public function totalUsers($data,$dataInicial,$dataFinal)
    {
        $con = $this->conectDB($data);
        $query = "SELECT COUNT(atd.id_atd) AS cusers, users.name_users FROM `atd` INNER JOIN users ON users.id_users = '".$_SESSION['id']."' WHERE atd.id_users = ".$_SESSION['id']." AND data BETWEEN '$dataInicial' AND '$dataFinal'
 GROUP BY users.name_users";
        $rs = $con->query($query);
        $cont = 0;
        $info;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)){
            $info[$cont]['cuser'] = $row->cusers;
            $info[$cont]['user'] = utf8_encode($row->name_users);
            $cont++;
        }
        
        return $info;
    }
    public function dadosStatusPorUsuarios($data,$dataInicial,$dataFinal) {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT users.id_users, status.*,COUNT(atd.id_status) AS cstatus
FROM users CROSS JOIN status INNER JOIN atd ON status.id_status = atd.id_status  WHERE  users.id_users <> 
atd.id_users AND users.level_users <= 2 AND atd.data BETWEEN '2018-01-01' AND '2018-01-31' GROUP BY users.id_users,
status.id_status LIMIT 5000 ");
        $info = null;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)){
            $info[$row->id_users][]= array($row->id_status,$row->cstatus);
        }
        $dadosStatus = $this->totalStatus($data,$dataInicial,$dataFinal);
        $resultado = null;
        foreach ($info AS $key => $value){
            foreach ($value as $k => $v){
                foreach ($dadosStatus as $c => $val){                    
                    if($v[0]==$val['id_status']){
                       /* print 'id_status =='.$val['id_status'];
                        print 'ctg_status =='.($val['cstatus']-$v[1]);
                        print 'id_users =='.$key;*/
                        $resultado[$key][$val['id_status']] = array("ctgStatus"=>($val['cstatus']-$v[1]));
                    }
                }
            }
        }
        return $resultado;
    }
    public function atdPorHora($data, $ih=null,$fh=null,$id=null,$fd=null){
        //setando valores default para hora e data
        $inicioHora = (is_null($ih))?'00:00:00.000000':$ih;
        $fimHora = (is_null($fh))?'00:59:59.999999':$fh;
        
        //query de solicitação de acordo com os filtros
        $query = "SELECT COUNT('horas') AS horas FROM atd WHERE hora BETWEEN '$inicioHora' AND '$fimHora' AND data BETWEEN '$id' AND '$fd' AND id_users = '".$_SESSION['id']."'
";
        //conecta ao banco
        $con = $this->conectDB($data);
        //executa a query e tras o resultado para $rs
        $rs = $con->query($query);
        //armazena o resultado de $rs em $row em forma de objeto
        $row = $rs->fetch(PDO::FETCH_OBJ);
        //armazena o valor de horas em $result
        $result = $row->horas;
        //retorna o valor de result
        return $result;
    }
    
    
    
    
    
    
}
