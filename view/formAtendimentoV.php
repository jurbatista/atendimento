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
				<td>- <?=date('d/m/Y'); echo " - ". $dados['hora']?></td>
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
								<td><input type="text" value="<?=$dados['protocolo']?>"
									class="campos" disabled="disabled"></td>
							</tr>

						</table>

					</div>
					<table>

						<tr>
							<td>Nome</td>
							<td><input type="text" name="nomeCliente" id="nomeCliente"
								class="formP campos" placeholder="nome do cliente"
								required="required"></td>
						
						
						<tr>
						
						
						<tr>
							<td>Bairro</td>
							<td><select name="bairro">
									<option value="0">selecione o bairro</option>
							<?php foreach ($dados['bairros'] as $key){ ?>
							    <option value="<?=$key['id']?>"> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
							<td>Cidade</td>
							<td><select name="cidade">
									<option value="0">selecione a cidade</option>
							<?php foreach ($dados['cidades'] as $key){ ?>
							    <option value="<?=$key['id']?>"> <?=$key['desc']?> </option>
							<?php }	?>
						</select></td>
						
						
						<tr>
						
						
						<tr>
							<td>Tecnlogia</td>
							<td><label class="container"> <input type="radio" name="tec"
									value="fibra" style="cursor: pointer;" checked="checked"> Fibra <span
									class="checkmark"></span>
							</label> <label class="container"> <input type="radio" name="tec"
									value="radio" style="cursor: pointer;"> Rádio <span
									class="checkmark"></span>
							</label></td>
							
							<td> Base </td>
							<td><select name="base">
							<?php foreach ($dados['radios'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==1)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
							</td>
						</tr>
						<tr>
							<td>Problema</td>
							<td><select name="problema">
							<?php foreach ($dados['problemas'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==13)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
							<td>Status</td>
							<td><select name="status" class="campos">
									<?php foreach ($dados['status'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==1)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
						</tr>
						<tr>
						<td>Notas</td>
						<td><textarea rows="5" cols="30" nome="notas"></textarea></td>
							
						</td>
						</tr>
						<tr>
							<td></td>

							<td><input type="reset" value="Zerar" class="btn"></td>
							<td></td>
							<td></td>
							<td><input type="submit" value="Enviar" class="btn"></td>
						</tr>

					</table>
				</div>
				<input name="data" type="text" value="<?=dados['data']?>" hidden="hidden" >
	</form>

	</div>
	</div>
	<footer>
		<div id="rodape">
			<p style="background: #FF530D">
				<em>Jardriel Sousa e Jurandir Batista®- Direitos Autorais Resevados</em>
			</p>
		</div>
	</footer>
</body>
</html>
