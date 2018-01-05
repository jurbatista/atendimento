<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta charset="UTF8">
<link rel="stylesheet" type="text/css" href="view/css/index.css">
</head>
<body>

	<div id="geral">
		<div id="loginBox">
			<div id="titleBox">Atendimento Infolink</div>
			<div id="bodyBox">
				<form id="login" name="login" action="controller/logonC.php" method="POST">
					<table>
						<tr>
							<td>Usuário</td>
							<td><input type="text" name="user" id="user" required="required">
						</tr>
						<tr>
							<td>senha</td>
							<td><input type="password" name="pass" id="pass" required="required">
						</td>
						<tr>
							<td></td>
							<td><input type="submit" id="enter" name="entrar" value="Entrar"></td>
						</tr>
						<tr>
							<td><?php echo ( $err == 1 ? "Usuário ou senha erradas" : "" ); ?></td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>