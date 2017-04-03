<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Strona główna banku WYSiWYG</title>
	<link rel="stylesheet" href="stylesheet/stylesignup.css"></style>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body bgcolor="#383838">
	<div id="box">
		<br>
		<div id="login_space"><br>
		<pre>		DARMOWA REJESTRACJA DO BANKU WYSiWYG</pre>
			<div id="enter_info">
				<form action="signup.php" method="post">
					<input type="text" name="name" placeholder="Imię"> <br>
					<input type="text" name="last_name" placeholder="Nazwisko"> <br>
					<input type="text" name="email" placeholder="E-mail"> <br>
					<input type="password" name="pass" placeholder="Hasło"> <br>
					<input type="password" name="pass2" placeholder="Powtórz hasło"> <br>
					<?php 
							session_start();
							$_SESSION['islogin'] = false;
						if (isset($_SESSION['wrongpassword']))
						{
							echo $GLOBALS['wrongpasswordglobal']; 
							
						}
						?>
					<div class="g-recaptcha" data-sitekey="6LcTyxgUAAAAAJpf9gOweWyWgBRmiGz8C_rZLGlK"></div> <br> 
					<input type="submit" value="Zarejestruj się!">						
				</form>
			</div>
		</div>
	</div>
</body>
</html>
