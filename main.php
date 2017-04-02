<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Strona główna banku WYSiWYG</title>
	<link rel="stylesheet" href="stylesheet/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body bgcolor="#383838">
	<div id="box">
		<div id="taskbar">
			<div id="taskbartext">
				<form action="logout.php">
					<input type="submit" value="Wyloguj się!"><br>
				</form>	
			</div>
		</div>
		<br>
		<div id="login_space"><br>
		
			<div id="enter_info">
			SALDO KONTA: <?php 
session_start();
echo $_SESSION['money'] . "zł";
if($_SESSION['islogin'] == false)
{
	header('Location: login.php');
}
?><br><br>
			</div>
		</div>
	</div>
</body>
</html>
