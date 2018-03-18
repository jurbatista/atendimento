<?php 
$scripts ='
<link rel="stylesheet" type="text/css" href="view/css/form.css">
';
include_once 'view/header.php';
?>

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
							<td><input type="text" name="nomeCliente" id="nomeCliente" style="width: 350px"
								class="formP campos inp_nome" 
								required="required" >
							</td>
							<td> Telefone </td>
							<td><input type="tel" name="tel" class="formP campos" maxlength="11" style="width: 160px" 
							pattern="[0-9]+$" required="required"></td>
							</tr>			
										
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
							<td>
								<label class="container"> &nbsp;&nbsp;<input type="radio" name="tec"
										value="1" style="cursor: pointer;" checked="checked"> Fibra <span
										class="checkmark"></span></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								<label class="container"> <input type="radio" name="tec"
								value="3" style="cursor: pointer;"> Eng. de Rede <span
								class="checkmark"></span></label><br>&nbsp;
								
								<label class="container"> <input type="radio" name="tec"
										value="2" style="cursor: pointer;"> Rádio <span
										class="checkmark"></span></label> 
								
							</td>
							
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
							    <option value="<?=$key['id']?>" <?=($key['id']==13)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
							<td class="esp">Status</td>
							<td><select name="status" class="campos">
									<?php foreach ($dados['status'] as $key){ ?>
							    <option value="<?=$key['id']?>" <?=($key['id']==1)?'selected="selected"':"";?>> <?=$key['desc']?> </option>
							<?php }	?>
							</select></td>
						</tr>
						<tr>
						</table>
						<table>
							<tr>
								<td style="vertical-align: top">Notas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><textarea style="width: 585px; height: 100px;" name="notas"></textarea></td>
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
	<input type="text" name="data" value="<?=$dados['data']?>" hidden="hidden">
	<input type="text" name="hora" value="<?=$dados['hora']?>" hidden="hidden">
	</form>

	</div>
	</div>
	<?php 
include_once 'view/foot.php';
?>