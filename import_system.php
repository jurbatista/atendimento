<?php
/*módulo de importação complexo.*/
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$csv = array_map('str_getcsv', file('atd.csv'));


$importacao = array();
$cont = 0;

$cidade = getData('cidade','cidade',conectDB());
$bairro = getData('bairros','bairro',conectDB());
$problema = getData('problema','problema',conectDB());
$radio = getData('radios','radio',conectDB());
$status = getData('status','status',conectDB());
$tec = getData('tecnologia','tecnologia',conectDB());

//array(array('id'=>'1','desc'=>'fibra'),array('id'=>'1','desc'=>'rádio'));

foreach ($csv as $key){
    
        $importacao[$cont]['protocolo'] = geraProtocolo(subData($key[3]), subHora($key[4]));
        $importacao[$cont]['cliente'] = utf8_decode($key[0]);
        $importacao[$cont]['id_problema'] = replaceId($problema,$key[1]);
        $importacao[$cont]['id_bairro'] = replaceId($bairro, $key[7]);
        $importacao[$cont]['id_cidade'] = replaceId($bairro, $key[7], 'cidade');
        $importacao[$cont]['id_tec'] = replaceId($tec, $key[10]);
        $importacao[$cont]['id_radio'] = replaceId($radio, $key[6]);
        $importacao[$cont]['nota'] = utf8_decode($key[5]);
        $importacao[$cont]['id_atendente'] = 5;
        $importacao[$cont]['id_status'] = replaceId($status, $key[9]);
        $importacao[$cont]['data'] = subData($key[3]);
        $importacao[$cont]['hora'] = subHora($key[4]);
        $cont++;
}
foreach ($importacao as $key){
    insertAtd($key);
}


function conectDB(){
    $con = new PDO("mysql:host=localhost;dbname=atendimento", "servicos", "doGTXPgpyiAfIqQO3wRl2z0h4Su1eC");
    return $con;
}
function getData($tabela,$campo,$con){
    $info = array();
    $rs = $con->query("SELECT * FROM $tabela");
    $id = "id_".$campo;
    $name="nome_".$campo;
    $ct = 0;
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        $info[$ct]['id'] = $row->$id;
        $info[$ct]['desc'] = utf8_encode($row->$name);
        if (isset($row->id_cidade)){
            $info[$ct]['cidade'] = $row->id_cidade;
        }
        $ct++;
    }
    return $info;
}
function replaceId($dados,$desc,$par='id'){
    $id = 0;
    foreach ($dados as $key){
        if($key['desc'] == $desc){
            $id = $key[$par];
        }
    }
    return $id;
}
function subBairro($bairro,$desc){
    $id = 0;
    foreach ($bairro as $key){
        if($key['desc'] == $desc){
            $id = $key['id'];
        }
    }
    return $id;
}
function subData($data){
    $data = implode("-", array_reverse(explode("/",$data)));
    return $data;
}
function subHora($hora){
    $hora = $hora.':'.random_int(10, 59);
    return $hora;
}
function geraProtocolo($data,$hora){
    $protocolo = substr(implode("", explode("-", $data)).implode("", explode(":", $hora)), -12);
    return $protocolo;
}

function insertAtd($dados)
{
    $con = conectDB();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $stmt = $con->prepare("INSERT INTO atd(prot_atd, nome_cliente, notas, id_tecnologia, id_bairro, id_cidade,id_users,id_status,id_problema, id_radios,data,hora) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $dados['protocolo']);
    $stmt->bindParam(2, $dados['cliente']);
    $stmt->bindParam(3, $dados['nota']);
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
    
    echo 'sucesso! <br>';
    
}






?>