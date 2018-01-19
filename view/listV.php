<html>
<head>
<title>INFOLINK ATENDIMENTO</title>
<meta charset="UTF8">


</head>
<body>
<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta charset="UFT8">

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
			<h2>Lista de Atendimentos Realizados</h2>
			<form action="index.php?pg=list&f=filter" method="get">
				<input type="text" name="pg" value="list" hidden="hidden">
				<input type="text" name="f" value="filter" hidden="hidden">
				Data Inicial <input type="date" name="dataI" value="<?=$dados['dataI']?>">
				Data Final <input type="date" name="dataF" value="<?=$dados['dataF']?>">
				Atendente <select name="user" >
					<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['users'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($filter['user']==$key['id'])?'selected="selected"':"";?>> <?=$key['desc']?></option>
							<?php }	?> 
					</option>
					
					</select> Status <select name="status">
						<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['status'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($filter['status']==$key['id'])?'selected="selected"':"";?> > <?=$key['desc']?></option>
							<?php }	?> 
						</option>
					</select> 
					
				Tecnologia <select name="tec">
					<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['tec'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($filter['tec']==$key['id'])?'selected="selected"':"";?> > <?=$key['desc']?></option>
							<?php }	?> 
						</option>					
					</select>
				<input type="submit" value="filtrar">
				<input type="reset" value="limpar">
			</form>
		</div>
		<div id="list_atd">
		<table id="tableList">
			<tr><td>Procotolo</td><td>Cliente</td><td>Problema</td><td>Status</td><td>Atendente</td><td>Data</td><td>Hora</td></tr>
			<?php foreach ($listaAtd as $key){ ?>
			
			<tr><td><?=$key->prot_atd?></td><td><?=utf8_encode($key->nome_cliente)?></td><td><?=utf8_encode($key->nome_problema)?></td>
			<td><?=utf8_encode($key->nome_status)?></td><td><?=utf8_encode($key->name_users)?></td><td><?=utf8_decode($key->data)?></td>
			<td><?=$key->hora?></td></tr>
			<?php }?>
		</table>
		</div>
	</div>




	<footer>
		<div id="rodape">
			<p style="background: #FF530D">
				<em>INFOLINK TELECOM® - Todos Direitos Resevados</em>
			</p>
		</div>
	</footer>
</body>
</html>


</body>

</html>