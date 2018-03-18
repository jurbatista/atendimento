<?php 
$scripts ='
<link rel="stylesheet" type="text/css" href="view/css/choice.css">
';
include_once 'view/header.php';
?>

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
						href="<?=($_SESSION['level']>=2)?'index.php?pg=rel':'index.php?pg=rel2';?>"><img
							src="view/img/relatorio.png" alt="" class="icon">
							<p>Relatórios</p> </a></td>
					<!--td colspan="" rowspan="" headers=""><a href=""><img
							src="view/img/config.png" alt="" class="icon">
							<p>Configurações</p> </a></td-->
				</tr>
			</table>
		</div>
		<br>


	</div>


	</div>
	</div>
<?php 
include_once 'view/foot.php';
?>
