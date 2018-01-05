<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta charset="utf-8" />

</head>
<body>
<?php //utf8_encode(print_r($dados));?>
	<div id="geral">
		<div id="formulario">
			<div id="dadosAtendimento">
				<table>
					<tr>
						<td>Hora</td>
						<td><input type="text" value="<?=$dados['hora']?>"
							disabled="disabled"></td>
					</tr>
					<tr>
						<td>Protocolo</td>
						<td><input type="text" value="<?=$dados['protocolo']?>"
							disabled="disabled"></td>
					</tr>
					<tr>
						<td>Atendente</td>
						<td><input type="text" value="<?=$dados['atendente']?>"
							disabled="disabled"></td>
					</tr>
				</table>

			</div>
			<form action="controller/receiveDataForm.php" method="POST"
				name="AtdData">
				<table>

					<tr>
						<td>nome</td>
						<td><input type="text" name="nomeCliente" id="nomeCliente"
							class="formP" placeholder="nome do cliente" required="required"></td>
					<tr>
					<tr>
						<td>bairro</td>
						<td>
							<select name="bairro"> 
								<option value="0" > selecione o bairro </option>
							<?php foreach ($dados['bairros'] as $key){ ?>
							    <option value="<?=$key['id']?>" > <?=$key['desc']?> </option>
							<?php }	?>
							</select>
						</td>
						<td>cidade</td>
						<td>
							<select name="cidade"> 
								<option value="0" > selecione a cidade </option>
							<?php foreach ($dados['cidades'] as $key){ ?>
							    <option value="<?=$key['id']?>" > <?=$key['desc']?> </option>
							<?php }	?>
							</select>
						</td>
					
					
					<tr>
					
					
					<tr>
						<td>tecnlogia</td>
						<td><label class="container"> 
						<input type="radio" name="tec" value="fibra"> Fibra <span class="checkmark"></span>
						</label>
						</td>
						<td><label class="container"> 
						<input type="radio" name="tec" value="radio"> Rádio <span class="checkmark"></span>
						</label>
						</td>
					</tr>
					<tr>
						<td>Problema</td>
						<td>
							<select name="problema"> 
								<option value="0" > selecione a problema </option>
							<?php foreach ($dados['problemas'] as $key){ ?>
							    <option value="<?=$key['id']?>" > <?=$key['desc']?> </option>
							<?php }	?>
							</select>
						</td>
						<td>Status</td>
						<td>
							<select name="status"> 
								<option value="0"> selecione o problema </option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="reset" value="zerar"> </td>
						<td></td>
						<td></td>
						<td><input type="submit" value="enviar"></td>
					</tr>

				</table>
			</form>
		</div>
	</div>
</body>
</html>