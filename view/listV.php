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
				Data Inicial <input type="date" name="dataI" value="2018-01-01">
				Data Final <input type="date" name="dataF" value="<?=$dados['data']?>">
				Atendente <select name="user" >
					<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['users'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($dados['user']==$key['id'])?'selected="selected"':"";?>> <?=$key['desc']?></option>
							<?php }	?> 
					</option>
					
					</select> Status <select name="status">
						<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['status'] as $key){ ?>
							    <option value="<?=$key['id']?>"> <?=$key['desc']?></option>
							<?php }	?> 
						</option>
					</select> 
					
				Tecnologia <select name="tec">
					<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['tec'] as $key){ ?>
							    <option value="<?=$key['id']?>"> <?=$key['desc']?></option>
							<?php }	?> 
						</option>					
					</select>
				<input type="submit" value="filtrar">
			</form>
		</div>
		<div id="list_atd"></div>
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