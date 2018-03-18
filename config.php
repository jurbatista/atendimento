<?php
header("Content-Type: text/html; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sun, 11 Apr 2010 05:00:00 GMT");
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
session_start();

class config{
  /* ESSA CLASSE CONTEM AS CONFIGURAÇÕES DO SISTEMA, MUITO CUIDADO AO MODIFICAR */
  public $cfg;
  
  function __construct(){
    $this->cfg = array('host'=>'localhost','user'=>'servicos','pass'=>'doGTXPgpyiAfIqQO3wRl2z0h4Su1eC');
  }
  
  function destroiSessao(){
      session_destroy();
      header("location:index.php");
  }
  function isLoged(){
      if (isset($_SESSION['id'])) {
          return true;
      }else{
          return false;
      }
  }
  function gerarHora(){
      $hr = date('G:i:s');
      return $hr;
  }
  function gerarData(){
      $hr = date('Y-m-d');
      return $hr;
  }
  function logMsg( $msg, $file = 'info.log', $level = 'info')
{
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    $levelStr = '';
 
    // verifica o nível do log
    switch ( $level )
    {
        case 'info':
            // nível de informação
            $levelStr = 'INFO';
            break;
 
        case 'warning':
            // nível de aviso
            $levelStr = 'WARNING';
            break;
 
        case 'error':
            // nível de erro
            $levelStr = 'ERROR';
            break;
    }
    // data atual
    $date = date( 'Y-m-d H:i:s' );
 
    // formata a mensagem do log
    // 1o: data atual
    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
    // 3o: a mensagem propriamente dita
    // 4o: uma quebra de linha
    $msg = sprintf("[%s] [%s]: %s%s \r\n", $date, $levelStr, $msg, PHP_EOL );
 
    // escreve o log no arquivo
    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
    file_put_contents( $file, $msg, FILE_APPEND);
}  
}
?>