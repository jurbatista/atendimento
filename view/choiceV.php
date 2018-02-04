<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta charset="UFT8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="view/css/choice.css">



</head>
<body>
	<header>
		<div id="topo">
			<div style="float: right;" id="info">
				<td><?=strtoupper($dados['atendente'])?></td>
				<td>- <?=implode("/",array_reverse(explode("-",$dados['hora'])))?></td>
				<td>| <a href="index.php?pg=logout">SAIR</a></td>
			</div>
		</div>
	</header>

	<div id="center">
		<div id="novoatd">
			<table id="tableIcons">
				<tr>
					<td><a href="index.php?pg=atd"><img src="view/img/novo.png"
							alt="novo atendimento" class="icon">
							<p>Novo atendimento</p> </a></td>
					<td colspan="" rowspan="" headers=""><a href="index.php?pg=list"><img
							src="view/img/listar.png" alt="" class="icon">
							<p>Lista de Atendimentos</p> </a></td>
					<td colspan="" rowspan="" headers=""><a
						href="<?=($_SESSION['level']>=2)?'index.php?pg=rel':'#';?>"><img
							src="view/img/relatorio.png" alt="" class="icon">
							<p>Relatórios</p> </a></td>
					<td colspan="" rowspan="" headers=""><a href=""><img
							src="view/img/config.png" alt="" class="icon">
							<p>Configurações</p> </a></td>
				</tr>
			</table>
		</div>
		<br>


	</div>


	</div>
	</div>
	<footer>
		<div id="rodape">
			<p style="background: #FF530D">
				<em>INFOLINK TELECOM® - Direitos Autorais Reservados</em>
			</p>
		</div>
	</footer>
</body>
</html>
