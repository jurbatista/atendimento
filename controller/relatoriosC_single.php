<?php
include_once 'config.php';
include_once 'model/relatoriosM_single.php';

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
		$cfg->logMsg($_SESSION['name']. "acessou os relatórios.","../info.log");
        $dados['hora'] = $cfg->gerarData();

        $dataInicial = (isset($_GET['i'])?$_GET['i']:date('Y-m-').'01');
        $dataFinal = (isset($_GET['f'])?$_GET['f']:date('Y-m-d'));
        
        $calc1 = new DateTime($dataInicial);
        $calc2 = new DateTime($dataFinal);

        $dataMenosUm = mktime(0,0,0,date('m'),(date('d')-1),date('Y'));

              
        // total de atendimentos
        $atdGeral = $rel->totalReg($cfg,$dataInicial,$dataFinal);
        // total de atendimento por estatus
        $statusAtdGerais = $rel->totalStatus($cfg,$dataInicial,$dataFinal);
        // tabela de atendimentos divida por coluna
        $tableAtdGerais = $this->dividirColunas($statusAtdGerais);
        // porcentagem dos atendimentos por nome
        $prcAtdGerais = $this->geraTabelaPorcetangem($statusAtdGerais, $atdGeral);
        
        // total de atendimentos por usuários nivel 1
        $contagemUsuarios = $rel->totalUsers($cfg,$dataInicial,$dataFinal);
        $tablectgUsuarios = $this->dividirColunasUsers($contagemUsuarios);
        
        //status por usuário
        //$statusPorUsuario = $rel->dadosStatusPorUsuarios($cfg,$dataInicial,$dataFinal);
        
        //atendimento por hora
        $atdPorHora = $this->dadosHora($dataInicial,$dataFinal);
        
        
        $dados['atendente'] = $_SESSION['name'];
        include_once "view/relatoriosV_single.php";
    }

    private function geraTabelaPorcetangem($dados, $total)
    {
        foreach ($dados as $chave => $valor) {
            $rs[$chave] = $this->calculoPorcentagem($total, $valor['cstatus']);
        }
        return $rs;
    }

    private function calculoPorcentagem($total, $valor)
    {
        $valor = ($valor * 100) / $total;
        $valor = number_format($valor, 2, '.', ' ');
        return $valor;
    }

    private function dividirColunas($statusAtdGerais)
    {
        $counting = count($statusAtdGerais);
        $dados;
        $cont = 0;
        
        for ($x = 0; $x < $counting; $x ++) {
            if (isset($statusAtdGerais[($x + 1)]['cstatus'])) {
                $dados[$cont]['cstatus'] = $statusAtdGerais[($x)]['cstatus'];
                $dados[$cont]['status'] = $statusAtdGerais[($x)]['status'];
                $dados[$cont]['cstatus2'] = $statusAtdGerais[($x + 1)]['cstatus'];
                $dados[$cont]['status2'] = $statusAtdGerais[($x + 1)]['status'];
                unset($statusAtdGerais[($x + 1)]);
            } else {
                $dados[$cont]['cstatus'] = $statusAtdGerais[($x)]['cstatus'];
                $dados[$cont]['status'] = $statusAtdGerais[($x)]['status'];
            }
            $x ++;
            $cont ++;
        }
        return $dados;
    }

    private function dividirColunasUsers($statusAtdGerais)
    {
        $counting = count($statusAtdGerais);
        $dados;
        $cont = 0;
        
        for ($x = 0; $x < $counting; $x ++) {
            if (isset($statusAtdGerais[($x + 1)]['cuser'])) {
                $dados[$cont]['cuser'] = $statusAtdGerais[($x)]['cuser'];
                $dados[$cont]['user'] = $statusAtdGerais[($x)]['user'];
                $dados[$cont]['cuser2'] = $statusAtdGerais[($x + 1)]['cuser'];
                $dados[$cont]['user2'] = $statusAtdGerais[($x + 1)]['user'];
                if (isset($statusAtdGerais[($x + 2)]['cuser'])) {
                    $dados[$cont]['cuser3'] = $statusAtdGerais[($x + 2)]['cuser'];
                    $dados[$cont]['user3'] = $statusAtdGerais[($x + 2)]['user'];
                }
                unset($statusAtdGerais[($x + 1)]);
                unset($statusAtdGerais[($x + 2)]);
            } else {
                $dados[$cont]['cuser'] = $statusAtdGerais[($x)]['cuser'];
                $dados[$cont]['user'] = $statusAtdGerais[($x)]['user'];
            }
            $x = $x + 2;
            $cont ++;
        }
        return $dados;
    }
    private function dadosPorUsuarios($data){
        $cfg = new config();
        $rel = new relatoriosM();        
        $dadosUsuarios = $rel->dadosStatusPorUsuarios($cfg);        
    }
    private function dadosHora($id=null,$fd=null){
        $cfg = new config();
        $rel = new relatoriosM();
        
        $dataInicial = (is_null($id))?date("Y-m-").'01':$id;
        $dataFinal = (is_null($fd))?date("Y-m-d"):$fd;
        
        $dadosHora = null;
        
        $maior = null;
        $menor = null;
        for ($x = 0;$x<=23;$x++){
            $dadosHora[$x] = $rel->atdPorHora($cfg, "$x:00:00.000000", "$x:59:59.999999", $dataInicial, $dataFinal);
            if($dadosHora[$x]>$maior){$maior = $dadosHora[$x];}
            if($dadosHora[$x]>$menor){$menor = $dadosHora[$x];}
        }        
        return $dadosHora;
    }
}
?>
