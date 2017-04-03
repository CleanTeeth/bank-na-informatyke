<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Strona główna banku WYSiWYG</title>
	<link rel="stylesheet" href="stylesheet/styleindex.css"></style>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body bgcolor="#383838">
	<div id="box">
		<div id="taskbar">
			<div id="taskbartext"><a href="index.html">Strona główna</a> | <a href="News.html">Aktualności</a> | <a href="signup.php">Rejestracja</a></div>
		</div>
		<br>
		<div id="login_space"><br>
		<pre>		ZALOGUJ SIE DO SWOJEGO KONTA WYSiWYG</pre>
			<div id="enter_info">
				<form action="login.php" method="post">
					<input type="text" name="clientnumbers" placeholder="Numer klienta"> <br>
					<input type="password" name="pass" placeholder="Hasło"> <br>
					<?php 
					session_start();
						$_SESSION['islogin'] = false;
						if($_SESSION['wrongsth'] == true)
						{
							echo "Złe hasło albo numer klienta";
							$_SESSION['wrongsth'] = false;
						}
						else
						{
							echo "";
						}
					?>
					<input type="submit" value="Zaloguj się!">						
				</form>
			</div>
		</div>
	</div>
</body>
</html>

