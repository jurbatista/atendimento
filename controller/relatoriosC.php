<?php
include_once 'config.php';
include_once 'model/relatoriosM.php';
if ($_SESSION['level']==1){header("location:index.php");}
class relatoriosC
{
    
    function __construct()
    {
        $this->chamaTela();
    }
    
    private function chamaTela()
    {
        $cfg = new config();
        $rel = new relatoriosM();
        
        $atdGeral = $rel->totalReg($cfg);
        $statusAtdGerais = $rel->totalStatus($cfg);
        
        $tableAtdGerais = $this->dividirColunas($statusAtdGerais);
        
        $prcAtdGerais = $this->geraTabelaPorcetangem($statusAtdGerais, $atdGeral);
        
        $dados['hora'] = $cfg->gerarHora();
        $dados['atendente'] = $_SESSION['name'];
        include_once "view/relatoriosV.php";
        
        
        
    }
    private function geraTabelaPorcetangem($dados,$total){
        
        foreach ($dados as $chave => $valor){
            $rs[$chave] = $this->calculoPorcentagem($total, $valor['cstatus']);
        }
        return $rs;
    }
    private function calculoPorcentagem($total,$valor){
        $valor = ($valor * 100)/$total;
        $valor = number_format($valor,2,'.',' ');
        return $valor;
    }
    private function dividirColunas($statusAtdGerais){
        $counting = count($statusAtdGerais);
        $dados;
        $cont = 0;
        
        for($x=0;$x<$counting;$x++){
            if (isset($statusAtdGerais[($x+1)]['cstatus'])){
            $dados[$cont]['cstatus'] = $statusAtdGerais[($x)]['cstatus'];
            $dados[$cont]['status'] = $statusAtdGerais[($x)]['status'];
            $dados[$cont]['cstatus2'] = $statusAtdGerais[($x+1)]['cstatus'];
            $dados[$cont]['status2'] = $statusAtdGerais[($x+1)]['status'];
            unset($statusAtdGerais[($x+1)]);
            }else{
                $dados[$cont]['cstatus'] = $statusAtdGerais[($x)]['cstatus'];
                $dados[$cont]['status'] = $statusAtdGerais[($x)]['status'];
            }
            $x++;
            $cont++;
            
        }
        
        /*foreach ($statusAtdGerais as $key => $value){
            
             if($change == 'l'){
                 $statusAtdGerais[$key]['col'] = 'l';
                 $change = 'r';
            }else{
                $statusAtdGerais[$key]['col'] = 'r';
                $change = 'l';
            }
        }*/
        return $dados;
    }
}
?>
