
<?php 
$scripts ='
<link rel="stylesheet" type="text/css" href="view/css/list.css">
';
include_once 'view/header.php';
?>

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
					
                                        Nome <input type="text" class="small" name="nomeCliente" placelholder="Pesquise pelo nome" value="<?=utf8_decode($filter['nomeCliente'])?>">
				<input type="submit" value="filtrar">
			</form>
		</div>
		<div id="list_atd">
		Sua pesquisa trouxe <?=$result[1]?> resultados<br><br>
		<table id="tableList" cellspacing="0" width="1300">
			<tr>
                            <th>Procotolo</th>
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>Problema</th>
                            <th>Status</th>
                            <th>Atendente</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Ações</th>
                        </tr>
			<?php foreach ($listaAtd as $key){ ?>
			
			<tr><td><?=$key->prot_atd?></td><td><?=utf8_encode($key->nome_cliente)?></td><td><?=$key->telefone_cliente?></td><td><?=utf8_encode($key->nome_problema)?></td>
			<td><?=utf8_encode($key->nome_status)?></td><td><?=utf8_encode($key->name_users)?></td><td><?=implode("/", array_reverse(explode("-",$key->data)))?></td>
			<td><?=$key->hora?></td>
			<td style="width:70px"><a href="#" onclick="window.open('index.php?pg=view&id=<?=$key->id_atd?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1000, HEIGHT=600');"><img src="view/img/eye.png" alt="visualizar" width="20px"></a>
				<?php if($_SESSION['id']==$key->id_users or $_SESSION['level']!=1){?>
				<a href="index.php?pg=edit&id=<?=$key->id_atd?>"> <img src="view/img/Files-Edit-File-icon.png" width="20px" alt="editar"></a>
				<?php }?>
				<?php if($_SESSION['level']!=1){?>
				<a href="index.php?pg=rm&id=<?=$key->id_atd?>"> <img src="view/img/del.png" width="20px" alt="deletar"></a>
				<?php }?>
			</td></tr>
			<?php }?>
		</table>
		</div>
	</div>

<script type="text/javascript">
function newWindow() {
	window.open(this.getAttribute('href'), '_blank');
}
</script>
   
<?php 
include_once 'view/foot.php';
?>