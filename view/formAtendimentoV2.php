<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta charset="UFT8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" type="text/css" href="view/css/form.css">



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


	<form action="controller/receiveDataForm.php" method="POST"
		name="AtdData" class="center">
		<div>
			<div id="geral">
				<div id="formulario " class="">
					<div id="dadosAtendimento">
						<table>
							<tr>
								<td>Protocolo</td>
								<td><div id="prot"><?=$dados['protocolo']?></div></td>
								<td></td>
							</tr>
							<tr >
							<td>Nome</td>
							<td><input type="text" name="nomeCliente" id="nomeCliente" style="width: 580px;"
								class="formP campos inp_nome" placeholder="Nome do Cliente"
								required="required" >
							</td>
										
						</table>

					</div>
					<table>

					
						<tr>
						
						
						<tr>
							<td>Bairro</td>
							<td><select name="bairro"  class="campos" required="required">
									<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['bairros'] as $key){ ?>
							    <option value="<?=$key['id']?>"> <?=$key['desc']?></option>
							<?php }	?>
							</select></td>
							<td class="esp">Cidade</td>
							<td><select name="cidade"  class="campos" required="required">
									<option value="" selected="selected" disabled="disabled" style="display: none">Escolha uma opção</option>
							<?php foreach ($dados['cidades'] as $key){ ?>
							    <option value="<?=$key['id']?>"> <?=$key['desc']?> </option>
							<?php }	?>
						</select></td>
						
						
						<tr>
						
						
						<tr>
							<td>Tecnlogia</td>
							<td><label class="container"> &nbsp;&nbsp;<input type="radio" name="tec"
									value="1" style="cursor: pointer;" checked="checked"> Fibra <span
									class="checkmark"></span><br>&nbsp;
							</label> <label class="container"> <input type="radio" name="tec"
									value="2" style="cursor: pointer;"> Rádio <span
									class="checkmark"></span>
							</label></td>
							
							<td> Base </td>
							<td><select name="base" class="campos">
							<?php foreach ($dados['radios'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==1)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
							</td>
						</tr>
						<tr>
							<td>Problema</td>
							<td><select name="problema"  class="campos">
							<?php foreach ($dados['problemas'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==8)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
							<td class="esp">Status</td>
							<td><select name="status" class="campos">
									<?php foreach ($dados['status'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==1)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
						</tr>
						</table>
						<table>
							<tr>
								<td style="vertical-align: top">Notas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><textarea rows="5" cols="70" name="notas"></textarea></td>
							</tr>
						</table>
						<table id="table3" width="654px">
						<tr>
							<td><input type="reset" value="Zerar" class="btn btn_zerar"></td>							
							<td align="right"><input type="submit" value="Enviar" class="btn btn_env"></td>
						</tr>
						</table>

					</table>
				</div>
	
	<!-- dados adicionais do formulário. -->
	<input type="text" name="protocolo" value="<?=$dados['protocolo']?>" hidden="hidden">
	<input type="text" name="id_atendente" value="<?=$dados['id_atendente']?>" hidden="hidden" >
	<input type="text" name="atendente" value="<?=$dados['atendente']?>" hidden="hidden">
	<input type="text" name="data" value="<?=$dados['data']?>" hidden="hidden">
	</form>

	</div>
	</div>
	<footer>
		<div id="rodape">
			<p style="background: #FF530D">
				<em>Jardriel Sousa e Jurandir Batista ® - Direitos Autorais Resevados</em>
			</p>
		</div>
	</footer>
</body>
</html>