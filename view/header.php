<html>
<head>
<title>ATENDIMENTO INFOLINK</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="view/css/geral.css">
<?php print $scripts;?>

</head>
<body>

	<header>
		<div id="topo">
			<div style="float: left;"><a href="index.php">&nbsp;<img src="/view/img/home.png" width="30px"></a></div>
			<div style="float: right;" id="info">
				<td><b><?=ucwords(utf8_encode($dados['atendente']))?></b></td>
				<td>- <?=date("d/m/Y")?></td>
				<td>| <a href="index.php?pg=logout">Sair</a></td>
			</div>
		</div>
	</header>
	
<div id="geral">