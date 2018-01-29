<?php
/*módulo de importação complexo.*/
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$csv = array_map('str_getcsv', file('atd.csv'));


$importacao = array();
$cont = 0;

$cidade = getData('cidade','cidade',conectDB());
$bairro = getData('bairros','bairro',conectDB());
$problema = getData('problema','problema',conectDB());
$radio = getData('radios','radios',conectDB());
$status = getData('status','status',conectDB());
$tec = getData('tecnologia','tecnologia',conectDB());


foreach ($csv as $key){
        $importacao[$cont]['protocolo'] = geraProtocolo(subData($key[3]), subHora($key[4]));
        $importacao[$cont]['cliente'] = utf8_decode($key[0]);
        $importacao[$cont]['id_problema'] = replaceId($problema,$key[1]);
        $importacao[$cont]['id_bairro'] = replaceId($bairro, $key[7]);
        $importacao[$cont]['id_cidade'] = replaceId($bairro, $key[7], 'cidade');
        $importacao[$cont]['id_tec'] = replaceId($tec, $key[10]);
        $importacao[$cont]['id_radio'] = replaceId($radio, $key[6]);
        $importacao[$cont]['nota'] = utf8_decode($key[5]);
        $importacao[$cont]['id_atendente']= $key[11];
        $importacao[$cont]['id_status'] = replaceId($status, $key[9]);
        $importacao[$cont]['data'] = subData($key[3]);
        $importacao[$cont]['hora'] = subHora($key[4]);
        $importacao[$cont]['telefone'] = subTel($key[2]);
        $cont++;
}
print_r($importacao);
$contadorIsercao = 1;

foreach ($importacao as $key){print($contadorIsercao."<br>");insertAtd($key);$contadorIsercao++;}


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
        
        $d = strtolower(remover_caracter($key['desc']));
        $d2 = strtolower(remover_caracter($desc));
        //print $d." = ".$d2.'|<br>';
        if($d == $d2){
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
    $hora = $hora.':'.rand(10, 59);
    return $hora;
}
function subTel($tel){
    $vowels = array("-", "/"," ");
    $telefone = str_replace($vowels, "", $tel);
    $tel = substr($telefone, -9);
    return $tel;
}
function geraProtocolo($data,$hora){
    $protocolo = substr(implode("", explode("-", $data)).implode("", explode(":", $hora)), -12);
    return $protocolo;
}

function insertAtd($dados)
{
    $con = conectDB();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $stmt = $con->prepare("INSERT INTO atd(prot_atd, nome_cliente, telefone_cliente, notas, id_tecnologia, id_bairro, id_cidade,id_users,id_status,id_problema, id_radios,data,hora) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $dados['protocolo']);
    $stmt->bindParam(2, $dados['cliente']);
    $stmt->bindParam(3, $dados['telefone']);
    $stmt->bindParam(4, $dados['nota']);
    $stmt->bindParam(5, $dados['id_tec']);
    $stmt->bindParam(6, $dados['id_bairro']);
    $stmt->bindParam(7, $dados['id_cidade']);
    $stmt->bindParam(8, $dados['id_atendente']);
    $stmt->bindParam(9, $dados['id_status']);
    $stmt->bindParam(10, $dados['id_problema']);
    $stmt->bindParam(11, $dados['id_radio']);
    $stmt->bindParam(12, $dados['data']);
    $stmt->bindParam(13, $dados['hora']);
    
    $stmt->execute();
    
    
}

function remover_caracter($string) {
    $string = preg_replace("/(á|à|â|ã|ä)/", "a", $string);
    $string = preg_replace("/(Á|À|Â|Ã|Ä)/", "A", $string);
    $string = preg_replace("/(é|è|ê)/", "e", $string);
    $string = preg_replace("/(É|È|Ê)/", "E", $string);
    $string = preg_replace("/(í|ì)/", "i", $string);
    $string = preg_replace("/(Í|Ì)/", "I", $string);
    $string = preg_replace("/(ó|ò|ô|õ|ö)/", "o", $string);
    $string = preg_replace("/(Ó|Ò|Ô|Õ|Ö)/", "O", $string);
    $string = preg_replace("/(ú|ù|ü)/", "u", $string);
    $string = preg_replace("/(Ú|Ù|Ü)/", "U", $string);
    $string = preg_replace("/ç/", "c", $string);
    $string = preg_replace("/Ç/", "C", $string);
    $string = preg_replace("/(-|;|@|!)/", "", $string);
    $string = preg_replace("/ /", "", $string);
    return $string;
}





?>
