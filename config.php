<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
session_start();
header('Content-Type: text/html; charset=utf-8');
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
}
?>