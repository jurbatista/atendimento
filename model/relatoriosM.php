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
        $rs = $con->query("SELECT COUNT('id_atd') AS total FROM atd WHERE data BETWEEN '2018-01-01' AND '2018-01-31'");
        $row = $rs->fetch(PDO::FETCH_OBJ); 
        $info = $row->total;
        return $info;
    }
    public function totalStatus($data)
    {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT COUNT(atd.id_status) AS cstatus, status.nome_status,status.id_status FROM `atd` INNER JOIN status ON atd.id_status = status.id_status WHERE 
data BETWEEN '2018-01-01' AND '2018-01-31' GROUP BY status.id_status, status.nome_status");
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
    public function totalUsers($data)
    {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT COUNT(atd.id_users) AS cusers, users.name_users FROM `atd` 
INNER JOIN users ON atd.id_users = users.id_users WHERE users.level_users <= 2 AND data BETWEEN '2018-01-01' AND '2018-01-31'
 GROUP BY users.name_users");
        $cont = 0;
        $info;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)){
            $info[$cont]['cuser'] = $row->cusers;
            $info[$cont]['user'] = utf8_encode($row->name_users);
            $cont++;
        }
        
        return $info;
    }
    public function dadosStatusPorUsuarios($data) {
        $con = $this->conectDB($data);
        $rs = $con->query("SELECT users.id_users, status.*,COUNT(atd.id_status) AS cstatus
FROM users CROSS JOIN status INNER JOIN atd ON status.id_status = atd.id_status  WHERE  users.id_users <> 
atd.id_users AND users.level_users <= 2 AND atd.data BETWEEN '2018-01-01' AND '2018-01-31' GROUP BY users.id_users,
status.id_status LIMIT 5000 ");
        $cont = 0;
        $info;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)){
            $info[$row->id_users][]= array($row->id_status,$row->cstatus);
        }
        $dadosStatus = $this->totalStatus($data);
        $resultado;
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
    
}
