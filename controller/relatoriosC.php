<?php
include_once 'config.php';
include_once 'model/relatoriosM.php';
if ($_SESSION['level'] == 1) {
    header("location:index.php");
}

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
        
        // total de atendimentos
        $atdGeral = $rel->totalReg($cfg);
        // total de atendimento por estatus
        $statusAtdGerais = $rel->totalStatus($cfg);
        // tabela de atendimentos divida por coluna
        $tableAtdGerais = $this->dividirColunas($statusAtdGerais);
        // porcentagem dos atendimentos por nome
        $prcAtdGerais = $this->geraTabelaPorcetangem($statusAtdGerais, $atdGeral);
        
        // total de atendimentos por usuários nivel 1
        $contagemUsuarios = $rel->totalUsers($cfg);
        $tablectgUsuarios = $this->dividirColunasUsers($contagemUsuarios);
        
        //status por usuário
        $statusPorUsuario = $rel->dadosStatusPorUsuarios($cfg);
        
        $dados['hora'] = $cfg->gerarHora();
        $dados['atendente'] = $_SESSION['name'];
        include_once "view/relatoriosV.php";
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
}
?>
