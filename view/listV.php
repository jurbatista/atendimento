<html>
<head>
<title>INFOLINK ATENDIMENTO</title>
<meta charset="UTF8">


</head>
<body>
<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="view/css/list.css">



</head>
<body>
	<header>
		<div id="topo">
			<div style="float: left;" id="info"><a href="index.php">&nbsp;voltar</a></div>
			<div style="float: right;" id="info">

				<td><?=strtoupper($dados['atendente'])?></td>
				<td>- <?=$dados['hora']?></td>
				<td>| <a href="index.php?pg=logout">SAIR</a></td>

			</div>
		</div>
	</header>
	<div id="central">

		<div id="filters">
			<h2>Lista de Atendimentos Realizados</h2><br>
			<form action="index.php?pg=list&f=filter" method="get">
				<input type="text" name="pg" value="list" hidden="hidden">
				<input type="text" name="f" value="filter" hidden="hidden">
				Data Inicial <input type="date" name="dataI" value="<?=$dados['dataI']?>">
				Data Final <input type="date" name="dataF" value="<?=$dados['dataF']?>">
				Atendente <select name="user" <?=($dados['level']==1)?'disabled="disabled"':"";?> >
					<option value="">Escolha uma opção</option>
							<?php foreach ($dados['users'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($filter['user']==$key['id'])?'selected="selected"':"";?>> <?=$key['desc']?></option>
							<?php }	?> 
					
					</select> Status <select name="status">
						<option value="">Escolha uma opção</option>
							<?php foreach ($dados['status'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($filter['status']==$key['id'])?'selected="selected"':"";?> > <?=$key['desc']?></option>
							<?php }	?> 
					</select> 
					
				Nome <input type="text" name="nomeCliente" placelholder="Pesquise pelo nome" value="<?=utf8_decode($filter['nomeCliente'])?>">
				<input type="submit" value="filtrar">
				<input type="reset" value="limpar">
			</form>
		</div>
		<div id="list_atd">
		Sua pesquisa trouxe <?=$result[1]?> resultados<br><br>
		<table id="tableList" cellspacing="0" width="1300">
			<tr><td>Procotolo</td><td>Cliente</td><td>Telefone</td><td>Problema</td><td>Status</td><td>Atendente</td><td>Data</td><td>Hora</td><td>Ações</td></tr>
			<?php foreach ($listaAtd as $key){ ?>
			
			<tr><td><?=$key->prot_atd?></td><td><?=utf8_encode($key->nome_cliente)?></td><td><?=$key->telefone_cliente?></td><td><?=utf8_encode($key->nome_problema)?></td>
			<td><?=utf8_encode($key->nome_status)?></td><td><?=utf8_encode($key->name_users)?></td><td><?=implode("/", array_reverse(explode("-",$key->data)))?></td>
			<td><?=$key->hora?></td>
			<td><a href="#" onclick="window.open('index.php?pg=view&id=<?=$key->id_atd?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1000, HEIGHT=600');">Visualizar </a>
				<?php if($_SESSION['id']==$key->id_users or $_SESSION['level']!=1){?>
				<a href="index.php?pg=edit&id=<?=$key->id_atd?>">| Editar</a>
				<?php }?>
				<?php if($_SESSION['level']!=1){?>
				<a href="index.php?pg=edit&id=<?=$key->id_atd?>">| Excluir</a>
				<?php }?>
			</td></tr>
			<?php }?>
		</table>
		</div>
	</div>


   

	<footer>
		<div id="rodape">
			<p style="background: #FF530D">
				<em>INFOLINK TELECOM® - Direitos Autorais Reservados</em>
			</p>
		</div>
	</footer>
<script type="text/javascript">
function newWindow() {
	window.open(this.getAttribute('href'), '_blank');
}
</script>

</body>

</html>