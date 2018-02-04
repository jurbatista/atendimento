<html>
<head>
<title>ATENDIMENTO INFOLINK</title>
<meta charset="UTF8">
<meta http-equiv="pragma" content="no-cache" />
<link rel="stylesheet" type="text/css" href="view/css/index.css">
</head>
<body>

	<div id="geral">
		<div id="loginBox">
			<div id="titleBox">
			<img alt="logo_infolink_telecom" src="view/img/logo.png" width="170px"><br>
			Login</div>
			<div id="bodyBox">
				<form id="login" name="login" action="controller/logonC.php" method="POST">
					<input type="text" name="user" id="user" required="required" placeholder="usuário"><br><br>
					<input type="password" name="pass" id="pass" required="required" placeholder="senha"><br><br>
					<input type="submit" id="enter" name="entrar" value="Entrar"><br><br>
						<span id="aviso"><?php echo ( $err == 1 ? "Usuário ou senha erradas" : "" ); ?></span>
				</form>
			</div>
		</div>
	</div>
</body>
</html>