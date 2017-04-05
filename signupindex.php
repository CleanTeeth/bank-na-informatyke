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
					<?php 
						session_start();
						if (isset($_SESSION['nullname']))
						{
							echo "Wprowadz dane";
							unset($_SESSION['nullname']);
						}
						else
						{
							unset($_SESSION['nullname']);
						}
					 ?>
					<input type="text" name="last_name" placeholder="Nazwisko"> <br>
					<?php 
						if (isset($_SESSION['nulllastname']))
						{
							echo "Wprowadz dane";
							unset($_SESSION['nulllastname']);
						}
					 ?>
					<input type="text" name="email" placeholder="E-mail"> <br>
					<?php 
						if (isset($_SESSION['nullemail']))
						{
							echo "Wprowadz dane";
							unset($_SESSION['nullemail']);
						}
					 ?>
					<input type="password" name="pass" placeholder="Hasło"> <br>
					<?php 
						if (isset($_SESSION['nullpass1']))
						{
							echo "Wprowadz dane";
							unset($_SESSION['nullpass1']);
						}
					 ?>
					<input type="password" name="pass2" placeholder="Powtórz hasło"> <br>
					<?php 
						$_SESSION['islogin'] = false;

						if (isset($_SESSION['diffpass']))
						{
							echo "Hasła się różnią";
							unset($_SESSION['diffpass']);
						}
						else
						{
							// echo "";
							if(isset($_SESSION['smallpasslen']))
							{
								// echo "";
								echo "Za krótkie hasło. Musi mieć więcej niż 10 znaków.";
								unset($_SESSION['smallpasslen']);
							}
							else
							{
								unset($_SESSION['smallpasslen']);
							}
						}
						?>
					<input type="checkbox" name="akceptacjaregulaminu"> Akceptuje <a href="regulamin.html" target="_blank">regulamin</a>
					<div class="g-recaptcha" data-sitekey="6LerbhsUAAAAACBByJcBc2SPHvXNmOaYHuNYsZp2"></div> <br> 
					<?php
						if(isset($_SESSION['botornot']))
						{
							echo "ZAZNACZ RECAPTCHE!";
							unset($_SESSION['botornot']);
						}
					?>
					<input type="submit" value="Zarejestruj się!">						
				</form>
			</div>
			<a href="logout.php">Wróć</a>
		</div>
	</div>
</body>
</html>
